<?php 
require '../php/config.php';

if (isset($_SESSION['email'])) {
	require '../php/config.php';
    $email = $_SESSION['email'];
	$select = $conn->query("SELECT * FROM admin WHERE email='$email'");
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
    include '../php/config.php';

    $full_name     = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $subject       = "Invitation to the Admin Portal";

    $select = $conn->query("SELECT * FROM admin WHERE email='$email_address'");
    $passwordHash  = rand(888888, 937372); // Generate a sample password hash

    if ($select->num_rows > 0) {
        echo "<script>alert('User already exists')</script>";
    } else {
        $register = $conn->query("INSERT INTO admin (name, email, password) VALUES ('$full_name', '$email_address', '$passwordHash')");

        if ($register) {
            // Create the HTML email content
            $message = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
                    .container { width: auto; min-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9; }
                    .header { background-color: #007bff; color: white; padding: 10px; text-align: center; }
                    .content { padding: 20px; }
                    .content h2 { color: #007bff; }
                    .content p { margin-bottom: 10px; }
                    .footer { text-align: center; padding: 10px; font-size: 12px; color: #777; }
                    .btn { background: #007bff; padding: 15px; color: white; text-decoration: none; border-radius: 5px; }
                    .btn:hover { background: black; padding: 15px; }
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

            // Email Headers
           $headers = "From: Armely Support <info@yourdomain.com>\r\n";  // Correct formatting
            $headers .= "Reply-To: malvine.owuor@armely.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            // Send the email using PHP mail()
            if (mail($email_address, $subject, $message, $headers)) {
                echo "<script>alert('Invitation link has been sent to " . htmlspecialchars($full_name) . "')</script>";
            } else {
                echo "<script>alert('Failed to send email. Please check your server configuration.')</script>";
            }
        } else {
            echo "<script>alert('Failed to register user')</script>";
        }
    }
}




//update user details
if (isset($_POST['update_user_btn']) && isset($_SESSION['email'])) {
    include '../php/config.php';
    $email_address = $_SESSION['email'];
    $update_name     = mysqli_real_escape_string($conn,$_POST['update_name']);
    $update_new_password = mysqli_real_escape_string($conn,$_POST['update_new_password']);
    $update_phone = mysqli_real_escape_string($conn,$_POST['update_phone']);
    $update_confirm_password  = mysqli_real_escape_string($conn,$_POST['update_confirm_password']);
    if ($update_new_password===$update_confirm_password) {

         $select = $conn->query("UPDATE  admin SET name='$update_name',phone='$update_phone',password='$update_new_password'WHERE email='$email_address'");
         if ($select) {
              echo "<script>alert('Operation was successful');window.location.assign('users')</script>";
         }else{
             echo "<script>alert('Operation Failed')</script>";
         }
   
    }else{
        echo "<script>alert('Password do not match')</script>";
    }
    
}

?>
