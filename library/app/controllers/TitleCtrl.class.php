<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;

class TitleCtrl{
    private $records;
    public function action_titles() {
        try {
            $this->records = App::getDB()->select("title", [
                "[>]author" => ["title.authorId" =>"id"]
            ],
            [
                "title.id",
                "title.name",
                "title.description",
                "author.firstname",
                "author.lastname",
                    ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }
    public function action_titlestable(){
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
        $this->generateTableView();
    }
    function generateTableView(){
        App::getSmarty()->assign('tableL', ["id", "tytuł", "autor", "kategoria"]);
        App::getSmarty()->assign('tableN', ["id", "titlename", "author", "name"]);
        App::getSmarty()->assign('tableR', $this->records);
        App::getSmarty()->display("TitlesTable.tpl");
    }
    public function generateView(){
        App::getSmarty()->assign('titles', $this->records);
        App::getSmarty()->display("Titles.tpl");
    }
}
