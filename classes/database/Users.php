<?php
namespace database;

use \database\inc\BaseModel;


class Users extends BaseModel
{
    public function name(): string
    {
        return $this->tableName;
    }
}