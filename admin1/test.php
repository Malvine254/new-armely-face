<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    // GoDaddy SMTP Settings
    $mail->isSMTP();
    $mail->Host = 'relay-hosting.secureserver.net'; // GoDaddy SMTP relay
    $mail->SMTPAuth = false; // No authentication required
    $mail->Port = 25; // GoDaddy allows only port 25 on shared hosting

    // Sender & Recipient
    $mail->setFrom('info@armely.com', 'Your Name'); // Replace with a valid GoDaddy-hosted email
    $mail->addAddress('malvine.owuor@armely.com', 'Recipient Name'); // Replace with recipient email

    // Email Content
    $mail->isHTML(true);
    $mail->Subject = 'GoDaddy SMTP Test';
    $mail->Body    = '<p>This is a test email sent via GoDaddy SMTP relay.</p>';

    // Send Email
    if ($mail->send()) {
        echo "✅ Email sent successfully!";
    } else {
        echo "❌ Email failed to send!";
    }
} catch (Exception $e) {
    echo "❌ Mailer Error: " . $mail->ErrorInfo;
}
?>
