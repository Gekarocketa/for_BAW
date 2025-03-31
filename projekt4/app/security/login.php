<?php
require_once dirname(__FILE__, 3) . '/config.php';

session_start();

// Если пользователь уже залогинен, перенаправляем его на калькулятор
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    header("Location: " . _APP_URL . "/calc.php");
    exit();
}

// Список пользователей
$users = [
    'admin' => ['password' => '12345', 'role' => ROLE_ADMIN],
    'user'  => ['password' => 'userpass', 'role' => ROLE_USER]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    // Изменено: теперь берем значение поля "password"
    $password = trim($_POST['password'] ?? '');

    // Если хотя бы одно поле не заполнено, перенаправляем на главную страницу
    if ($login === '' || $password === '') {
        header("Location: " . _APP_URL . "/index.html");
        exit();
    }

    // Проверяем, существует ли пользователь и совпадает ли пароль
    if (isset($users[$login]) && $users[$login]['password'] === $password) {
        // Успешная авторизация: сохраняем данные в сессии
        $_SESSION['logged']   = true;
        $_SESSION['username'] = $login;
        $_SESSION['role']     = $users[$login]['role'];

        header("Location: " . _APP_URL . "/calc.php");
        exit();
    } else {
        // Неверные данные: перенаправляем на главную страницу
        header("Location: " . _APP_URL . "/index.html");
        exit();
    }
}

// Если запрос не POST, перенаправляем на главную страницу
header("Location: " . _APP_URL . "/index.html");
exit();
