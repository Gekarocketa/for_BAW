<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalculatorCtrl {

    private $form;
    private $result;

    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    public function action_calc() {
        $this->getParams();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->validate()) {
                $this->calculate();
            }
        }

        $this->generateView(); // всегда рендерим — с результатом, или с ошибками, или пустой
    }

    public function getParams() {
        $this->form->loanAmount = getFromRequest('loanAmount');
        $this->form->loanPeriod = getFromRequest('loanPeriod');
        $this->form->interestRate = getFromRequest('interestRate');
    }

    public function validate() {
        if (!isset($this->form->loanAmount)) return false;

        if ($this->form->loanAmount === '') {
            getMessages()->addError("Podaj kwotę kredytu");
        }
        if ($this->form->loanPeriod === '') {
            getMessages()->addError("Podaj okres kredytowania (lata)");
        }
        if ($this->form->interestRate === '') {
            getMessages()->addError("Podaj oprocentowanie (%)");
        }

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

    public function calculate() {
        $P = floatval($this->form->loanAmount);
        $years = floatval($this->form->loanPeriod);
        $annualRate = floatval($this->form->interestRate);

        $n = $years * 12;
        $r = $annualRate / 12 / 100;

        if ($r != 0) {
            $M = $P * ($r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
        } else {
            $M = $P / $n;
        }

        $this->result->monthlyPayment = round($M, 2);
        getMessages()->addInfo("Obliczenia zakończone pomyślnie.");
    }

    public function generateView() {
        getSmarty()->assign('app_url', getConf()->app_url);
        getSmarty()->assign('role', isset($_SESSION['user']) ? unserialize($_SESSION['user'])->role : 'brak');
        getSmarty()->assign('form', (array)$this->form);
        getSmarty()->assign('result', (array)$this->result);
        getSmarty()->assign('msgs', getMessages());

        getSmarty()->display('calc.tpl');
    }
}
