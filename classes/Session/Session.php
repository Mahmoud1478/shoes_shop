<?php


namespace Session;
class Session
{
    private function __construct(){}

    public static function has(string $key )
    {
        return isset($_SESSION[$key]);
    }
    public static function start(){
        if (!session_id()){
            session_start();
        }
    }

    public static function get(string $key)
    {
        return static::has($key) ? $_SESSION[$key] :false;
    }

    public static function destroy()
    {
        unset($_SESSION);
    }

    public static function remove($key)
    {
        if (static::has($key)){
            unset($_SESSION[$key]);
            return $key;
        }
        return false;
    }

    public static function flash($key)
    {
        if (static::has($key)){
            $value = $_SESSION[$key];
            static::remove($key);
            return $value;
        }
    }
}