<?php

namespace app\controllers;

use core\App;
use core\Utils;

class FileValidator{
    public function validateFileFromRequest(){
        $target_dir = App::getConf()->root_path."/public/covers/";
        $target_returned_name = "/covers/".basename($_FILES["img"]["name"]);
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = true;
            } 
            else {
                Utils::addErrorMessage("File is not an image.");
                $uploadOk = false;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            Utils::addErrorMessage("Sorry, file already exists.");
            $uploadOk = false;
        }

        // Check file size
        if ($_FILES["img"]["size"] > 500000) {
            Utils::addErrorMessage("Sorry, your file is too large.");
            $uploadOk = false;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            Utils::addErrorMessage("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = false;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == false) {
            Utils::addErrorMessage("Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
        }
        else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                // echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
                // Utils::addErrorMessage("Dodałoby");
                chmod($target_file, 0777);
                return $target_returned_name;
            } 
            else {
                Utils::addErrorMessage("Sorry, there was an error uploading your file.");
                return "";
            }
        }
    }
}