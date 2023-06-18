<?php

namespace app\forms;

use app\forms\FormElement;
use app\forms\FormTemplate;
use core\App;
use core\Utils;

class TitleForm extends FormTemplate{
	public FormElement $name;
    public FormElement $description;
	public FormElement $author;
    public FormElement $category;


    public function __construct(){
        $this->saveActionName = "savetitle";
        $this->name = new FormElement("name", "text", "tytuł", [
            'trim' => true,
            'required' => true,
            'max_length' => 40,
            'required_message' => 'Podaj tytuł',
            'validator_message' => 'Długoś tytułu nie nie może przekraczać 40 znaków'
        ]);
        $this->description = new FormElement("description", "text", "opis", [
            'trim' => true,
            'required' => true,
            'max_length' => 200,
            'required_message' => 'Podaj opis',
            'validator_message' => 'Długoś opisu nie nie może przekraczać 200 znaków'
        ]);
        try {
            $authors = App::getDB()->select("author", "*");
            $authorsOptionsArray = array();
            foreach($authors as $a){
                array_push($authorsOptionsArray, [$a["id"], $a["firstname"]." ".$a["lastname"]]);
            }
            $this->author = new FormElement("authorId", "select", "autor", [
                'trim' => true,
                'required' => true,
            ], $authorsOptionsArray);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        try {
            $categories = App::getDB()->select("category", "*");
            $categoriesOptionsArray = array();
            foreach($categories as $a){
                array_push($categoriesOptionsArray, [$a["id"], $a["name"]]);
            }
            $this->category = new FormElement("categoryId", "select", "kategoria", [
                'trim' => true,
                'required' => true,
            ], $categoriesOptionsArray);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->formElements = [
            "name" => $this->name,
            "description" => $this->description,
            "authorId" => $this->author,
            "categoryId" => $this->category
        ];
    }
}