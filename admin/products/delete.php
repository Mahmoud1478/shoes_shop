<?php
include_once '../../app.php';
if (!$_SESSION['user']->permissions == 2){
    redirect('');
}
use Http\Server;
use database\Products;
if (Server::method() === 'POST'&& isset(Server::query()['id'])){
    $model = new Products();
    $model->delete()->where('id',Server::query()['id'])->save();
}
redirectFromCurrent('/all-products.php');