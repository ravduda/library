<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\Validator;

class UserDetailsCtrl{
    private $records;
    private $id;
    private $user;
    public function action_userdetails(){
        if($this->getAndValidateId()){
            try {
                $this->user = App::getDB()->get("user", "*", [
                    "id" =>$this->id,
                ]);
                $this->records = App::getDB()->select("borrow", "*", [
                    "userId" => $this->id,
                    "returned" => false,
                ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            $this->generateView();
        }
        else{
            App::getRouter()->redirectTo('users');
        }
    }
    public function getAndValidateId(){
        $v = new Validator;
        $this->id = $v->validateFromCleanURL(1, [
            "trim" => true,
            "int" => true,
        ]);
        return !empty($this->id);
    }
    function generateView(){

        App::getSmarty()->assign('user', $this->user);
        App::getSmarty()->assign('tableL', ["id", "rozpoczęcie wyporzyczenia", "koniec czasu"]);
        App::getSmarty()->assign('tableN', ["id", "start", "end"]);
        App::getSmarty()->assign('tableR', $this->records);
        App::getSmarty()->assign('tableB', [
            ["action"=>"endborrowing", "icon"=>"return.svg", "alt"=>"Zwróć"],
        ]);
        App::getSmarty()->display("UserDetails.tpl");
    }
}