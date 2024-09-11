<?php
// Use PHPMailer classes manually since you're not using Composer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Manually include the necessary PHPMailer files
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Create a new PHPMailer instance

function sendEmailToUsers($email,$name,$subject,$message,$organization){

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
    $mail->addAddress($email, $name);     // Add a recipient

    // Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Form Submission</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .email-container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f9f9f9;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .email-header {
                background-color: #007bff;
                padding: 15px;
                color: #ffffff;
                border-radius: 5px 5px 0 0;
                text-align: center;
            }
            .email-body {
                padding: 20px;
            }
            .email-body p {
                margin-bottom: 1rem;
            }
            .email-footer {
                text-align: center;
                font-size: 12px;
                color: #777;
                margin-top: 20px;
            }
            .info-block {
                padding: 10px;
                background-color: #e9ecef;
                border-radius: 5px;
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <div class="email-header">
                <h2>Contact Us Form Submission</h2>
            </div>
            <div class="email-body">
                <p>Hello Admin,</p>
                <p>You have received a new message from your websites contact form. Below are the details:</p>
                <div class="info-block">
                    <p><strong>Name:</strong> '.$name.'</p>
                    <p><strong>Email:</strong>'.$email.'</p>
                    <p><strong>Subject:</strong> '.$subject.'</p>
                    <p><strong>Organization:</strong> '.$organization.'</p>
                    <p><strong>Message:</strong></p>
                    <p'.$message.'</p>
                </div>
                <p>Please make sure to respond to this inquiry as soon as possible.</p>
            </div>
            <div class="email-footer">
                <p>Thank you,<br>Your Website Team</p>
            </div>
        </div>
    </body>

    </html>';
        $mail->AltBody = '<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Form Submission</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .email-container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f9f9f9;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .email-header {
                background-color: #007bff;
                padding: 15px;
                color: #ffffff;
                border-radius: 5px 5px 0 0;
                text-align: center;
            }
            .email-body {
                padding: 20px;
            }
            .email-body p {
                margin-bottom: 1rem;
            }
            .email-footer {
                text-align: center;
                font-size: 12px;
                color: #777;
                margin-top: 20px;
            }
            .info-block {
                padding: 10px;
                background-color: #e9ecef;
                border-radius: 5px;
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <div class="email-header">
                <h2>Contact Us Form Submission</h2>
            </div>
            <div class="email-body">
                <p>Hello Admin,</p>
                <p>You have received a new message from your websites contact form. Below are the details:</p>
                <div class="info-block">
                    <p><strong>Name:</strong> '.$name.'</p>
                    <p><strong>Email:</strong>'.$email.'</p>
                    <p><strong>Subject:</strong> '.$subject.'</p>
                    <p><strong>Organization:</strong> '.$organization.'</p>
                    <p><strong>Message:</strong></p>
                  
                </div>
                <p>Please make sure to respond to this inquiry as soon as possible.</p>
            </div>
            <div class="email-footer">
                <p>Thank you,<br>Your Website Team</p>
            </div>
        </div>
    </body>

    </html>';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

 sendEmailToUsers("malvine.owuor@armely.com","Malvine Owuor","Good Job Admin","I must applaud you for the autstanding work!","Starmax Production");