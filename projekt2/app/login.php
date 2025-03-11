<?php
require_once dirname(__FILE__).'/../config.php';

session_start();

// Sprawdzanie czy użytkownik już zalogowany
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    header("Location: "._APP_URL."/app/calc.php");
    exit();
}

// Proste dane logowania (w praktyce powinno być w bazie danych)
$valid_login = "admin";
$valid_password = "12345";

$messages = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($login) || empty($password)) {
        $messages[] = "Wypełnij wszystkie pola!";
    } elseif ($login === $valid_login && $password === $valid_password) {
        $_SESSION['logged'] = true;
        header("Location: "._APP_URL."/app/calc.php");
        exit();
    } else {
        $messages[] = "Błędny login lub hasło!";
    }
}

include 'login_view.php';