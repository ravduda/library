<?php

namespace app\forms;

use app\forms\FormElement;

class Form {
    public FormElement $formElements = [];

    public getAndValidateInputs(){
        $validationStatus = true;
        for($i = 0; $i<count($formElements); $i++){
            if(!$this->formElements[$i]->getAndValidate())
                $validationStatus = false;
        }
        return $validationStatus;
    }
}