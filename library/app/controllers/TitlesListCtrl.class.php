<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\Validator;
use core\RoleUtils;
use core\ParamUtils;

class TitlesListCtrl{
    private $records;
    private $page;
    private $isNext;
    private $titlesOnOnePage = 8;
    public function action_titleslist() {
        $where = ["LIMIT"=>[0,$this->titlesOnOnePage]];
        if($this->getAndValidatePage()){
            $where = ["LIMIT"=>[($this->page-1)*$this->titlesOnOnePage,$this->titlesOnOnePage]];
        }
        try {
            $this->records = App::getDB()->select("title", [
                "[>]author" => ["title.authorId" =>"id"]
            ],
            [
                "title.id",
                "title.name",
                "title.description",
                "title.img",
                "author.firstname",
                "author.lastname",
            ],
            $where);
            if(!empty($this->page)){
                $this->isNext = App::getDB()->select("title", "*",[
                    "LIMIT"=>[($this->page*$this->titlesOnOnePage),($this->page*$this->titlesOnOnePage)+1]
                ]);
            }
            else{
                $this->isNext = App::getDB()->select("title", "*",[
                    "LIMIT"=>[$this->titlesOnOnePage,$this->titlesOnOnePage+1]
                ]);
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }
    public function getAndValidatePage(){
        $v = new Validator;
        $this->page = $v->validateFromCleanURL(1, [
            "trim" => true,
            "int" => true,
        ]);
        return !empty($this->page);
    }
    public function generateView(){
        App::getSmarty()->assign('titles', $this->records);
        if(!empty($this->page)){
            if($this->page != 1){
                App::getSmarty()->assign('previous', $this->page-1);
            }
            if(!empty($this->isNext)){
                
                App::getSmarty()->assign('next', $this->page+1);
            }
        }
        else{
            if(!empty($this->isNext)){
                App::getSmarty()->assign('next', 2);
            }
        }
        if(empty($this->page))
            App::getSmarty()->display("TitlesList.tpl");
        else
            App::getSmarty()->display("TitlesListContent.tpl");

    }
}
