<?php

namespace app\forms;

use core\App;
use app\forms\FormElement;

class FormTemplate {
    public $formElements;
    public function getAndValidateInputs(){
        $validationStatus = true;
        for($i = 0; $i<count($formElements); $i++){
            if(!$this->formElements[$i]->getAndValidate())
                $validationStatus = false;
        }
        return $validationStatus;
    }
    public function generateView(){
        App::getSmarty()->assign('elements', $this->formElements);
        App::getSmarty()->display("Form.tpl");
    }
}