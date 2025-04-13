<?php
session_start();


require_once dirname(__FILE__).'/init.php';

use app\controllers\MainCtrl;
use app\controllers\LoginCtrl;
use app\controllers\CalculatorCtrl;

$router = new core\Router();

$router->addRoute('login', 'LoginCtrl');
$router->addRoute('logout', 'LoginCtrl');

$router->setDefaultRoute('main');
$router->addRoute('main', 'MainCtrl');

$router->addRoute('calcCompute', 'CalculatorCtrl', ['user', 'admin']);
$router->addRoute('calcShow', 'CalculatorCtrl', ['user', 'admin']);

$router->setLoginRoute('main');

$router->addRoute('calc', 'CalculatorCtrl', ['user', 'admin']);

$action = getFromRequest('action');
$router->setAction($action);
$router->go();
