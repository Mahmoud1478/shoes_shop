<?php


use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function dd($value){
    echo '<pre>';
    if (is_string($value) || is_bool($value)){
        echo $value;
    }else{
        print_r($value);
    }
    echo '</pre>';
    die();
}

#[NoReturn] function redirect(string $url , int $status = 303){
    header('location:'.Home.$url ,response_code:$status);
    die();
}



