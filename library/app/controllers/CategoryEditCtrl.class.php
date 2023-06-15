<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\CategoryForm;

class CategoryEditCtrl{
    private $form;
    public function __construct() {
        $this->form = new CategoryForm();
    }

    public function action_categoryform(){
        if($this->form->getAndValidateId()){
            $this->form->getFromDB("category");
        }
        $this->form->generateView("CategoryEdit.tpl");
    }
    public function action_savecategory(){
        if($this->form->getAndValidateInputs()){
            if($this->form->saveData('category'))
                App::getRouter()->redirectTo($conf->action_root.'categories');
        }
        $this->form->generateView("CategoryEdit.tpl");
    }
}