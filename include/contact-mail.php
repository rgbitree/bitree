<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../PHPMailer/src/Exception.php';
require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer/src/SMTP.php';

require_once __DIR__ . '/env.php';
bitree_load_env(__DIR__ . '/.env');

function writeDebugLog($message)
{
    $logFile = __DIR__ . '/email_debug.log';
    $time = date("Y-m-d H:i:s");
    file_put_contents($logFile, "[$time] $message\n", FILE_APPEND);
}

function sendEmail($to, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = bitree_env('SMTP_HOST');
        $mail->SMTPAuth   = true;
        $mail->Username   = bitree_env('SMTP_USER');
        $mail->Password   = bitree_env('SMTP_PASS');

        $mail->SMTPSecure = strtoupper((string) bitree_env('SMTP_SECURE', 'TLS')) === 'TLS'
            ? PHPMailer::ENCRYPTION_STARTTLS
            : PHPMailer::ENCRYPTION_SMTPS;

        $mail->Port       = (int) bitree_env('SMTP_PORT', '587');

        $mail->SMTPDebug = filter_var(bitree_env('SMTP_DEBUG', 'false'), FILTER_VALIDATE_BOOLEAN)
            ? SMTP::DEBUG_SERVER
            : SMTP::DEBUG_OFF;

        $mail->Debugoutput = function($str){
            writeDebugLog("SMTP DEBUG: $str");
        };

        $mail->setFrom((string) bitree_env('SMTP_USER'), 'Bitree');
        $mail->addAddress($to);
        $mail->addReplyTo((string) bitree_env('SMTP_USER'), 'Bitree');

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();

        writeDebugLog("Email sent successfully to $to | Subject: $subject");

        return true;

    } catch (Exception $e) {

        writeDebugLog("Mailer Error: " . $mail->ErrorInfo);

        return "Mailer Error: " . $mail->ErrorInfo;
    }
}
