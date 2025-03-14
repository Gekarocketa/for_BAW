<?php
require_once dirname(__FILE__).'/config.php';

session_start();

// Если пользователь не авторизован, перенаправляем на страницу логина
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: "._APP_URL."/app/security/login.php");
    exit();
}

// Если авторизован, перенаправляем на калькулятор
header("Location: "._APP_URL."/app/calc.php");
exit();
?>