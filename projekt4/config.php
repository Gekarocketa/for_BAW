<?php
define('_ROOT_PATH', dirname(__FILE__));
require_once _ROOT_PATH . '/lib/smarty/libs/Smarty.class.php';

define('_SERVER_NAME', 'localhost');
define('_SERVER_URL', 'http://' . _SERVER_NAME);
define('_APP_ROOT', '/projekt4');
define('_APP_URL', _SERVER_URL . _APP_ROOT);
define('ROLE_ADMIN', 'admin');
define('ROLE_USER', 'user');

?>