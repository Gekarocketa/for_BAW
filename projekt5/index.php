<?php
require_once 'init.php';

use app\controllers\MainCtrl;

getLoader()->addPath('/core');

$ctrl = new MainCtrl();
$ctrl->process();
?>
