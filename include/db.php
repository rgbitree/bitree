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

use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Validate required ENV variables
$dotenv->required([
    'DB_HOST',
    'DB_NAME',
    'DB_USER',
    'DB_PASS',
    'DB_CHARSET'
]);

// Secure PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // throw errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // secure fetch
    PDO::ATTR_EMULATE_PREPARES   => false,                  // real prepared statements
];

try {

    $dsn = sprintf(
        "mysql:host=%s;dbname=%s;charset=%s",
        $_ENV['DB_HOST'],
        $_ENV['DB_NAME'],
        $_ENV['DB_CHARSET']
    );

    $pdo = new PDO(
        $dsn,
        $_ENV['DB_USER'],
        $_ENV['DB_PASS'],
        $options
    );

} catch (PDOException $e) {

    if ($_ENV['APP_ENV'] === 'production') {
        error_log($e->getMessage());
        die('Database connection failed.');
    } else {
        die($e->getMessage());
    }
}