<?php

// Retrieve form data or set variables for the email content
$recipient = "starmaxproduction76@gmail.com";// If using a form, adjust the field name
$subject = "My email test"; // If using a form, adjust the field name
$message = "Hey there darling missing u haki"; // If using a form, adjust the field name

// Set additional headers
$headers = "From: Your Name <owuormalvine75@example.com>\r\n";
$headers .= "Reply-To: your-email@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Send the email
$mailSent = mail($recipient, $subject, $message, $headers);

// Check if the email was sent successfully
if ($mailSent) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>
