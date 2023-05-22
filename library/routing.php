<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('hello'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LogoutCtrl');
Utils::addRoute('users', 'UserCtrl');
Utils::addRoute('addUser', 'UserCtrl');
Utils::addRoute('rmUser', 'UserCtrl');
Utils::addRoute('authors', 'AuthorCtrl');
Utils::addRoute('addAuthor', 'AuthorCtrl');
Utils::addRoute('rmAuthor', 'AuthorCtrl');
Utils::addRoute('titles', 'TitleCtrl');
Utils::addRoute('addTitle', 'TitleCtrl');
Utils::addRoute('rmTitle', 'TitleCtrl');
Utils::addRoute('books', 'BookCtrl');
Utils::addRoute('addBook', 'BookCtrl');
Utils::addRoute('rmBook', 'BookCtrl');

//Utils::addRoute('action_name', 'controller_class_name');