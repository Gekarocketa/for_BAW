<?php

namespace app\controllers;

use core\App;

class MainCtrl {

    public function action_main() {
        App::getSmarty()->display('main.tpl');
    }

    public function process() {
        $action = getFromRequest('action');
        if (empty($action) || $action === 'main') {
            $this->action_main();
        } elseif ($action === 'calc') {
            $calc = new CalculatorCtrl();
            $calc->action_calc();
        } else {
            header("Location: index.php?action=main");
            exit;
        }
    }
}
