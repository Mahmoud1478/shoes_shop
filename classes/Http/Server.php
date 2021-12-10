<?php

namespace Http;

use JetBrains\PhpStorm\Pure;

class Server
{
    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
    public static function query(): array
    {
        $result = [] ;
        foreach (explode('&',$_SERVER['QUERY_STRING']) as $item){
            $items = explode('=',$item);
            $result[$items[0]]=$items[1];
        }
        return $result;
    }
    public static function view(): array
    {
        return $_SERVER;
    }
}