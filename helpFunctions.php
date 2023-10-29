<?php

#[NoReturn] function dd(...$values): void
{
    array_map(function ($value) {
        echo '<pre>';
        if (is_array($value) || is_object($value)) {
            var_dump($value);

        } else {
            echo $value;
        }
        echo '</pre>';
    }, $values);
    die();
}

function redirectFromCurrent(string $url, int $status = 303)
{
    header('location:' . CWD . $url, true, $status);
    exit();
}

function redirect(string $url, int $status = 303)
{
    header('location:' . DOC_ROOT . $url, true, $status);
    //echo DOC_ROOT.$url;
    exit();
}

function urlFromCurrent(string $url): string
{
    return CWD . $url;
}

function url(string $url): string
{
    return DOC_ROOT . $url;
}

function frontAssets(string $file)
{
    echo DOC_ROOT . $file;
}

function adminAssets(string $file)
{
    echo DOC_ROOT . ADMIN_ROOT . 'assets' . $file;
}

function loadHeader()
{

}

function loadFooter()
{

}

function setTitle()
{
    global $title;
    echo $title ?? '';
}
