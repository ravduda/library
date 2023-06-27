<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;

class TitlesListCtrl{
    private $records;
    public function action_titleslist() {
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
    public function generateView(){
        App::getSmarty()->assign('titles', $this->records);
        App::getSmarty()->display("TitlesList.tpl");
    }
}
