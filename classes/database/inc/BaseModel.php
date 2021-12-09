<?php

namespace database\inc;

class BaseModel extends Connection
{
    protected  string $tableName;

    public function __construct()
    {
        parent::__construct();
        $this->tableName = $this->getName();

    }

    private function getName(): bool|string
    {
        $exploded_ = explode(DS,static::class);
        return end($exploded_);
    }



}