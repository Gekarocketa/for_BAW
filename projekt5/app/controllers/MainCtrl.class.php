<?php

namespace app\controllers;

// удаляем или комментируем следующую строку, если класс Utils не нужен
// use core\Utils;
use app\controllers\CalculatorCtrl;

class MainCtrl {
    public function process() {
        // Вызываем функцию getFromRequest, определённую в core/functions.php
        $action = getFromRequest('action');
        if (empty($action)) {
            header("Location: index.html");
            exit;
        } elseif ($action == 'calc') {
            $calcCtrl = new CalculatorCtrl();
            $calcCtrl->calculate();
        } else {
            // Обработка других действий
        }
    }
}
