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
Utils::addRoute('saveuser', 'UserEditCtrl', ['admin']);
// Utils::addRoute('rmUser', 'UserEditCtrl', ['admin']);

Utils::addRoute('authors', 'AuthorCtrl', ['admin']);
Utils::addRoute('authorform', 'AuthorEditCtrl', ['admin']);
Utils::addRoute('saveauthor', 'AuthorEditCtrl', ['admin']);
// Utils::addRoute('rmAuthor', 'AuthorEditCtrl', ['admin']);

Utils::addRoute('titles', 'TitleCtrl');
Utils::addRoute('titlestable', 'TitleCtrl');
Utils::addRoute('titleform', 'TitleEditCtrl', ['admin']);
Utils::addRoute('savetitle', 'TitleEditCtrl', ['admin']);
// Utils::addRoute('rmtitle', 'TitleCtrl', ['admin']);

// Utils::addRoute('books', 'BookCtrl');
// Utils::addRoute('addbook', 'BookCtrl', ['admin']);
// Utils::addRoute('rmbook', 'BookCtrl', ['admin']);

Utils::addRoute('categories', 'CategoryCtrl', ['admin']);
Utils::addRoute('categoryform', 'CategoryEditCtrl', ['admin']);
Utils::addRoute('savecategory', 'CategoryEditCtrl', ['admin']);
// Utils::addRoute('categoryform', 'CategoryEditCtrl', ['admin']);


// Utils::addRoute('extend', 'BookCtrl', ['user']);