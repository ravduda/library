<?php

namespace app\forms;

use app\forms\FormElement;
use app\forms\FormTemplate;

class AuthorForm extends FormTemplate{
    public FormElement $firstname;
    public FormElement $lastname;

    public function __construct(){
        $this->saveActionName = "saveauthor";
        $this->firstname = new FormElement("firstname", "text", "imie", [
            'trim' => true,
            'required' => true,
            'min_length' => 2,
            'max_length' => 40,
            'required_message' => 'Podaj imie',
            'validator_message' => 'Długoś imienia nie mieści się pomiędzy 2 a 40 znaków'
        ]);
        $this->lastname = new FormElement("lastname", "text", "nazwisko", [
            'trim' => true,
            'required' => true,
            'min_length' => 2,
            'max_length' => 40,
            'required_message' => 'Podaj nazwisko',
            'validator_message' => 'Długoś nazwiska nie mieści się pomiędzy 2 a 40 znaków'
        ]);

        $this->formElements = [
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
        ];
    }
}