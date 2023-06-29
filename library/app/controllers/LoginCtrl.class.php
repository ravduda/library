<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl{

    private $form;

    public function __construct(){
        $this->form = new LoginForm();
    }
    public function action_login() {
        if($this->validate()){
            App::getRouter()->redirectTo("titleslist");
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
        
        try {
            $record = App::getDB()->get('user', "*", [
                "email" => $this->form->login,
                "pass" => $this->form->pass,
            ]);
            
            if(!empty($record)){
                RoleUtils::addRole($record['role']);
                SessionUtils::store("id", $record->id);
            }
            else{
                Utils::addErrorMessage('Niepoprawny login lub hasło');
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        

        return !App::getMessages()->isError();
    }
    public function generateView(){
        App::getSmarty()->display("Login.tpl");
    }
}