<?php
include_once 'app.php';
if (isset($_SESSION['user'])){
    unset($_SESSION['user']);
}
redirectFromCurrent('');