<?php

// GoDaddy Unified PHP Test Script "GEOFF" - Customized Email Test

// Set recipient email (change this)
$to = "malvine.owuor@armely.com"; 

// Email subject
$subject = "PHP Email Test Script - GEOFF";

// Email message
$message = "This is a test email sent using PHP mail(). If you receive this, your PHP email function works!";

// Additional headers
$headers = "From: owuormalvine75@gmail.com\r\n";
$headers .= "Reply-To: malvine.owuor@armely.com\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send mail using PHP's mail() function
if (mail($to, $subject, $message, $headers)) {
    echo "✅ Email sent successfully to $to";
} else {
    echo "❌ Email sending failed!";
}

?>
