<?php

declare(strict_types=1);

// Security Headers
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");

// Prevent direct access
if (!defined('APP_INIT')) {
    exit('Access denied');
}

require_once __DIR__ . '/env.php';

bitree_load_env(__DIR__ . '/.env');

// Secure PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // throw errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // secure fetch
    PDO::ATTR_EMULATE_PREPARES   => false,                  // real prepared statements
];

try {
    // Validate required ENV variables
    bitree_env_required([
        'DB_HOST',
        'DB_NAME',
        'DB_USER',
        'DB_PASS',
        'DB_CHARSET'
    ]);

    $dsn = sprintf(
        "mysql:host=%s;dbname=%s;charset=%s",
        bitree_env('DB_HOST'),
        bitree_env('DB_NAME'),
        bitree_env('DB_CHARSET')
    );

    $pdo = new PDO(
        $dsn,
        bitree_env('DB_USER'),
        bitree_env('DB_PASS'),
        $options
    );

} catch (Throwable $e) {

    if (bitree_env('APP_ENV') === 'production') {
        error_log($e->getMessage());
        die('Database connection failed.');
    } else {
        die($e->getMessage());
    }
}
