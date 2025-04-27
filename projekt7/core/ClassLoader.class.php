<?php
namespace core;

class ClassLoader {

    public $paths = array();

    public function __construct() {
    }

    public function addPath($path) {
        $this->paths[] = $path;
    }

    public function autoload($class) {
        $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.class.php';
        $root = rtrim(\getConf()->root_path, DIRECTORY_SEPARATOR);
        $file = $root . DIRECTORY_SEPARATOR . $classFile;
        error_log("Autoloader: trying [$file] for class [$class]");
        if (is_file($file) && is_readable($file)) {
            require_once $file;
            error_log("Autoloader: loaded [$file]");
            return;
        }
        foreach ($this->paths as $dir) {
            $dir = trim($dir, DIRECTORY_SEPARATOR);
            if ($dir) {
                if (strpos($classFile, $dir) === 0) {
                    $relative = substr($classFile, strlen($dir));
                    $file = $root . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . ltrim($relative, DIRECTORY_SEPARATOR);
                } else {
                    $file = $root . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $classFile;
                }
            }
            error_log("Autoloader: trying [$file] for class [$class]");
            if (is_file($file) && is_readable($file)) {
                require_once $file;
                error_log("Autoloader: loaded [$file]");
                return;
            }
        }
    }

}
