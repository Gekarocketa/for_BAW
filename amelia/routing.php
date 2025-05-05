<?php
use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('main');

Utils::addRoute('main',   'MainCtrl');        // GET  /?action=main  или просто /
Utils::addRoute('login',  'LoginCtrl');       // GET/POST /?action=login
Utils::addRoute('logout', 'LoginCtrl');       // GET  /?action=logout  → LoginCtrl::action_logout
Utils::addRoute('calc',   'CalculatorCtrl');  // GET/POST /?action=calc

