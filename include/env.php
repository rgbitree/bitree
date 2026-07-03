<?php

declare(strict_types=1);

function bitree_load_env(string $path): void
{
    if (!is_file($path)) {
        return;
    }

    $values = parse_ini_file($path, false, INI_SCANNER_RAW);

    if ($values === false) {
        return;
    }

    foreach ($values as $key => $value) {
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
        putenv($key . '=' . $value);
    }
}

function bitree_env(string $key, ?string $default = null): ?string
{
    $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);

    if ($value === false || $value === null) {
        return $default;
    }

    return (string) $value;
}

function bitree_env_required(array $keys): void
{
    $missing = [];

    foreach ($keys as $key) {
        if (bitree_env($key) === null) {
            $missing[] = $key;
        }
    }

    if ($missing !== []) {
        throw new RuntimeException('Missing required environment variables: ' . implode(', ', $missing));
    }
}
