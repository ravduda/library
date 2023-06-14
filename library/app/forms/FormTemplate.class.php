<?php

namespace app\forms;

use core\App;
use core\Utils;
use core\Validator;
use app\forms\FormElement;

class FormTemplate {
    public $formElements = array();
    public $id;

    public function getAndValidateId(){
        $v = new Validator;
        $this->id = $v->validateFromCleanURL(1, [
            "trim" => true,
            "int" => true,
        ]);
        return !empty($this->id);
    }
    public function getAndValidateInputs(){
        foreach(array_keys($this->formElements) as $key){
            $this->formElements[$key]->getAndValidate();
        }
        return !App::getMessages()->isError();
    }
    private function getDataArray(){
        $dataArray = array();
        foreach($this->formElements as $fe)
            $dataArray[$fe->name] = $fe->value;
        return $dataArray;
    }
    public function saveData($tableName){
        try{
            if($this->getAndValidateId()){
                App::getDB()->update($tableName, $this->getDataArray(), ["id" => $this->id] );
            }
            else{
                App::getDB()->insert($tableName, $this->getDataArray());
            }
        }
        catch(\PDOException $e){
            Utils::addErrorMessage("Wystąpił błąd zapisu do bazy");
            if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
        }
    }
    public function getFromDB($name){
        try {
            $record = App::getDB()->select($name, "*", ["id" => $this->id]);
            foreach(array_keys($this->formElements) as $key){
                $this->formElements[$key]->value = $record[0][$key];
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
    }
    public function generateView($name=null){
        App::getSmarty()->assign('elements', $this->formElements);
        if(empty($name)){
            App::getSmarty()->display("Form.tpl");
        }
        else{
            App::getSmarty()->display($name);
        }
    }
}