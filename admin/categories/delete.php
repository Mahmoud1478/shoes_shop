<?php
include_once '../../app.php';
use Http\Server;
if (Server::method() === 'POST'&& isset(Server::query()['id'])){
    $model = new \database\Categories();
    $model->delete()->where('id',Server::query()['id'])->save();
}
redirectFromCurrent('/all-categories.php');