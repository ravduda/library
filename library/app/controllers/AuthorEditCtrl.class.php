<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\AuthorForm;

class AuthorEditCtrl{
    private $form;
    public function __construct() {
        $this->form = new AuthorForm();
    }

    public function action_authorform(){
        if($this->form->getAndValidateId()){
            $this->form->getFromDB("author");
        }
        $this->form->generateView("AuthorEdit.tpl");
    }
    public function action_saveauthor(){
        if($this->form->getAndValidateInputs()){
            if($this->form->saveData('author'))
                App::getRouter()->redirectTo($conf->action_root.'authors');
        }
        $this->form->generateView("AuthorEdit.tpl");
    }
}