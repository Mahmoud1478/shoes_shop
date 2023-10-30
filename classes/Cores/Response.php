<?php

namespace Cores;

use Http\Request;
use Session\Session;

class Response
{

    public function __construct(private readonly Request $request, private readonly Session $session){}

    function code(int $code = 200): self
    {
        http_response_code($code);
        return $this;
    }

    function headers(): array
    {
        return headers_list();
    }

    function contentType(string $type): self
    {
        header("content-type:$type");
        return $this;
    }


    function redirect(string $to): self
    {
        header("location:$to");
        return $this;
    }


    function json(): self
    {
        return $this->contentType('application/json; charset=utf-8');
    }

    function sendJson(mixed $data): void
    {
        $this->json()->send($data);

    }

    function ok(): self
    {
        return $this->code(200);
    }

    function created(): self
    {
        return $this->code(201);
    }

    function noContent(): self
    {
        return $this->code(204);
    }

    function notFound(): self
    {
        return $this->code(404);
    }

    function badRequest(): self
    {
        return $this->code(400);
    }

    function forbidden(): self
    {
        return $this->code(403);
    }

    function unauthorized(): self
    {
        return $this->code(401);
    }

    function serverError(): self
    {
        return $this->code(500);
    }

    public function back(): self
    {
        return $this->redirect($this->request->previousUrl());
    }

    public function with(array $data): self
    {
        foreach ($data as $key => $value) {
            $this->session->set($key, $value);
        }
        return $this;
    }


    function send(mixed $data = null): void
    {
        if (isset($data)) {
            if (is_array($data)) {
                echo json_encode($data, JSON_PRETTY_PRINT);
            } elseif (is_object($data)) {
                echo json_encode((array) $data, JSON_PRETTY_PRINT);
            } else {
                echo (string)$data;
            }
        }
        exit(0);
    }


}