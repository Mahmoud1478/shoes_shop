<?php

if (!session_id()){
    session_start();
}
require_once 'config.php';

require_once 'autoload.php';
require_once 'helpFunctions.php';