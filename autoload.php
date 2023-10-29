<?php
function auto_load_classes($className): void
{
    $className = str_replace('\\',DIRECTORY_SEPARATOR,$className);
//    echo '<pre>' . (file_exists(Root . DS . 'classes' . DS . $className . '.php')? 'yes' : "no") . '</pre><br>';
//    echo __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $className . '.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $className . '.php';
}
spl_autoload_register('auto_load_classes');

