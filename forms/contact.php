<?php
define('APP_INIT', true);

/* ================= SECURITY HEADERS ================= */
header('Content-Type: application/json');
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");

session_start();

/* ================= LOAD ENV ================= */
require_once __DIR__ . '/../include/env.php';
bitree_load_env(__DIR__ . '/../include/.env');

/* ================= BOT SLOWDOWN ================= */
usleep(300000); // 0.3s delay

/* ================= INCLUDES ================= */
require_once __DIR__ . '/../include/db.php';
require_once __DIR__ . '/../include/contact-mail.php';

/* ================= DEBUG LOGGER ================= */
function captchaDebug($data){
    $log = __DIR__ . "/captcha_debug.log";
    $time = date("Y-m-d H:i:s");
    file_put_contents($log, "[$time] " . print_r($data,true) . "\n\n", FILE_APPEND);
}

/* ================= DEFAULT RESPONSE ================= */
$response = [
    "success" => false,
    "message" => "Something went wrong. Please try again."
];

/* ================= ONLY POST ================= */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode($response);
    exit;
}

/* ================= HONEYPOT ================= */
if (!empty($_POST['website'])) {
    // bot detected silently
    captchaDebug("HONEYPOT TRIGGERED");
    exit;
}

/* ================= CSRF ================= */
$csrf = $_POST['csrf_token'] ?? '';

if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $csrf)) {
    $response['message'] = "Invalid security token.";
    echo json_encode($response);
    exit;
}

$recaptchaEnabled = filter_var(bitree_env('RECAPTCHA_ENABLED', 'true'), FILTER_VALIDATE_BOOLEAN);

if ($recaptchaEnabled) {
    /* ================= RECAPTCHA ================= */
    $recaptchaToken = $_POST['recaptcha_token'] ?? '';

    captchaDebug([
        "token_received" => $recaptchaToken
    ]);

    if (!$recaptchaToken) {
        captchaDebug("Token missing");
        $response['message'] = "Captcha verification failed.";
        echo json_encode($response);
        exit;
    }

    $recaptchaSecret = bitree_env('SECRET_KEY');

    if (!$recaptchaSecret) {
        captchaDebug("Secret key missing");
        $response['message'] = "Captcha is not configured.";
        echo json_encode($response);
        exit;
    }

    /* VERIFY WITH GOOGLE */
    $verify = @file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?" .
        http_build_query([
            'secret' => $recaptchaSecret,
            'response' => $recaptchaToken,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ])
    );

    $captcha = json_decode($verify ?: '', true);

    captchaDebug([
        "google_response" => $captcha
    ]);

    $success = $captcha['success'] ?? false;
    $score   = $captcha['score'] ?? 0;
    $action  = $captcha['action'] ?? '';

    captchaDebug([
        "success" => $success,
        "score" => $score,
        "action" => $action
    ]);

    if (!$success || $score < 0.5 || $action !== 'contact') {
        captchaDebug("Captcha FAILED");
        $response['message'] = "Captcha verification failed.";
        echo json_encode($response);
        exit;
    }
}

/* ================= GET USER IP ================= */
$ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

/* ================= RATE LIMIT ================= */
/* max 5 attempts per 15 minutes */
$stmt = $pdo->prepare("
SELECT COUNT(*)
FROM contact_attempts
WHERE ip_address = :ip
AND attempted_at > (NOW() - INTERVAL 15 MINUTE)
");

$stmt->execute(['ip'=>$ip]);
$count = $stmt->fetchColumn();

if ($count >= 5) {
    $response['message'] = "Too many messages. Please wait 15 minutes.";
    echo json_encode($response);
    exit;
}

/* ================= SANITIZE INPUT ================= */
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$name    = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
$email   = filter_var($email, FILTER_SANITIZE_EMAIL);
$subject = filter_var($subject, FILTER_SANITIZE_SPECIAL_CHARS);

$message = strip_tags($message);

$message = str_replace(["\r\n", "\r", "\n"], PHP_EOL, $message);

/* ================= VALIDATION ================= */
if (!$name || !$email || !$subject || !$message) {
    $response['message'] = "All fields are required.";
    echo json_encode($response);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['message'] = "Invalid email address.";
    echo json_encode($response);
    exit;
}

if (strlen($message) < 5) {
    $response['message'] = "Message is too short.";
    echo json_encode($response);
    exit;
}

/* ================= LENGTH LIMIT ================= */
if (
    strlen($name) > 100 ||
    strlen($email) > 150 ||
    strlen($subject) > 150 ||
    strlen($message) > 1000
) {
    $response['message'] = "Input too long.";
    echo json_encode($response);
    exit;
}

/* ================= LOG ATTEMPT ================= */
$stmt = $pdo->prepare("
INSERT INTO contact_attempts (ip_address,email)
VALUES (:ip,:email)
");

$stmt->execute([
    'ip'=>$ip,
    'email'=>$email
]);

/* ================= EMAIL BODY ================= */
$body  = "New Contact Message\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Subject: $subject\n\n";
$body .= "Message:\n$message\n";

/* ================= SEND EMAIL ================= */
$send = sendEmail((string) bitree_env('SMTP_USER'), "Website Contact: $subject", $body, $email, html_entity_decode($name, ENT_QUOTES, 'UTF-8'));

if ($send === true) {
    $response['success'] = true;
    $response['message'] = "Message sent successfully.";
} else {
    $response['message'] = $send;
}

echo json_encode($response);
