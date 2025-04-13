<?php
define('_ROOT_PATH', dirname(__FILE__));

require_once _ROOT_PATH . '/smarty/libs/Smarty.class.php';

// Определяем константы сервера и приложения
define('_SERVER_NAME', 'localhost');
define('_SERVER_URL', 'http://' . _SERVER_NAME);
define('_APP_ROOT', '/projekt6');
define('_APP_URL', _SERVER_URL . _APP_ROOT);

if (!isset($conf)) {
    $conf = new stdClass();
}

$conf->root_path = _ROOT_PATH;
$conf->app_url = _APP_URL;

define('ROLE_ADMIN', 'admin');
define('ROLE_USER', 'user');

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
