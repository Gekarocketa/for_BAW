<?php
session_start();
require_once 'config.php';
require_once _ROOT_PATH . '/lib/smarty/libs/Smarty.class.php';
require_once 'app/CalcCtrl.class.php';

if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: " . _APP_URL . "/app/security/login.php");
    exit();
}

$ctrl = new CalcCtrl();
$ctrl->process();
