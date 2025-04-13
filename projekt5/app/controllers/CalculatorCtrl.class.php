<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalculatorCtrl {

    private $form;
    private $result;

    public function __construct() {
        // Tworzymy obiekty formularza i wyniku
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    public function getParams() {
        // Pobieramy parametry z żądania i zapisujemy je do właściwości formularza
        // loanAmount – kwota kredytu, loanPeriod – okres kredytowania (w latach), interestRate – roczne oprocentowanie (%)
        $this->form->loanAmount = getFromRequest('loanAmount');
        $this->form->loanPeriod = getFromRequest('loanPeriod');
        $this->form->interestRate = getFromRequest('interestRate');
    }

    public function validate() {
        $this->getParams();

        if (!isset($this->form->loanAmount))
            return false;

        // Sprawdzamy, czy wartości nie są puste
        if (empty(trim($this->form->loanAmount))) {
            getMessages()->addError("Podaj kwotę kredytu");
        }
        if (empty(trim($this->form->loanPeriod))) {
            getMessages()->addError("Podaj okres kredytowania (lata)");
        }
        if (empty(trim($this->form->interestRate))) {
            getMessages()->addError("Podaj oprocentowanie (%)");
        }

        // Sprawdzamy, czy podane wartości są liczbami
        if (!getMessages()->isError()) {
            if (!is_numeric($this->form->loanAmount)) {
                getMessages()->addError("Kwota kredytu musi być liczbą");
            }
            if (!is_numeric($this->form->loanPeriod)) {
                getMessages()->addError("Okres kredytowania musi być liczbą");
            }
            if (!is_numeric($this->form->interestRate)) {
                getMessages()->addError("Oprocentowanie musi być liczbą");
            }
        }

        return !getMessages()->isError();
    }

    /**
     * Oblicza miesięczną ratę kredytu według formuły anuitetowej.
     */
    public function calculate() {
        session_start();
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
            header("Location: " . getConf()->app_url . '/login');
            exit();
        }
        $this->getParams();
        if ($this->validate()) {
            // Pobieramy parametry kredytu
            $P = floatval($this->form->loanAmount);
            $years = floatval($this->form->loanPeriod);
            $annualRate = floatval($this->form->interestRate);

            // Obliczamy liczbę miesięcy i miesięczną stopę procentową
            $n = $years * 12;
            $r = $annualRate / 12 / 100;

            if ($r != 0) {
                $M = $P * ($r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
            } else {
                $M = $P / $n;
            }
            // Zapisujemy wynik (miesięczną ratę) zaokrągloną do 2 miejsc po przecinku
            $this->result->monthlyPayment = round($M, 2);
            getMessages()->addInfo('Parametry poprawne. Trwa obliczanie.');
            $this->generateView();
        } else {
            // Jeśli walidacja nie została zaliczona, wyświetlamy widok z komunikatami o błędach
            $this->generateView();
        }
    }

    /**
     * Generuje widok przy użyciu Smarty.
     */
    public function generateView() {
        getSmarty()->assign('app_url', getConf()->app_url);
        getSmarty()->assign('role', isset($_SESSION['role']) ? $_SESSION['role'] : '');
        // Przekazujemy dane formularza i wyniku jako tablice
        getSmarty()->assign('form', (array)$this->form);
        getSmarty()->assign('result', (array)$this->result);
        getSmarty()->assign('messages', getMessages()->messages);

        getSmarty()->display('calc.tpl');
    }
}
?>
