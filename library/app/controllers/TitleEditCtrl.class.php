<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\TitleForm;

class TitleEditCtrl{
    private $form;
    public function __construct() {
        $this->form = new TitleForm();
    }

    public function action_Titleform(){
        if($this->form->getAndValidateId()){
            $this->form->getFromDB("title");
        }
        $this->form->generateView();
    }
    public function action_saveTitle(){
        if($this->form->getAndValidateInputs()){
            if($this->form->saveData('title'))
                App::getRouter()->redirectTo($conf->action_root.'titles');
        }
        $this->form->generateView();
    }
}