<?php
// Use PHPMailer classes manually since you're not using Composer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Manually include the necessary PHPMailer files
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                   // Specify SMTP server
    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
    $mail->Username   = 'info.armely@gmail.com';             // SMTP username
    $mail->Password   = 'mdkh fbjv bsgl ueoc';              // SMTP password (use an app-specific password if using Gmail)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable SSL encryption
    $mail->Port       = 465;                                // TCP port to connect to (use 587 for TLS)

    // Recipients
    $mail->setFrom('info.armely@gmail.com', 'Armely LLC');
    $mail->addAddress('owuormalvine75@gmail.com', 'Malvine Owuor');     // Add a recipient

    // Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the plain text version for non-HTML clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
