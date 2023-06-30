<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\Validator;
use core\SessionUtils;

class ProfileCtrl{
    private $id;
    public function action_showprofile(){
        try {
            $this->records = App::getDB()->select("borrow",[
                "[>]book" => ["bookId" => "id"],
                "[>]title" => ["book.titleId" => "id"],
                "[>]author" => ["title.authorId" => "id"],
                "[>]category" => ["title.categoryId" => "id"],
            ], [
                "borrow.id",
                "title.name(title)",
                "author.firstname",
                "author.lastname",
                "category.name(category)",
                "borrow.end"
            ], [
                "borrow.userId" => SessionUtils::load("id", $keep = true),
                "borrow.returned" => false,
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }
    public function action_extend(){
        $where = ["userId" => SessionUtils::load("id", $keep = true)];
        if($this->getAndValidateId()){
            $where += ["id" => $this->id];
        }
        $endDate = new \DateTime();
        $endDate->add(new \DateInterval('P30D'));
        try{
            App::getDB()->update("borrow", [
                "end" => $endDate->format("Y-m-d"),
            ],$where);
        }
        catch(\PDOException $e){
            Utils::addErrorMessage("Wystąpił błąd zapisu do bazy");
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getRouter()->redirectTo($conf->action_root.'showprofile');
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
        App::getSmarty()->assign('tableL', ["id", "tytuł", "autor", "kategoria", "koniec wypożyczenia"]);
        App::getSmarty()->assign('tableN', ["id", "title", "lastname", "category", "end"]);
        App::getSmarty()->assign('tableR', $this->records);
        App::getSmarty()->assign('tableB', [
            ["action"=>"extend", "icon"=>"borrow.svg", "alt"=>"Edytuj"],
            // ["action"=>"books", "icon"=>"details.svg", "alt"=>"Szczegóły"],
        ]);
        App::getSmarty()->display("Profile.tpl");
    }
}