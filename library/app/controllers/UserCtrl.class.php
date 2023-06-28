<?php

namespace app\controllers;

use core\App;
use core\Utils;

class UserCtrl{
    private $records;
    
    public function action_users(){
        try {
            $this->records = App::getDB()->select("user", "*");
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }
    function generateView(){
        App::getSmarty()->assign('tableL', ["id", "email", "imie", "nazwisko", "rola"]);
        App::getSmarty()->assign('tableN', ["id", "email", "firstname", "lastname", "role"]);
        App::getSmarty()->assign('tableR', $this->records);
        App::getSmarty()->assign('tableB', [
            ["action"=>"userform", "icon"=>"edit.svg", "alt"=>"Edytuj"],
            ["action"=>"userdetails", "icon"=>"details.svg", "alt"=>"Szczegóły"],
        ]);
        App::getSmarty()->display("Users.tpl");
    }
}