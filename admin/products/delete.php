<?php
include_once '../../app.php';
use Http\Server;
use database\Products;
if (Server::method() === 'POST'&& isset(Server::query()['id'])){
    $model = new Products();
    $model->delete()->where('id',Server::query()['id'])->save();
}
redirectFromCurrent('/all-products.php');