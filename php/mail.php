<?php 

function sendDownloadLink($sender, $subject,$name) {
    $to = $sender;
    $subject = $subject;

    // Create the HTML email content
    $message = "
    <html>
    <head>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
        <style>
            body {
                font-family: Arial, sans-serif;
                color: #333;
                line-height: 1.6;
            }
            .container {
                width: auto;
                min-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ddd;
                background-color: #f9f9f9;
            }
            .header {
                background-color: #007bff;
                color: white;
                padding: 10px;
                text-align: center;
            }
            .content {
                padding: 20px;
            }
            .content h2 {
                color: #007bff;
            }
            .content p {
                margin-bottom: 10px;
            }
            .footer {
                text-align: center;
                padding: 10px;
                font-size: 12px;
                color: #777;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Download link</h1>
            </div>
            <div class='content'>
                <h2>Hello, ".htmlspecialchars($name)."</h2>
                <p>Click the download link below:</p>
               <p><strong>File 1: <a class='btn btn-info' href='https://armely.com/downloads/ActivityTemplate_v2.pbit' download>Click to download ActivityTemplate_v2 file</a></strong></p>
            <p><strong>File 2: <a class='btn btn-info' href='https://armely.com/downloads/PowerBI_Activity_v2.ps1' download>Click to download PowerBI_Activity_v2 file</a><strong></p>  
              
            </div>
            <div class='footer'>
                <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Headers
    $headers = "From: info@armely.com\r\n";
    $headers .= "Reply-To: info@armely.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject,$message, $headers)) {
        echo 1;
    } else {
        echo 'Failed to send email.';
    }
}

function sendEmailForContact($sender, $subject,$name) {
    $to = $sender;
    $subject = $subject;

    // Create the HTML email content
    $message = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                color: #333;
                line-height: 1.6;
            }
            .container {
                width: auto;
                min-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ddd;
                background-color: #f9f9f9;
            }
            .header {
                background-color: #007bff;
                color: white;
                padding: 10px;
                text-align: center;
            }
            .content {
                padding: 20px;
            }
            .content h2 {
                color: #007bff;
            }
            .content p {
                margin-bottom: 10px;
            }
            .footer {
                text-align: center;
                padding: 10px;
                font-size: 12px;
                color: #777;
            }
            .btn{
                background: #007bff;
                padding: 15px;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .btn:hover{
                background: black;
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Thank you for contacting armely LLC</h1>
            </div>
            <div class='content'>
                <h2>Dear, ".htmlspecialchars($name)."</h2>
                <p>Thank you for reaching out to Armely! We have received your inquiry and our team is excited to assist you. One of our representatives will review your request and get back to you within the next 24 hours.</p>
                <p>If your request is urgent, please feel free to reply to this email or contact us at <a href='tel:  +1 972 460 0643'> +1 972 460 0643</a> for immediate assistance.</p>
                <p>Meanwhile, you can explore our services to get full insight.</p>
               <p><strong><a class='btn btn-info' href='https://armely.com/' download>Check all Serives</a></strong></p>
              
            </div>
            <div class='footer'>
                <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Headers
    $headers = "From: info@armely.com\r\n";
    $headers .= "Reply-To: info@armely.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject,$message, $headers)) {
        return "3";
    } else {
        return 'Failed to send email.';
    }
}

 ?>