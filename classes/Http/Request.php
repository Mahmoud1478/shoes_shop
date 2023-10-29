<?php

namespace Http;

class Request
{

    private array $request = [];
    private array $post = [];
    private array $get = [];
    private string $url = '/';
    private array $segments = [];

    public function __construct(
        private readonly string $uri,
        private readonly string $method,
    )
    {
        $this->url = explode('?', $this->uri)[0];
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
        $this->segments = array_keys($this->get);
    }

    public static function capture(Server $server): Request
    {
        return new self($server->get('REQUEST_URI'), $server->get('REQUEST_METHOD'));
    }

    public function get(string $key, mixed $default = null)
    {
        return $this->get[$key] ?? $default;
    }

    public function post(string $key, mixed $default = null)
    {
        return $this->post[$key] ?? $default;
    }

    public function request(string $key, mixed $default = null)
    {
        return $this->request[$key] ?? $default;
    }

    public function __get(string $name)
    {
        return $this->request($name);
    }

    public function method(): string
    {
        return $this->method;
    }

    public function fullUrl(): string
    {
        return $this->uri;
    }

    public function url(): string
    {
        return $this->url;
    }

    function all(): array
    {
        return $this->request;
    }

    public function segmentValue(int|string $idx)
    {
        return $this->get($this->segmentKey($idx));
    }

    public function segmentKey(int|string $idx): string
    {
        return $this->segments[$idx] ?? '';
    }

    public function isMethod(string $method): bool
    {
        return strtoupper($method) == $this->method;
    }

    public function headers(): array
    {
        return http_get_request_headers();
    }
}