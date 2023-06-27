<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;

class TitleCtrl{
    private $records;
    public function action_titles(){
        try {
            $this->records = App::getDB()->select("title", [
                "[>]author" => ["title.authorId" =>"id"],
                "[>]category" => ["title.categoryId" =>"id"]
            ],
            [
                "title.id",
                "title.name(titlename)",
                "author.firstname", 
                "author.lastname", 
                "category.name"
            ]);
            foreach($this->records as &$re){
                $re['author'] = $re["firstname"]." ".$re["lastname"];
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }
    function generateView(){
        App::getSmarty()->assign('tableL', ["id", "tytuł", "autor", "kategoria"]);
        App::getSmarty()->assign('tableN', ["id", "titlename", "author", "name"]);
        App::getSmarty()->assign('tableR', $this->records);
        App::getSmarty()->assign('tableB', [
            ["action"=>"titleform", "icon"=>"edit.svg", "alt"=>"Edytuj"],
            ["action"=>"books", "icon"=>"details.svg", "alt"=>"Szczegóły"],
        ]);
        App::getSmarty()->display("Titles.tpl");
    }
}
