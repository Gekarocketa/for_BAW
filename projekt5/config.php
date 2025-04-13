<?php
// Определяем корневой путь (будет равен "D:\Games\xamp\htdocs\projekt4", если config.php в корне)
define('_ROOT_PATH', dirname(__FILE__));

// Подключаем Smarty из папки "smarty/libs"
require_once _ROOT_PATH . '/smarty/libs/Smarty.class.php';

// Определяем константы сервера и приложения
define('_SERVER_NAME', 'localhost');
define('_SERVER_URL', 'http://' . _SERVER_NAME);
define('_APP_ROOT', '/projekt5');
define('_APP_URL', _SERVER_URL . _APP_ROOT);

// Если переменная $conf не определена, создаём её как объект
if (!isset($conf)) {
    $conf = new stdClass();
}

$conf->root_path = _ROOT_PATH;  // папка проекта на диске
$conf->app_url = _APP_URL;      // 'http://localhost/projekt4'

// Определяем роли (при необходимости)
define('ROLE_ADMIN', 'admin');
define('ROLE_USER', 'user');

// Дополнительно включим отображение ошибок (при необходимости в отладке)
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
