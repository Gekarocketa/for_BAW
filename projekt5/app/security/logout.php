<?php
require_once dirname(__FILE__, 3).'/config.php';

session_start();
$_SESSION = array(); // Очищаем массив сессии
session_destroy();
header("Location: " . _APP_URL . "/index.html");
exit();
?>