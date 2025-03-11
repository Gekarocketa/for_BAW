<?php
require_once dirname(__FILE__).'/../config.php';

session_start();
$_SESSION = array(); // Очищаем массив сессии
session_destroy();
header("Location: "._APP_URL."/app/login.php");
exit();