<?php
function uploadNewBlog() {
    include '../../php/config.php'; 
    session_start();
    $email_address = $_SESSION['email'];
    $select = $conn->query("SELECT name FROM admin WHERE email='$email_address'");
    while ($row=$select->fetch_assoc()) {
        $final_name = $row['name'];
    }

    // Check if file is uploaded without errors
    if (!isset($_FILES["blog_image"]) || $_FILES["blog_image"]["error"] !== UPLOAD_ERR_OK) {
        echo "File upload error: " . $_FILES["blog_image"]["error"];
        return;
    }

    // Allowed image types (for security)
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $max_file_size = 5 * 1024 * 1024; // 5MB limit

    // Sanitize and validate user input
    $blog_title = trim($_POST['blog_title']);
    $blog_body = trim($_POST['blog_body']);
    $blog_author = $final_name;
    $date = date("F jS, Y");
    $blog_id = rand(1000000, 10000000000);

    // Ensure inputs are not empty
    if (empty($blog_title) || empty($blog_body)) {
        echo "Title and body cannot be empty.";
        return;
    }

    // Secure file handling
    $file_name = basename($_FILES['blog_image']['name']);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Validate file extension
    if (!in_array($file_ext, $allowed_types)) {
        echo "Invalid file type. Allowed: " . implode(', ', $allowed_types);
        return;
    }

    // Validate file size
    if ($_FILES['blog_image']['size'] > $max_file_size) {
        echo "File size exceeds 5MB limit.";
        return;
    }

    // Secure file name
    $safe_filename = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $file_name);
    $safe_filename = time() . "_" . $safe_filename; // Prevent filename conflicts

    // Define target directory
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/images/blogs/";

    // Create directory if not exists
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Final target path
    $target_path = $target_dir . $safe_filename;
    $db_path = "images/blogs/" . $safe_filename; // Path stored in DB

    // Move the uploaded file
    if (!move_uploaded_file($_FILES['blog_image']['tmp_name'], $target_path)) {
        echo "File upload failed: " . error_get_last()['message'];
        return;
    }

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO blogs (title, author, body, `date`, image_path, blog_id) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $blog_title, $blog_author, $blog_body, $date, $db_path, $blog_id);

    // Execute query
    if ($stmt->execute()) {
        return "19";
    } else {
        return "Database error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Check if request contains required data
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['blog_image']) && isset($_POST['blog_title']) && isset($_POST['blog_body'])) {
    echo uploadNewBlog();
} 



function uploadNewYoutubeVideo(){
   include '../../php/config.php'; 
   $iframeContents = trim($_POST['iframeContents']);

    // Basic validation: Ensure it contains a YouTube embed link
   if (!preg_match('/^<iframe\s+[^>]*src="https:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_-]+(\?[a-zA-Z0-9&=_-]*)?"[^>]*><\/iframe>$/', $iframeContents)) {
    echo "Invalid YouTube iframe.";
    exit;
}

    // Securely insert into database using prepared statements
    $stmt = $conn->prepare("INSERT INTO videos (url) VALUES (?)");
    $stmt->bind_param("s", $iframeContents);

    echo $stmt->execute() ? "1" : "failed";

    $stmt->close();
    $conn->close();
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['iframeContents'])) {
    uploadNewYoutubeVideo();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reset_email'])) {
    include '../../php/config.php';

 
    // Sanitize user inputs
    $reset_email = mysqli_real_escape_string($conn, $_POST['reset_email']);
    $temp_password = rand(84747373,34748383);
    $subject = "One time password";
    $select = $conn->query("SELECT * FROM admin WHERE email='$reset_email'"); // Fetch only one record
    if ($select->num_rows>0) {
          while ($row = $select->fetch_assoc()) {
            $update = $conn->query("UPDATE admin SET password='$temp_password' WHERE email='$reset_email'");
            if ($update) {
              
            
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
                    <h2>Hello, " . htmlspecialchars($row['name']) . " </h2>
                    <p>Use the below one time password to login:</p>
                    <p>Pasword: " . $temp_password. "</p>  
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
        if (mail($reset_email, $subject, $message, $headers)) {
            //echo "Invitation link has been sent to " . htmlspecialchars($fname1 . " " . $lname1) . "'";
            echo 100;
        }else{
            echo "Server error";
        }


        } else {
            echo "<script>alert('Failed to send email. Please check your server configuration.');</script>";
        }
    } 


    }else{
        echo "Email Address not registered, please use a registered email!";
    }
  
}


?>

