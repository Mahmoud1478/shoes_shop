<?php
include_once '../../app.php';
if (!$_SESSION['user']->permissions == 2){
    redirect('');
}
use Http\Server;
if (Server::method() === 'POST'&& isset(Server::query()['id'])){
    $model = new \database\Categories();
    $model->delete()->where('id',Server::query()['id'])->save();
}
redirectFromCurrent('/all-categories.php');