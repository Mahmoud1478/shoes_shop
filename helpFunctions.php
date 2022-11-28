<?php



function dd($value){
    echo '<pre>';
    if (is_string($value) || is_bool($value)){
        echo $value;
    }else{
        print_r($value);
    }
    echo '</pre>';
    die();
}

function redirectFromCurrent(string $url , int $status = 303)
{
    header('location:'.CWD.$url ,true , $status);
    exit();
}
function redirect(string $url , int $status = 303){
    header('location:'.DOC_ROOT.$url ,true , $status);
    //echo DOC_ROOT.$url;
    exit();
}

function urlFromCurrent(string $url): string
{
    return CWD.$url;
}
function url(string $url): string
{
    return DOC_ROOT.$url;
}
function frontAssets(string $file)
{
    echo DOC_ROOT.$file;
}
function adminAssets(string $file)
{
    echo DOC_ROOT.ADMIN_ROOT.'assets'.$file;
}

function loadHeader(){

}
function loadFooter(){

}

function setTitle(){
    global $title;
    echo $title ?? '';
}


