<?php

namespace app\forms;

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

    public getAndValidate(){
        return $this->value = $v->validateFromPost($name, $validationRules);
    }
}