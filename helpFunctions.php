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

#[NoReturn] function redirectFromCurrent(string $url , int $status = 303){
    header('location:'.CWD.$url ,response_code:$status);
    die();
}
#[NoReturn] function redirect(string $url , int $status = 303){
    header('location:'.DOC_ROOT.$url ,response_code:$status);
    //echo DOC_ROOT.$url;

    die();
}

function urlFromCurrent(string $url): string
{
    return CWD.$url;
}
function url(string $url): string
{
    return DOC_ROOT.$url;
}

