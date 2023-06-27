<?php

namespace app\controllers;

use core\App;
use core\Utils;

class AuthorCtrl{
    private $records;
    
    public function action_authors(){
        try {
            $this->records = App::getDB()->select("author", "*");
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }
    function generateView(){
        App::getSmarty()->assign('tableL', ["id", "imie", "nazwisko"]);
        App::getSmarty()->assign('tableN', ["id", "firstname", "lastname"]);
        App::getSmarty()->assign('tableR', $this->records);
        App::getSmarty()->assign('tableB', [
            ["action"=>"authorform", "icon"=>"edit.svg", "alt"=>"Edytuj"],
            ["action"=>"authordelete", "icon"=>"delete.svg", "alt"=>"Usuń"]
        ]);
        App::getSmarty()->display("Authors.tpl");
    }
}