<?php

namespace app\forms;

use app\forms\FormElement;
use app\forms\FormTemplate;
use core\App;
use core\Utils;

class BorrowForm extends FormTemplate{
	public FormElement $user;


    public function __construct(){
        $this->saveActionName = "addborrowing";
        
        try {
            $users = App::getDB()->select("user", "*", ["role"=>"user"]);
            $usersOptionsArray = array();
            foreach($users as $a){
                array_push($usersOptionsArray, [$a["id"], $a["id"]." - ".$a["firstname"]." ".$a["lastname"]]);
            }
            $this->user = new FormElement("userId", "select", "Użytkownik", [
                'trim' => true,
                'required' => true,
            ], $usersOptionsArray);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->formElements = [
            "user" => $this->user,
        ];
    }
    public function saveData($tableName){
        $startDate = new \DateTime();
        $endDate = new \DateTime();
        $endDate->add(new \DateInterval('P30D'));
        try{
            if($this->getAndValidateId()){
                App::getDB()->insert($tableName, [
                    "userId" => $this->user->value,
                    "bookId" => $this->id,
                    "start" => $startDate->format("Y-m-d"),
                    "end" => $endDate->format("Y-m-d"),
                    "returned" => false,
                ]);
            }
            else{
                Utils::addErrorMessage("Wystąpił błąd zapisu do bazy");
            }
        }
        catch(\PDOException $e){
            Utils::addErrorMessage("Wystąpił błąd zapisu do bazy");
            if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
        }
        return !App::getMessages()->isError();
    }
}