<?php

namespace app\controllers;

use app\controllers\CalculatorCtrl;

class MainCtrl {

    public function action_main() {
        include_once getConf()->root_path.'/main.html';
    }

    public function process() {
        $action = getFromRequest('action');
        if (empty($action)) {
            header("Location: index.html");
            exit;
        } elseif ($action == 'calc') {
            $calcCtrl = new CalculatorCtrl();
            $calcCtrl->calculate();
        } else {
        }
    }
}
