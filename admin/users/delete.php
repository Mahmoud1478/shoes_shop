<?php
include_once '../../app.php';
use Http\Server;
use database\Users;
if (!$_SESSION['user']->permissions == 2){
    redirect('');
}
if (Server::method() === 'POST'&& isset($_GET['id'])){
    $model = new Users();
    $model->where('id',$_GET['id'])->delete()->save();
}
redirectFromCurrent('/all-users.php');