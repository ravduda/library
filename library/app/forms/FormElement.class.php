<?php

namespace app\forms;

use core\Utils;
use core\Validator;
use app\controllers\FileValidator;

class FormElement {
    public $name;
    public $type;
    public $label;
    public $validationRules;
    public $options;

    public $value;

    public function __construct($name, $type, $label, $validationRules, $options=[]){
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->validationRules = $validationRules;
        $this->options = $options;
    }

    public function getAndValidate(){
        if($this->type == "file"){
            $v = new FileValidator();
            $this->value = $v->validateFileFromRequest();
        }else{
            $v = new Validator();
            $this->value = $v->validateFromPost($this->name, $this->validationRules);
        }
    }
}