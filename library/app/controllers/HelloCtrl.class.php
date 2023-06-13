<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use app\forms\UserForm;

/**
 * HelloWorld built in Amelia - sample controller
 *
 * @author Przemysław Kudłacik
 */
class HelloCtrl {
    public $form;
    
    public function __construct(){
        $this->form = new UserForm();
    }
    public function action_hello() {
        $this->form->generateView();
        // $variable = 123;
        
        // App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        // Utils::addInfoMessage("Or even easier message :-)");
        
        // App::getSmarty()->assign("value",$variable);        
        // App::getSmarty()->display("Hello.tpl");
        
    }
    
}
