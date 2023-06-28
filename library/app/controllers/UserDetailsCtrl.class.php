<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\Validator;

class UserDetailsCtrl{
    private $records;
    private $id;
    public function action_userdetails(){
        if($this->getAndValidateId()){
            try {
                $this->records = App::getDB()->select("borrow", "*", [
                    "userId" => $this->id,
                ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            $this->generateView();
        }
        else{
            App::getRouter()->redirectTo($conf->action_root.'users');
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
        App::getSmarty()->assign('tableL', ["id", "rozpoczęcie wyporzyczenia", "koniec czasu", "czy zwrócono"]);
        App::getSmarty()->assign('tableN', ["id", "start", "end", "returned"]);
        App::getSmarty()->assign('tableR', $this->records);
        App::getSmarty()->assign('tableB', [
            // ["action"=>"userform", "icon"=>"edit.svg", "alt"=>"Edytuj"],
        ]);
        App::getSmarty()->display("Users.tpl");
    }
}