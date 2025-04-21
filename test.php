<?php
// Load PHPMailer classes manually
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';
require 'phpMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.secureserver.net'; // GoDaddy SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ai.solutions@armely.com'; // your email
    $mail->Password   = '@armely!234!2';      // replace with your real password
    $mail->SMTPSecure = 'tls'; // or 'ssl' depending on GoDaddy config
    $mail->Port       = 587;   // 465 for SSL

    // Recipients
    $mail->setFrom('ai.solutions@armely.com', 'Armely AI Solutions');
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Replace with recipient

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from Armely';
    $mail->Body    = 'This is a <b>test email</b> sent using PHPMailer and GoDaddy SMTP.';

    $mail->send();
    echo '✅ Message has been sent';
} catch (Exception $e) {
    echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
