<?php

namespace app\forms;

use app\forms\FormElement;
use app\forms\FormTemplate;

class CategoryForm extends FormTemplate{
	public FormElement $name;

    public function __construct(){
        $this->saveActionName = "savecategory";
        $this->name = new FormElement("name", "text", "nazwa kategorii", [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj kategorię',
        ]);
        $this->formElements = [
            "name" => $this->name,
        ];
    }
}