<?php
require_once dirname(__FILE__, 3).'/config.php';

session_start();

// Sprawdzanie czy użytkownik już zalogowany
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    header("Location: "._APP_URL."/app/calc.php");
    exit();
}

//данные логинов
$users = [
    'admin' => ['password' => '12345', 'role' => ROLE_ADMIN],
    'user' => ['password' => 'userpass', 'role' => ROLE_USER]
];

$messages = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($login) || empty($password)) {
        $messages[] = "Wypełnij wszystkie pola!";
    } elseif (isset($users[$login]) && $users[$login]['password'] === $password) {
        $_SESSION['logged'] = true;
        $_SESSION['role'] = $users[$login]['role'];
        $_SESSION['username'] = $login;
        header("Location: "._APP_URL."/app/calc.php");
        exit();
    } else {
        $messages[] = "Błędny login lub hasło!";
    }
}

include 'login_view.php';
?>