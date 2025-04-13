<?php
namespace app\forms;

class CalcForm {
    public ?string $loanAmount = null;   // Kwota kredytu
    public ?string $loanPeriod = null;     // Okres kredytowania (w latach)
    public ?string $interestRate = null;   // Oprocentowanie (roczne, w %)
}
?>
