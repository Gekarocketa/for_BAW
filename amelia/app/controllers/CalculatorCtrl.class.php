<?php
namespace app\controllers;

use core\App;

class CalculatorCtrl {

    public function action_calc() {
        App::getSmarty()->display('calc.tpl');
    }
}
