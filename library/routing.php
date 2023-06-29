<?php

use core\App;
use core\Utils;

Utils::addRoute('hello', 'HelloCtrl');

App::getRouter()->setDefaultRoute('titleslist'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl', ['user', 'admin']);

Utils::addRoute('users', 'UserCtrl', ['admin']);
Utils::addRoute('userform', 'UserEditCtrl', ['admin']);
Utils::addRoute('saveuser', 'UserEditCtrl', ['admin']);
Utils::addRoute('userdetails', 'UserDetailsCtrl', ['admin']);

Utils::addRoute('authors', 'AuthorCtrl', ['admin']);
Utils::addRoute('authorform', 'AuthorEditCtrl', ['admin']);
Utils::addRoute('saveauthor', 'AuthorEditCtrl', ['admin']);

Utils::addRoute('titles', 'TitleCtrl', ['admin']);
Utils::addRoute('titleform', 'TitleEditCtrl', ['admin']);
Utils::addRoute('savetitle', 'TitleEditCtrl', ['admin']);

Utils::addRoute('books', 'BookCtrl');
Utils::addRoute('addbook', 'BookCtrl', ['admin']);
// Utils::addRoute('rmbook', 'BookCtrl', ['admin']);

Utils::addRoute('categories', 'CategoryCtrl', ['admin']);
Utils::addRoute('categoryform', 'CategoryEditCtrl', ['admin']);
Utils::addRoute('savecategory', 'CategoryEditCtrl', ['admin']);

Utils::addRoute('titleslist', 'TitlesListCtrl');

Utils::addRoute('borrowform', 'BorrowEditCtrl');
Utils::addRoute('addborrowing', 'BorrowEditCtrl');
Utils::addRoute('endborrowing', 'BorrowEditCtrl');

Utils::addRoute('showprofile', 'ProfileCtrl', ['user']);

Utils::addRoute('extend', 'ProfileCtrl', ['user']);