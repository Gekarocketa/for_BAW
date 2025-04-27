<?php
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

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
        $smarty->assign('app_url', getConf()->app_url);
        $smarty->assign('role',    isset($_SESSION['user']) ? unserialize($_SESSION['user'])->role : 'brak');
        $smarty->setTemplateDir(array(
            'one' => getConf()->root_path . '/app/views',
            'two' => getConf()->root_path . '/app/views/templates'
        ));
    }
    return $smarty;
}
$db = null;
function &getDB() {
    global $conf, $db;
    if (!isset($db)) {
        require_once getConf()->root_path . '/medoo/Medoo.php';
        $db = new \Medoo\Medoo([
            'database_type' => & $conf->db_type,
            'server'        => & $conf->db_server,
            'database_name' => & $conf->db_name,
            'username'      => & $conf->db_user,
            'password'      => & $conf->db_pass,
            'charset'       => & $conf->db_charset,
            'port'          => & $conf->db_port,
            'prefix'        => & $conf->db_prefix,
            'option'        => & $conf->db_option,
        ]);
    }
    return $db;
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