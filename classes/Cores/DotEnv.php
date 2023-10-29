<?php

namespace Cores;

class DotEnv
{
    /**
     * @throws \Exception
     */
    public function __construct(string $dotenvPath)
    {
        $this->registerEnvFile($dotenvPath);
    }

    /**
     * @throws \Exception
     */
    public static function CreateFromDir(string $dir): DotEnv
    {
        return new  self($dir . DIRECTORY_SEPARATOR . '.env');
    }

    public function get(string $key, string $default = null): ?string
    {
        return getenv($key) ?? $default;
    }

    public function set(string $key, mixed $value): bool
    {
        $_ENV[$key] = $value;
        return putenv("$key=$value");
    }

    /**
     * @throws \Exception
     */
    private function registerEnvFile($file): void
    {
        if (!file_exists($file)) {
            throw new \Exception(vsprintf('%s file does not exist', $file));
        }
        if (!is_readable($file)) {
            throw new \Exception(vsprintf('%s file not readable', $file));
        }
        $env = file_get_contents($file);
        $lines = explode("\n", $env);
        foreach ($lines as $line) {
            $e = trim($line);
            if (!$line || str_starts_with($e, '#')) {
                continue;
            }
            putenv($e);
            $e = explode('=', $e);
            $_ENV[$e[0]] = $e[1] ?? null;
        }
    }

    public function all(): array
    {
        return $_ENV;
    }
}