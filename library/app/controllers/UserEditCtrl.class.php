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

    public function action_userform(){
        if($this->form->getAndValidateId()){
            $this->form->getFromDB("user");
        }
        $this->form->generateView("UserEdit.tpl");
    }
    public function action_saveUser(){
        if($this->form->getAndValidateInputs()){
            if($this->form->saveData('user'))
                App::getRouter()->redirectTo($conf->action_root.'users');
        }
        $this->form->generateView("UserEdit.tpl");
    }
}