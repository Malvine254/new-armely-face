<?php
// $apiUrl = 'https://restcountries.com/v3.1/all';
// $response = file_get_contents($apiUrl);
// $countries = json_decode($response, true);

// foreach ($countries as $country) {
//     echo $country['name']['common'] . "<br>";
// }

// Email details
$to = 'owuormalvine75@gmail.com'; // Replace with recipient's email address
$subject = 'Test Email';
$message = 'This is a test email sent from GoDaddy server using PHP mail() function.';

// Headers
$headers = "From: info@armely.com\r\n"; // Replace with your sender email
$headers .= "Reply-To: info@armely.com\r\n"; // Replace with your sender email
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
} else {
    echo 'Failed to send email.';
}
?>
