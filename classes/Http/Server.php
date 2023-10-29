<?php

namespace Http;

use JetBrains\PhpStorm\Pure;

class Server
{

    public function __construct(private readonly array $data){}
    public function all(): array
    {
        return $this->data;
    }
    function get(string $key)
    {
        return $this->data[$key]?? null;
    }
    public function __get(string $name)
    {
        return $this->data[strtoupper($name)] ?? null;
    }
}