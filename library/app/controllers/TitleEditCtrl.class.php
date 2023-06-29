<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\TitleForm;
use app\forms\TitleFormImg;

class TitleEditCtrl{
    private $form;
    public function __construct() {
        if($this->getAndValidateId()){
            $this->form = new TitleForm();
        }
        else{
            $this->form = new TitleFormImg();
        }
    }

    public function action_titleform(){
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
        else{
            
            set_error_handler(function() { /* ignore errors */ });
            unlink(App::getConf()->root_path."/public".$this->form->img->value);
            restore_error_handler();
        }
        $this->form->generateView();
    }
    public function getAndValidateId(){
        $v = new Validator;
        $id = $v->validateFromCleanURL(1, [
            "trim" => true,
            "int" => true,
        ]);
        return !empty($id);
    }
}