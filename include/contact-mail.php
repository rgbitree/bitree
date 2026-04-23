<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../PHPMailer/src/Exception.php';
require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer/src/SMTP.php';

require __DIR__ . '/../vendor/autoload.php';

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
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USER'];
        $mail->Password   = $_ENV['SMTP_PASS'];

        $mail->SMTPSecure = $_ENV['SMTP_SECURE'] === 'TLS'
            ? PHPMailer::ENCRYPTION_STARTTLS
            : PHPMailer::ENCRYPTION_SMTPS;

        $mail->Port       = $_ENV['SMTP_PORT'];

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->Debugoutput = function($str){
            writeDebugLog("SMTP DEBUG: $str");
        };

        $mail->setFrom($_ENV['SMTP_USER'], 'Bitree');
        $mail->addAddress($to);
        $mail->addReplyTo($_ENV['SMTP_USER'], 'Bitree');

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