<?php 
// submit offers form
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email2']) && isset($_POST['phone2']) && isset($_POST['country'])) {

function sendEmail($sender, $name, $phone, $email, $country, $subject) {
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
                width: 100%;
                max-width: 600px;
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
                <h1>New Inquiry from $name</h1>
            </div>
            <div class='content'>
                <h2>Hello, Admin</h2>
                <p>You have received a new inquiry with the following details:</p>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Country:</strong> $country</p>
                <p><strong>Message:</strong></p>
                <p>$body</p>
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
    if (mail($to, $subject, $message, $headers)) {
        echo 1;
    } else {
        echo 'Failed to send email.';
    }
}


    $phone = $_POST['phone2'];
    

    // Regular expression to match a basic phone number format
    if (preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        
        require 'config.php';
        $category = "PowerBi Dashboard";
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO offers_form (fname, lname, email, phone, country,category) VALUES (?, ?, ?, ?, ?,?)");
        
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $country,$category);

            // Assign values
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email2'];
            $country = $_POST['country'];

            // Execute the query
            if ($stmt->execute()) {
                sendEmail($sender, $fname." ".$lname, $phone, $email, $country, $subject);
            } else {
                echo "Failed to submit the form";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Failed to prepare the statement";
        }

        // Close the connection
        $conn->close();
        
    } else {
        echo "Invalid phone number format.";
    }

} 

// submit sql offers form
if (isset($_POST['fname1']) && isset($_POST['lname1']) && isset($_POST['email1']) && isset($_POST['phone1']) && isset($_POST['country1'])) {
    
    $phone = $_POST['phone1'];
    
    // Regular expression to match a basic phone number format
    if (preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        
        require 'config.php';
          $category = "sql health check";
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO offers_form (fname, lname, email, phone, country,category) VALUES (?, ?, ?, ?, ?,?)");
      
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $country,$category);

            // Assign values
            $fname = $_POST['fname1'];
            $lname = $_POST['lname1'];
            $email = $_POST['email1'];
            $country = $_POST['country1'];

            // Execute the query
            if ($stmt->execute()) {
                echo 1;
            } else {
                echo "Failed to submit the form";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Failed to prepare the statement";
        }

        // Close the connection
        $conn->close();
        
    } else {
        echo "Invalid phone number format.";
    }

} 


// submit coe offers form
if (isset($_POST['fname3']) && isset($_POST['lname3']) && isset($_POST['email3']) && isset($_POST['phone3']) && isset($_POST['country3'])) {
    
    $phone = $_POST['phone3'];
    
    // Regular expression to match a basic phone number format
    if (preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        
        require 'config.php';
          $category = "COE Integration";
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO offers_form (fname, lname, email, phone, country,category) VALUES (?, ?, ?, ?, ?,?)");
      
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $country,$category);

            // Assign values
            $fname = $_POST['fname3'];
            $lname = $_POST['lname3'];
            $email = $_POST['email3'];
            $country = $_POST['country3'];

            // Execute the query
            if ($stmt->execute()) {
                echo 1;
            } else {
                echo "Failed to submit the form";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Failed to prepare the statement";
        }

        // Close the connection
        $conn->close();
        
    } else {
        echo "Invalid phone number format.";
    }

} 

 ?>