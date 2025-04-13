<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'core/Config.class.php';
$conf = new core\Config();
require_once 'config.php';

function &getConf(){
    global $conf;
    return $conf;
}

require_once 'core/Messages.class.php';
$msgs = new core\Messages();

function &getMessages(){
    global $msgs;
    return $msgs;
}

$smarty = null;
function &getSmarty(){
    global $smarty;
    if (!isset($smarty)){
        include_once __DIR__ . '/smarty/libs/Smarty.class.php';
        $smarty = new \Smarty\Smarty();
        $smarty->assign('conf', getConf());
        $smarty->assign('msgs', getMessages());
        $smarty->setTemplateDir(array(
            'one' => getConf()->root_path . '/app/views',
            'two' => getConf()->root_path . '/app/views/templates'
        ));
    }
    return $smarty;
}

require_once 'core/ClassLoader.class.php';
$cloader = new core\ClassLoader();
function &getLoader() {
    global $cloader;
    return $cloader;
}

getLoader()->addPath('');
getLoader()->addPath('/app/controllers');
getLoader()->addPath('/app/forms');
getLoader()->addPath('/app/transfer');
getLoader()->addPath('/core');

spl_autoload_register(array(getLoader(), 'autoload'));

require_once getConf()->root_path.'/core/Router.class.php';
$router = new core\Router();
function &getRouter() {
    global $router;
    return $router;
}

require_once 'core/functions.php';

if (isset($_SESSION['_roles'])) {
    getConf()->roles = unserialize($_SESSION['_roles']);
}

$action = getFromRequest('action');