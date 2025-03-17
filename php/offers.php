<?php 
// // submit offers form
// if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email2']) && isset($_POST['phone2']) && isset($_POST['country'])) {
    
//     include 'mail.php';

//     $phone = $_POST['phone2'];
    

//     // Regular expression to match a basic phone number format
//     if (preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        
//         require 'config.php';
//         $category = "PowerBi Dashboard";
//         // Using prepared statements to prevent SQL injection
//         $stmt = $conn->prepare("INSERT INTO offers_form (fname, lname, email, phone, country,category) VALUES (?, ?, ?, ?, ?,?)");
        
//         if ($stmt) {
//             // Bind parameters
//             $stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $country,$category);

//             // Assign values
//             $fname = $_POST['fname'];
//             $lname = $_POST['lname'];
//             $email = $_POST['email2'];
//             $country = $_POST['country'];

//             // Execute the query
//             if ($stmt->execute()) {
//                 // if ( sendEmail($email, $fname." ".$lname, $phone,$country, $category)==="1") {
//                 //    sendDownloadLink($email, $category,$fname." ". $lname);
//                 // }
//                 sendDownloadLink($email, $category,$fname." ". $lname);
                
//             } else {
//                 echo "Failed to submit the form";
//             }

//             // Close the statement
//             $stmt->close();
//         } else {
//             echo "Failed to prepare the statement";
//         }

//         // Close the connection
//         $conn->close();
        
//     } else {
//         echo "Invalid phone number format.";
//     }

// } 





if (isset($_POST['fname1']) && isset($_POST['lname1']) && isset($_POST['email1']) && isset($_POST['phone1']) && isset($_POST['country1'])) {
    include '../php/config.php';

    function nameIt() {
        return isset($_GET['name']) ? htmlspecialchars($_GET['name']) : "Could not find the name";
    }

    function getDownloadLink($download_link) {
        if (empty($download_link)) {
            return "No download link available.";
        } else {
            $list = explode("{}", $download_link); // Ensure this is the correct delimiter
            $links = [];
            foreach ($list as $link) {
                $links[] = "<a href='" . htmlspecialchars(trim($link)) . "' target='_blank'>Download Here</a>";
            }
            return implode("<br>", $links);
        }
    }

    // Sanitize user inputs
    $fname1 = mysqli_real_escape_string($conn, $_POST['fname1']);
    $lname1 = mysqli_real_escape_string($conn, $_POST['lname1']);
    $email1 = mysqli_real_escape_string($conn, $_POST['email1']);
    $phone1 = mysqli_real_escape_string($conn, $_POST['phone1']);
    $country1 = mysqli_real_escape_string($conn, $_POST['country1']);

    $subject = "Freemium Request for " . nameIt();

    $select = $conn->query("SELECT * FROM freemium LIMIT 1"); // Fetch only one record
    if ($row = $select->fetch_assoc()) {
        $passwordHash = rand(888888, 937372); // Generate a sample password hash

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
                    <h1>Download Link</h1>
                </div>
                <div class='content'>
                    <h2>Hello, " . htmlspecialchars($fname1) . " " . htmlspecialchars($lname1) . "</h2>
                    <p>Click the download link below:</p>
                    <p>Download link(s): " . getDownloadLink($row['download_link']) . "</p>  
                </div>
                <div class='footer'>
                    <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>";

        // Email Headers
        $headers = "From: Armely Support <info@armely.com>\r\n";
        $headers .= "Reply-To: malvine.owuor@armely.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Send the email
        if (mail($email1, $subject, $message, $headers)) {
            echo "<script>alert('Invitation link has been sent to " . htmlspecialchars($fname1 . " " . $lname1) . "');</script>";
        } else {
            echo "<script>alert('Failed to send email. Please check your server configuration.');</script>";
        }
    } else {
        echo "<script>alert('No freemium data found.');</script>";
    }
}




 ?>