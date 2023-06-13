<?php

use core\App;
use core\Utils;

Utils::addRoute('hello', 'HelloCtrl');

App::getRouter()->setDefaultRoute('titles'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl', ['user', 'admin']);

Utils::addRoute('users', 'UserCtrl', ['admin']);
Utils::addRoute('userform', 'UserEditCtrl', ['admin']);
Utils::addRoute('saveUser', 'UserEditCtrl', ['admin']);
// Utils::addRoute('rmUser', 'UserEditCtrl', ['admin']);

// Utils::addRoute('authors', 'AuthorCtrl');
// Utils::addRoute('addAuthor', 'AuthorCtrl', ['admin']);
// Utils::addRoute('rmAuthor', 'AuthorCtrl', ['admin']);

Utils::addRoute('titles', 'TitleCtrl');
// Utils::addRoute('addTitle', 'TitleCtrl', ['admin']);
// Utils::addRoute('rmTitle', 'TitleCtrl', ['admin']);

// Utils::addRoute('books', 'BookCtrl');
// Utils::addRoute('addBook', 'BookCtrl', ['admin']);
// Utils::addRoute('rmBook', 'BookCtrl', ['admin']);

// Utils::addRoute('extend', 'BookCtrl', ['user']);