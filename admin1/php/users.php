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

if (isset($_POST['send_invitation_link'])) {
	$full_name = $_POST['full_name'];
	$email_address = $_POST['email_address'];
	$to = $email_address;
    $subject = "Invitation to the admin portal";
    $password = md5(rand(88888,937372));

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
                <h2>Dear, ".htmlspecialchars($full_name)."</h2>
                <p>You have been given access to the armely admin portal use the following credetials for logging in.</p>
                <p>Email Address: ". $email_address ."</p>
                <p>Password: ". $password ." </p>
              
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
        echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
    } else {
        return 'Failed to send email.';
    }
}


 ?>