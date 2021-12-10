<?php

namespace mappers;

class PermissionsMapper
{
    private static array $permissions = ['user' , 'admin'];
    public static function getPermission(string $permission){
        return static::$permissions[$permission-1] ?? '';
    }
}