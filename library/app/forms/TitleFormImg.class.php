<?php

namespace app\forms;

use app\forms\FormElement;
use app\forms\FormTemplate;
use core\App;
use core\Utils;

class TitleFormImg extends TitleForm{


    public function __construct(){
        parent::__construct();
        $this->formElements = [
            "name" => $this->name,
            "description" => $this->description,
            "authorId" => $this->author,
            "categoryId" => $this->category,
            "img" => $this->img
        ];
    }
}