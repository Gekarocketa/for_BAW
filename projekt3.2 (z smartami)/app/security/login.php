<?php
require_once dirname(__FILE__, 3) . '/config.php';
require_once dirname(__FILE__, 3) . '/libs/smarty/libs/Smarty.class.php';

session_start();

// Jeśli użytkownik jest już zalogowany, przekieruj go do kalkulatora
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    header("Location: " . _APP_URL . "/app/calc.php");
    exit();
}

// Lista użytkowników
$users = [
    'admin' => ['password' => '12345',    'role' => ROLE_ADMIN],
    'user'  => ['password' => 'userpass', 'role' => ROLE_USER]
];

$messages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($login === '' || $password === '') {
        $messages[] = "Wypełnij wszystkie pola!";
    } elseif (isset($users[$login]) && $users[$login]['password'] === $password) {
        // Logowanie poprawne
        $_SESSION['logged'] = true;
        $_SESSION['username'] = $login;
        $_SESSION['role'] = $users[$login]['role'];

        header("Location: " . _APP_URL . "/app/calc.php");
        exit();
    } else {
        $messages[] = "Błędny login lub hasło!";
    }
}

// Inicjalizacja Smarty
$smarty = new Smarty\Smarty();
$smarty->setTemplateDir(dirname(__DIR__, 2) . '/templates');
$smarty->setCompileDir(dirname(__DIR__, 2) . '/templates_c');
$smarty->setCacheDir(dirname(__DIR__, 2) . '/cache');

// Przekazanie danych do widoku
$smarty->assign('app_url', _APP_URL);
$smarty->assign('messages', $messages);

// Wyświetlenie szablonu logowania
$smarty->display('login.tpl');
