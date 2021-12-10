<?php
include_once '../../app.php';
use Http\Server;
if (Server::method() === 'POST'&& isset(Server::query()['id'])){
    $model = new \database\Users();
    $model->delete()->where('id',Server::query()['id'])->save();
}
redirect('/all-users.php');