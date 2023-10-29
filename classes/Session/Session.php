<?php


namespace Session;


class Session
{

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function start(): false|string
    {
        if (!session_id()) {
            session_start();
        }
        return session_id();
    }

    public function get(string $key, mixed $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function set(string $key, mixed $value): mixed
    {
        $_SESSION[$key] = $value;
        return $value;
    }

    public function destroy(): void
    {
        unset($_SESSION);
    }

    public function refresh(): string
    {
        $this->destroy();
        return $this->start();
    }

    public function forget($key)
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
            return $key;
        }
        return false;
    }

    public function flash($key)
    {
        $value = $this->get($key);
        $this->forget($key);
        return $value;
    }

    public function user(): array|null
    {
        return $this->get('user');
    }

    public function userId(string $idName = 'id'): string|int|null
    {
        return $this->get('user', [$idName => null,])[$idName];
    }


    public function userLogin(array $userData)
    {
        return $this->set('user', $userData);
    }

    public function userLogout(): void
    {
        $this->forget('user');
        $this->refresh();
    }

    public function userIsLoggedIn(): bool
    {
        return (boolean)$this->user();
    }


}