<?php
require_once dirname(__FILE__).'/config.php';

session_start();

// Jeśli użytkownik nie jest zalogowany, przekieruj na stronę logowania
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: "._APP_URL."/app/login.php");
    exit();
}

// Jeśli zalogowany, pokaż kalkulator
include _ROOT_PATH.'/app/calc_view.php';