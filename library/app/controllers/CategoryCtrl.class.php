<?php

namespace app\controllers;

use core\App;
use core\Utils;

class CategoryCtrl{
    private $records;
    
    public function action_categories(){
        try {
            $this->records = App::getDB()->select("category", "*");
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }
    function generateView(){
        App::getSmarty()->assign('tableL', ["id", "kategoria"]);
        App::getSmarty()->assign('tableN', ["id", "name"]);
        App::getSmarty()->assign('tableR', $this->records);
        App::getSmarty()->assign('tableB', [
            ["action"=>"categoryform", "icon"=>"edit.svg", "alt"=>"Edytuj"],
            ["action"=>"categorydelete", "icon"=>"delete.svg", "alt"=>"Usuń"]
        ]);

        App::getSmarty()->display("Categories.tpl");
    }
}