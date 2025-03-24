<?php
require_once dirname(__FILE__, 3) . '/config.php';

session_start();

// Jeśli użytkownik jest już zalogowany, przekieruj na kalkulator
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    header("Location: " . _APP_URL . "/app/calc.php");
    exit();
}

// Dane użytkowników (loginy, hasła, role)
$users = [
    'admin' => ['password' => '12345',    'role' => ROLE_ADMIN],
    'user'  => ['password' => 'userpass', 'role' => ROLE_USER]
];

// Obsługa formularza
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login    = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // 1) Pola puste?
    if ($login === '' || $password === '') {
        // Przekierowanie na index.html z parametrem ?error=1
        header("Location: " . _APP_URL . "/index.html?error=1");
        exit();
    }

    // 2) Poprawne dane logowania?
    if (isset($users[$login]) && $users[$login]['password'] === $password) {
        // Ustawienie zmiennych sesji
        $_SESSION['logged']   = true;
        $_SESSION['role']     = $users[$login]['role'];
        $_SESSION['username'] = $login;

        // Przekierowanie na kalkulator
        header("Location: " . _APP_URL . "/app/calc.php");
        exit();
    } else {
        // Niewłaściwe dane logowania
        header("Location: " . _APP_URL . "/index.html?error=1");
        exit();
    }
}

// Jeśli użytkownik wszedł na login.php metodą GET (bez POST), np. bezpośrednio w przeglądarce
// to przekierowujemy na index.html (lub możesz tu wyświetlić inny komunikat).
header("Location: " . _APP_URL . "/index.html");
exit();
