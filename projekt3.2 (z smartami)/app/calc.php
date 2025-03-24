<?php
require_once dirname(__FILE__, 2) . '/config.php';
require_once dirname(__FILE__, 2) . '/libs/smarty/libs/Smarty.class.php';

session_start();

// 1. Autoryzacja
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: " . _APP_URL . "/app/security/login.php");
    exit();
}

// 2. Pobieranie danych
$loanAmount = $_POST['loanAmount'] ?? '';
$loanPeriod = $_POST['loanPeriod'] ?? '';
$interestRate = $_POST['interestRate'] ?? '';
$messages = [];
$result = null;

// 3. Walidacja
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($loanAmount === '') $messages[] = 'Nie podano kwoty kredytu';
    if ($loanPeriod === '') $messages[] = 'Nie podano okresu kredytowania';
    if ($interestRate === '') $messages[] = 'Nie podano oprocentowania';

    if (empty($messages)) {
        if (!is_numeric($loanAmount)) $messages[] = 'Kwota kredytu nie jest liczbą';
        if (!is_numeric($loanPeriod)) $messages[] = 'Okres kredytowania nie jest liczbą';
        if (!is_numeric($interestRate)) $messages[] = 'Oprocentowanie nie jest liczbą';

        if (is_numeric($loanAmount) && $loanAmount <= 0) $messages[] = 'Kwota musi być > 0';
        if (is_numeric($loanPeriod) && $loanPeriod <= 0) $messages[] = 'Okres musi być > 0';
        if (is_numeric($interestRate) && $interestRate < 0) $messages[] = 'Oprocentowanie nie może być ujemne';

        if ($_SESSION['role'] === ROLE_USER) {
            if ($loanAmount < 1000) $messages[] = 'Kwota < 1000 (tylko admin może)';
            if ($loanAmount > 300000) $messages[] = 'Kwota > 300000';
            if ($loanPeriod < 1) $messages[] = 'Okres < 1 rok';
            if ($loanPeriod > 30) $messages[] = 'Okres > 30 lat';
            if ($interestRate < 3.5) $messages[] = 'Oprocentowanie < 3.5%';
        } elseif ($_SESSION['role'] === ROLE_ADMIN) {
            if ($loanPeriod > 50) $messages[] = 'Admin: okres > 50 lat niedozwolony';
        }

        if (empty($messages)) {
            $amount = floatval($loanAmount);
            $years = floatval($loanPeriod);
            $interest = floatval($interestRate);

            $months = $years * 12;
            $monthlyInterest = $interest / 100 / 12;

            if ($monthlyInterest > 0) {
                $monthlyPayment = $amount * $monthlyInterest * pow(1 + $monthlyInterest, $months) / (pow(1 + $monthlyInterest, $months) - 1);
            } else {
                $monthlyPayment = $amount / $months;
            }

            $result = number_format($monthlyPayment, 2, '.', ' ');
        }
    }
}

// 4. Inicjalizacja Smarty
$smarty = new Smarty\Smarty();
$smarty->setTemplateDir(dirname(__DIR__) . '/templates');
$smarty->setCompileDir(dirname(__DIR__) . '/templates_c');
$smarty->setCacheDir(dirname(__DIR__) . '/cache');

// 5. Przekazanie danych do widoku
$smarty->assign('app_url', _APP_URL);
$smarty->assign('username', $_SESSION['username']);
$smarty->assign('role', $_SESSION['role']);
$smarty->assign('loanAmount', $loanAmount);
$smarty->assign('loanPeriod', $loanPeriod);
$smarty->assign('interestRate', $interestRate);
$smarty->assign('result', $result);
$smarty->assign('messages', $messages);

// 6. Wyświetlenie widoku
$smarty->display('calc.tpl');
