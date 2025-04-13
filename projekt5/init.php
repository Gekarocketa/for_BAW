<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'core/Config.class.php';
$conf = new core\Config();
require_once 'config.php'; // ustaw konfigurację

function &getConf(){
    global $conf;
    return $conf;
}

// Закачиваем определение класса Messages и создаём объект
require_once 'core/Messages.class.php';
$msgs = new core\Messages();

function &getMessages(){
    global $msgs;
    return $msgs;
}

// Подготавливаем Smarty, создаём один экземпляр
$smarty = null;
function &getSmarty(){
    global $smarty;
    if (!isset($smarty)){
        // Используем __DIR__ для абсолютного пути относительно init.php
        include_once __DIR__ . '/smarty/libs/Smarty.class.php';
        // Создаём экземпляр Smarty через полное имя класса с пространством имен,
        // как указано в вашем Smarty-стабе (см. комментарий в файле)
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

require_once 'core/ClassLoader.class.php'; // Загружаем автозагрузчик классов
$cloader = new core\ClassLoader();
function &getLoader() {
    global $cloader;
    return $cloader;
}

// Регистрируем пути для автозагрузки
getLoader()->addPath('');
getLoader()->addPath('/app/controllers');
getLoader()->addPath('/app/forms');
getLoader()->addPath('/app/transfer');
getLoader()->addPath('/core');

// Регистрируем автозагрузчик через метод autoload нашего loader'а
spl_autoload_register(array(getLoader(), 'autoload'));

require_once 'core/functions.php';

$action = getFromRequest('action');
?>
