<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\BorrowForm;

class BorrowEditCtrl{
    private $form;
    public function __construct() {
        $this->form = new BorrowForm();
    }

    public function action_borrowform(){
        if($this->form->getAndValidateId()){
            $this->form->generateView();
        }
    }
    public function action_addborrowing(){
        if($this->form->getAndValidateInputs()){
            if($this->form->saveData('borrow'))
                App::getRouter()->redirectTo($conf->action_root.'books/'.$form->id);
        }
        $this->form->generateView();
    }
}