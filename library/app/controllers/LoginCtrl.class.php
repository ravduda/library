<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl{

    private $form;

    public function __construct(){
        $this->form = new LoginForm();
    }
    public function action_login() {
        if($this->validate()){
            App::getRouter()->redirectTo("hello");
        }
        else{
            $this->generateView();
        }
    }
    public function action_logout() {
        session_destroy();
        App::getRouter()->redirectTo('login');
    }

    public function validate(){
        $this->form->login = ParamUtils::getFromRequest("login");
        $this->form->pass = ParamUtils::getFromRequest("pass");

        if(!isset($this->form->login) || !isset($this->form->pass))
            return false;

        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }
        if (App::getMessages()->isError())
            return false;
        
        if($this->form->login == "admin" && $this->form->pass == "admin"){
            RoleUtils::addRole("admin");
        }
        else{
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }

        return !App::getMessages()->isError();
    }
    public function generateView(){
        App::getSmarty()->display("Login.tpl");
    }
}