<?php 



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


if (isset($_POST['fname1']) && isset($_POST['lname1']) && isset($_POST['email1']) && isset($_POST['phone1']) && isset($_POST['country1'])) {
    include '../php/config.php';

 
    // Sanitize user inputs
    $fname1 = mysqli_real_escape_string($conn, $_POST['fname1']);
    $lname1 = mysqli_real_escape_string($conn, $_POST['lname1']);
    $email1 = mysqli_real_escape_string($conn, $_POST['email1']);
    $phone1 = mysqli_real_escape_string($conn, $_POST['phone1']);
    $country1 = mysqli_real_escape_string($conn, $_POST['country1']);
    $category1 = mysqli_real_escape_string($conn, $_POST['category1']);
    $subject = "Freemium Request for " .  $category1;

    $select = $conn->query("SELECT * FROM freemium WHERE title='$category1'"); // Fetch only one record
    if ($select->num_rows>0) {
          while ($row = $select->fetch_assoc()) {
        $passwordHash = rand(888888, 937372); // Generate a sample password hash
        $link= getDownloadLink($row['download_link']);
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
                    <p>Download link(s): " . $link. "</p>  
                </div>
                <div class='footer'>
                    <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>";

        // Email Headers
        $headers = "From: Armely LLC <ai.solutions@armely.com>\r\n";
        $headers .= "Reply-To: ai.solutions@armely.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Send the email
        if (mail($email1, $subject, $message, $headers)) {
            //echo "Invitation link has been sent to " . htmlspecialchars($fname1 . " " . $lname1) . "'";

            $insert = $conn->query("INSERT INTO offers_form (fname, lname, email, phone, country,category) VALUES ('$fname1','$lname1','$email1','$phone1','$country1','$category1')");
            if ($insert) {
                echo 1;
            }else{
                echo "Server error";
            }




        } else {
            echo "<script>alert('Failed to send email. Please check your server configuration.');</script>";
        }
    } 
    }else{
        echo "Could not complete your request";
    }
  
}




 ?>