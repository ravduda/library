<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\BorrowForm;

class BorrowEditCtrl{
    private $form;
    private $id;
    public function __construct() {
        $this->form = new BorrowForm();
    }

    public function action_borrowform(){
        if($this->form->getAndValidateId()){
            $this->form->generateView();
        }
        else{
            App::getRouter()->redirectTo('titles');
        }
    }
    public function action_addborrowing(){
        if($this->form->getAndValidateInputs()){
            if($this->form->saveData('borrow'))
                App::getRouter()->redirectTo('userdetails/'.$this->form->user->value);
        }
        $this->form->generateView();
    }
    public function action_endborrowing(){
        if($this->getAndValidateId()){
            try {
                $record = App::getDB()->update('borrow', [
                    "returned" => true,
                ], ["id" => $this->id]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->redirectTo('users');
        }
        else{
            App::getRouter()->redirectTo('users');
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
}