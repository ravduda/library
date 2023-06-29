<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\Validator;

class BookCtrl{
    private $id;
    private $records;
    private $recordsAv;
    private $title;
 
    public function action_books(){
        if($this->validateId()){
            try {
                $this->title = App::getDB()->get("title", "*", [
                    "id" =>$this->id,
                ]);
                // select book.id from book join borrow on book.id = borrow.bookId WHERE borrow.returned = false AND book.titleId = 2 group by id;
                // ^ niedostępne z danego tytułu
                // SELECT book.id from book where titleId = 2 EXCEPT select book.id from book join borrow on book.id = borrow.bookId WHERE borrow.returned = false AND book.titleId = 2 group by id;
                // ^ dostępne z danego tytułu
                $this->records = App::getDB()->query("SELECT book.id from book where titleId = :titleId EXCEPT select book.id from book join borrow on book.id = borrow.bookId WHERE borrow.returned = false AND book.titleId = :titleId group by id;",[
                    ":titleId" => $this->id
                ]);
                $this->recordsAv = App::getDB()->query("SELECT book.id from book join borrow on book.id = borrow.bookId WHERE borrow.returned = false AND book.titleId = :titleId group by id;",[
                    ":titleId" => $this->id
                ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            $this->generateView();
        }
        else{
            App::getRouter()->redirectTo($conf->action_root.'titles');
        }
    }
    public function action_addbook(){
        if($this->validateId()){
            try {
                App::getDB()->insert("book", ["titleId" => $this->id]);

            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->redirectTo($conf->action_root.'books/'.$this->id);
        }
        else{
            App::getRouter()->redirectTo($conf->action_root.'titles');
        }
    }
    function validateId(){
        $v = new Validator;
        $this->id = $v->validateFromCleanURL(1, [
            "trim" => true,
            // "required" => true,
            // "required_message" => "Błędny adres",
            "int" => true,
        ]);
        return !empty($this->id);
    }
    function generateView(){ 
        App::getSmarty()->assign('id', $this->id);
        App::getSmarty()->assign('title', $this->title);
        App::getSmarty()->assign('tableL', ["id"]);
        App::getSmarty()->assign('tableN', ["id"]);
        App::getSmarty()->assign('tableR', $this->records);
        App::getSmarty()->assign('tableAvR', $this->recordsAv);
        App::getSmarty()->assign('tableB', [
            // ["action"=>"bookdelete", "icon"=>"delete.svg", "alt"=>"Usuń"],
            ["action"=>"borrowform", "icon"=>"borrow.svg", "alt"=>"Wypożycz"],
        ]);

        App::getSmarty()->display("Books.tpl");
    }
}