<?php 
require '../php/config.php';

if (isset($_SESSION['email'])) {
	require '../php/config.php';
	$select = $conn->query("SELECT * FROM admin");
	if ($select->num_rows>0) {
	    while ($row=$select->fetch_assoc()) {
	    	$name = $row['name'];
	    	$email = $row['email'];
	    	$pass = $row['password'];
	    	$joined_date = $row['joined_date'];
	    	$phone = $row['phone'];
	      
	}
	}
}
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;


if (isset($_POST['send_invitation_link'])) {
    require '../vendor/autoload.php';  // Include Composer's autoloader

   
    $full_name     = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $subject       = "Invitation to the admin portal";
    $passwordHash  = md5(rand(88888,937372)); // Example generated password hash

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
            .btn {
                background: #007bff;
                padding: 15px;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .btn:hover {
                background: black;
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Thank you for contacting Armely LLC</h1>
            </div>
            <div class='content'>
                <h2>Dear, " . htmlspecialchars($full_name) . "</h2>
                <p>You have been given access to the Armely admin portal. Use the following credentials for logging in:</p>
                <p><strong>Email Address:</strong> " . $email_address . "</p>
                <p><strong>Password:</strong> " . $passwordHash . "</p>
            </div>
            <div class='footer'>
                <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP server configuration using your cPanel details
        $mail->isSMTP();
        $mail->Host       = 'armely.com';           // Outgoing server (SMTP)
        $mail->SMTPAuth   = true;                   // Enable SMTP authentication
        $mail->Username   = 'info@armely.com';        // Your email address
        $mail->Password   = ')wB!INVawr$M'; // Replace with the actual email account password
        $mail->SMTPSecure = 'ssl';                  // Use SSL encryption
        $mail->Port       = 465;                    // SMTP Port

        // Set email headers and recipients
        $mail->setFrom('info@armely.com', 'Armely');
        $mail->addAddress($email_address);          // Recipient email address

        // Content settings
        $mail->isHTML(true);                        // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        // Optionally, you can add a plain text version:
        // $mail->AltBody = "Dear $full_name,\nYou have been given access to the Armely admin portal.\nEmail: $email_address\nPassword: $passwordHash";

        $mail->send();
        echo "Invitation email sent successfully.";
    } catch (Exception $e) {
        echo "Failed to send email. Mailer Error: " . $mail->ErrorInfo;
    }
}





 ?>