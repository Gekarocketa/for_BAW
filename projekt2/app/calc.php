<?php
require_once dirname(__FILE__).'/../config.php';

session_start();

// Sprawdzanie autoryzacji
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: "._APP_URL."/app/login.php");
    exit();
}

// 1. pobranie parametrów
$loanAmount = isset($_POST['loanAmount']) ? $_POST['loanAmount'] : '';
$loanPeriod = isset($_POST['loanPeriod']) ? $_POST['loanPeriod'] : '';
$interestRate = isset($_POST['interestRate']) ? $_POST['interestRate'] : '';

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
$messages = array();

if (!(isset($loanAmount) && isset($loanPeriod) && isset($interestRate))) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($loanAmount == "") {
    $messages[] = 'Nie podano kwoty kredytu';
}
if ($loanPeriod == "") {
    $messages[] = 'Nie podano okresu kredytowania';
}
if ($interestRate == "") {
    $messages[] = 'Nie podano oprocentowania';
}

if (empty($messages)) {
    if (!is_numeric($loanAmount)) {
        $messages[] = 'Kwota kredytu nie jest liczbą';
    }
    if (!is_numeric($loanPeriod)) {
        $messages[] = 'Okres kredytowania nie jest liczbą';
    }
    if (!is_numeric($interestRate)) {
        $messages[] = 'Oprocentowanie nie jest liczbą';
    }
    if (is_numeric($loanAmount) && $loanAmount <= 0) {
        $messages[] = 'Kwota kredytu musi być większa od zera';
    }
    if (is_numeric($loanPeriod) && $loanPeriod <= 0) {
        $messages[] = 'Okres kredytowania musi być większy od zera';
    }
    if (is_numeric($loanPeriod) && $loanPeriod > 50) { // Добавляем верхний предел
        $messages[] = 'Okres kredytowania nie może być większy niż 50 lat';
    }
    if (is_numeric($interestRate) && $interestRate < 0) {
        $messages[] = 'Oprocentowanie nie może być ujemne';
    }
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

include 'calc_view.php';