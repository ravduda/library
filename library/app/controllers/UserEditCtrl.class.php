<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserForm;

class UserEditCtrl{
    private $form;
    public function __construct() {
        $this->form = new UserForm();
    }

    public function action_newUser(){
        $this->generateView();
    }
    public function action_saveUser(){
        if($this->validateSave()){

        }
        else{
            generateView();
        }
    }

    private function validateSave(){

    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('UserEdit.tpl');
    }
}