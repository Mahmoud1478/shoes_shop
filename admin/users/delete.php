<?php
include_once '../../app.php';
use Http\Server;
use database\Users;
if (Server::method() === 'POST'&& isset(Server::query()['id'])){
    $model = new Users();
    $model->delete()->where('id',Server::query()['id'])->save();
}
redirectFromCurrent('/all-users.php');