<?php

define('_ROOT_PATH', dirname(__FILE__));

define('_SERVER_NAME', 'localhost');
define('_SERVER_URL', 'http://' . _SERVER_NAME);
define('_APP_ROOT', '/projekt7');
define('_APP_URL', _SERVER_URL . _APP_ROOT);

if (!isset($conf)) {
    $conf = new stdClass();

}
$conf->debug = true;

$conf->root_path = _ROOT_PATH;
$conf->app_url = _APP_URL;

$conf->action_url = $conf->app_url . '/index.php?action=';

$conf->db_type    = 'mysql';
$conf->db_server  = 'localhost';
$conf->db_name    = 'simpledb';
$conf->db_user    = 'root';
$conf->db_pass    = '';
$conf->db_charset = 'utf8';

// необязательные параметры Medoo
$conf->db_port   = '3306';
$conf->db_prefix = '';
$conf->db_option = [
    PDO::ATTR_CASE => PDO::CASE_NATURAL,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

define('ROLE_ADMIN', 'admin');
define('ROLE_USER', 'user');

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
