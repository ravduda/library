<?php

namespace app\controllers;

use core\App;

class LoginCtrl{
    public function action_login() {
        App::getSmarty()->display("Login.tpl");
    }
}