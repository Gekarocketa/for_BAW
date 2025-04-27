<?php
session_start();

require_once __DIR__ . '/init.php';

use app\controllers\MainCtrl;
use app\controllers\LoginCtrl;
use app\controllers\CalculatorCtrl;
use app\controllers\PersonListCtrl;
use app\controllers\PersonEditCtrl;

// 1. Инициализируем роутер
$router = new core\Router();

// 2. Маршруты для аутентификации
$router->addRoute('login', 'LoginCtrl');
$router->addRoute('logout', 'LoginCtrl');
$router->setLoginRoute('login');

// 3. Главная страница
$router->setDefaultRoute('main');
$router->addRoute('main', 'MainCtrl');

// 4. Калькулятор (только для залогиненных пользователей)
$router->addRoute('calc',        'CalculatorCtrl', ['user','admin']);
$router->addRoute('calcCompute','CalculatorCtrl', ['user','admin']);
$router->addRoute('calcShow',   'CalculatorCtrl', ['user','admin']);

// 5. CRUD для Person (доступно user и admin)
$router->addRoute('personList',   'PersonListCtrl', ['user','admin']);
$router->addRoute('personNew',    'PersonEditCtrl', ['user','admin']);
$router->addRoute('personEdit',   'PersonEditCtrl', ['user','admin']);
$router->addRoute('personSave',   'PersonEditCtrl', ['user','admin']);
$router->addRoute('personDelete', 'PersonListCtrl', ['user','admin']);

// 6. Диспетчеризация запроса
$action = getFromRequest('action');
$router->setAction($action);
$router->go();
