<?php
    function auto_load_classes($className){
        require_once Root.DS.'classes'.DS.$className.'.php';
        //echo Root.DS.'classes'.DS.$className.'.php';
    }

    spl_autoload_register('auto_load_classes');