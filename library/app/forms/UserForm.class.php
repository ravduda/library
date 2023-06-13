<?php

namespace app\forms;

use app\forms\FormElement;
use app\forms\FormTemplate;

class UserForm extends FormTemplate{
    public FormElement $id;
	public FormElement $email;
	public FormElement $pass;
    public FormElement $firstname;
    public FormElement $lastname;
    public FormElement $role;

    public function __construct(){
        $this->id = new FormElement("id", "hidden", "", []);
        $this->email = new FormElement("email", "email", "email", [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj email',
            'email' => true,
            'validator_message' => 'Podaj email'
        ]);
        $this->pass = new FormElement("pass", "password", "hasło", [
            'trim' => true,
            'required' => true,
            'min_length' => 5,
            'max_length' => 60,
            'required_message' => 'Podaj hasło',
            'validator_message' => 'Długoś hasła nie mieści się pomiędzy 5 a 60 znaków'
        ]);
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
        $this->role = new FormElement("role", "select", "rola", [
            'trim' => true,
            'required' => true,
        ], ["user", "admin"]);

        $this->formElements = [
            "id" => $this->id,
            "email" => $this->email,
            "pass" => $this->pass,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "role" => $this->role
        ];
    }
}