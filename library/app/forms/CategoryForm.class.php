<?php

namespace app\forms;

use app\forms\FormElement;
use app\forms\FormTemplate;

class CategoryForm extends FormTemplate{
	public FormElement $email;
	public FormElement $pass;
    public FormElement $firstname;
    public FormElement $lastname;
    public FormElement $role;

    public function __construct(){
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