<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów
$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : '';
$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : '';
$operation = isset($_REQUEST['op']) ? $_REQUEST['op'] : '';

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
$messages = array();

// sprawdzenie, czy parametry zostały przekazane
if (!(isset($x) && isset($y) && isset($operation))) {
    //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ($x == "") {
    $messages[] = 'Nie podano kwoty kredytu';
}
if ($y == "") {
    $messages[] = 'Nie podano okresu kredytowania';
}
if ($operation == "") {
    $messages[] = 'Nie podano oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty($messages)) {
    
    // sprawdzenie, czy wartości są liczbami
    if (!is_numeric($x)) {
        $messages[] = 'Kwota kredytu nie jest liczbą';
    }
    
    if (!is_numeric($y)) {
        $messages[] = 'Okres kredytowania nie jest liczbą';
    }
    
    if (!is_numeric($operation)) {
        $messages[] = 'Oprocentowanie nie jest liczbą';
    }

    // sprawdzenie, czy wartości są dodatnie
    if (is_numeric($x) && $x <= 0) {
        $messages[] = 'Kwota kredytu musi być większa od zera';
    }
    
    if (is_numeric($y) && $y <= 0) {
        $messages[] = 'Okres kredytowania musi być większy od zera';
    }
    
    if (is_numeric($operation) && $operation < 0) {
        $messages[] = 'Oprocentowanie nie może być ujemne';
    }
}

// 3. wykonaj zadanie jeśli wszystko w porządku
if (empty($messages)) { // gdy brak błędów
    
    //konwersja parametrów na liczby
    $amount = floatval($x);
    $years = floatval($y);
    $interest = floatval($operation);
    
    //obliczenie miesięcznej raty
    $months = $years * 12;
    $monthlyInterest = $interest / 100 / 12;
    
    if ($monthlyInterest > 0) {
        $monthlyPayment = $amount * $monthlyInterest * pow(1 + $monthlyInterest, $months) / (pow(1 + $monthlyInterest, $months) - 1);
    } else {
        $monthlyPayment = $amount / $months;
    }
    
    $result = number_format($monthlyPayment, 2, '.', ' ');
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';
