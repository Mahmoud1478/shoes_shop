<?php
include_once '../../app.php';
use Http\Server;
use database\Users;
if (!$_SESSION['user']->permissions == 2){
    redirect('');
}
if (Server::method() === 'POST'&& isset($_GET['id'])){
    $model = new Users();
    $model->delete()->where('id',Server::query()['id'])->save();
}
redirectFromCurrent('/all-users.php');