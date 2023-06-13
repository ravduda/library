<?php

namespace app\forms;

use core\App;
use core\Validator;
use app\forms\FormElement;

class FormTemplate {
    public $formElements;
    public $id;

    public function __construct(){
        $v = new Validator;
        $this->id = $v->validateFromCleanURL(1, [
            "trim" => true,
            "required" => false,
            "int" => true,
        ]);
    }
    public function getAndValidateInputs(){
        for($i = 0; $i<count($formElements); $i++){
            $this->formElements[$i]->getAndValidate();
        }
        return !App::getMessages()->isError();
    }
    private function getDataArray(){return [];}
    public function generateView(){
        App::getSmarty()->assign('elements', $this->formElements);
        App::getSmarty()->display("Form.tpl");
    }
}