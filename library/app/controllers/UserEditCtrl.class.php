<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserForm;

class UserEditCtrl{
    private $form;
    public function __construct() {
        $this->form = new UserForm();
    }

    public function action_newUser(){
        $this->generateView();
    }
    public function action_saveUser(){
        if($this->validateSave()){
            App::getDB()->insert('user', [
                "email" => $this->form->email,
                "pass" => $this->form->pass,
                "firstname" => $this->form->firstname,
                "lastname" => $this->form->lastname,
                "role" => $this->form->role,
            ]);
            Utils::addInfoMessage("dodano użytkownika");
            $this->generateView();
        }
        else{
            $this->generateView();
        }
    }

    private function validateSave(){
        if(empty(ParamUtils::getFromPost('id', true)))
            return $this->validateData();
        return false;
    }
    private function validateData(){
        $v = new Validator();

        $this->form->email = $v->validateFromPost("email", [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj email',
            'email' => true,
            'validator_message' => 'Podaj email'
        ]);
        $this->form->pass = $v->validateFromPost("pass", [
            'trim' => true,
            'required' => true,
            'min_length' => 5,
            'max_length' => 60,
            'required_message' => 'Podaj hasło',
            'validator_message' => 'Długoś hasła nie mieści się pomiędzy 5 a 60 znaków'
        ]);
        $this->form->firstname = $v->validateFromPost("firstname", [
            'trim' => true,
            'required' => true,
            'min_length' => 2,
            'max_length' => 40,
            'required_message' => 'Podaj imie',
            'validator_message' => 'Długoś imienia nie mieści się pomiędzy 2 a 40 znaków'
        ]);
        $this->form->lastname = $v->validateFromPost("lastname", [
            'trim' => true,
            'required' => true,
            'min_length' => 2,
            'max_length' => 40,
            'required_message' => 'Podaj nazwisko',
            'validator_message' => 'Długoś nazwiska nie mieści się pomiędzy 2 a 40 znaków'
        ]);
        $this->form->role = $v->validateFromPost("role", [
            'trim' => true,
            'required' => true,
        ]);
        return !App::getMessages()->isError();
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('UserEdit.tpl');
    }
}