<?php
// Shared by both public sites so their inquiry forms use the same protected endpoint.
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/env.php';
bitree_load_env(__DIR__ . '/.env');
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$recaptchaSiteKey = bitree_env('SITE_KEY', '');
