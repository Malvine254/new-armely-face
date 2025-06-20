<?php


// Function to compress and convert to WebP into the correct directory
function compressAndConvertToWebp($sourcePath, $targetDir, $safeFilename, $quality = 80)
{
    // Get image info
    $imageInfo = getimagesize($sourcePath);
    $mime = $imageInfo['mime'];

    // Create image resource based on type
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($sourcePath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($sourcePath);
            // Optional: Remove transparency
            $background = imagecreatetruecolor(imagesx($image), imagesy($image));
            $white = imagecolorallocate($background, 255, 255, 255);
            imagefill($background, 0, 0, $white);
            imagecopy($background, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
            imagedestroy($image);
            $image = $background;
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($sourcePath);
            break;
        default:
            return false;
    }

    // Destination is exactly inside $targetDir
    $destinationPath = $targetDir . $safeFilename;

    // Save the compressed .webp image
    $result = imagewebp($image, $destinationPath, $quality);
    imagedestroy($image);
    return $result;
}

// Handle blog post request
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['blog_image']) && isset($_POST['blog_title']) && isset($_POST['blog_body'])) {
    include '../../php/config.php'; 
    session_start();
    $email_address = $_SESSION['email'];
    $select = $conn->query("SELECT name FROM admin WHERE email='$email_address'");
    while ($row = $select->fetch_assoc()) {
        $final_name = $row['name'];
    }

    if (!isset($_FILES["blog_image"]) || $_FILES["blog_image"]["error"] !== UPLOAD_ERR_OK) {
        echo "File upload error: " . $_FILES["blog_image"]["error"];
        exit;
    }

    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $max_file_size = 25 * 1024 * 1024; // 25 MB

    $blog_title = trim($_POST['blog_title']);
    $blog_body = trim($_POST['blog_body']);
    $blog_author = $final_name;
    $date = date("F jS, Y");
    $blog_id = rand(1000000, 10000000000);

    if (empty($blog_title) || empty($blog_body)) {
        echo "Title and body cannot be empty.";
        exit;
    }

    $file_name = basename($_FILES['blog_image']['name']);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($file_ext, $allowed_types)) {
        echo "Invalid file type. Allowed: " . implode(', ', $allowed_types);
        exit;
    }

    if ($_FILES['blog_image']['size'] > $max_file_size) {
        echo "File size exceeds 5MB limit.";
        exit;
    }

    $safe_filename = preg_replace("/[^a-zA-Z0-9\._-]/", "_", pathinfo($file_name, PATHINFO_FILENAME));
    $safe_filename = time() . "_" . $safe_filename . ".webp";

    $target_dir = "../../images/blogs/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $original_tmp = $_FILES['blog_image']['tmp_name'];
    if (!compressAndConvertToWebp($original_tmp, $target_dir, $safe_filename, 80)) {
        echo "Image compression/conversion failed.";
        exit;
    }

    $db_path = "images/blogs/" . $safe_filename;

    // ✅ Check if update
    if (isset($_GET['editId']) && $_GET['type'] === "blog") {
        $editId = intval($_GET['editId']);

        // ✅ Get old image path
        $result = $conn->query("SELECT image_path FROM blogs WHERE blog_id = $editId");
        if ($result && $row = $result->fetch_assoc()) {
            $oldImagePath = "../../images/blogs" . $row['image_path'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // ✅ Delete the old image
            }
        }

        // ✅ Update with new data
        $stmt = $conn->prepare("UPDATE blogs SET title = ?, author = ?, body = ?, `date` = ?, image_path = ? WHERE blog_id = ?");
        $stmt->bind_param("ssssss", $blog_title, $blog_author, $blog_body, $date, $db_path, $editId);

        if ($stmt->execute()) {
            echo "Updated";
        } else {
            echo "Update error: " . $conn->error;
        }

        $stmt->close();
    } else {
        // Insert new blog
        $stmt = $conn->prepare("INSERT INTO blogs (title, author, body, `date`, image_path, blog_id) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $blog_title, $blog_author, $blog_body, $date, $db_path, $blog_id);

        if ($stmt->execute()) {
            echo "Inserted";
        } else {
            echo "Insert error: " . $conn->error;
        }

        $stmt->close();
    }
}







function uploadNewYoutubeVideo() {
    include '../../php/config.php'; 

    $iframeContents = trim($_POST['iframeContents']);

    // Validate YouTube iframe format
    if (!preg_match('/^<iframe\s+[^>]*src="https:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_-]+(\?[a-zA-Z0-9&=_-]*)?"[^>]*><\/iframe>$/', $iframeContents)) {
        echo "Invalid YouTube iframe.";
        exit;
    }

    // Check if this is an update
    if (isset($_GET['editId']) && $_GET['type'] === 'video') {
        $editId = intval($_GET['editId']);

        // Update existing video
        $stmt = $conn->prepare("UPDATE videos SET url = ? WHERE id = ?");
        $stmt->bind_param("si", $iframeContents, $editId);

        echo $stmt->execute() ? "Updated" : "Update failed: " . $conn->error;
        $stmt->close();
    } else {
        // Insert new video
        $stmt = $conn->prepare("INSERT INTO videos (url) VALUES (?)");
        $stmt->bind_param("s", $iframeContents);

        echo $stmt->execute() ? "Inserted" : "Insert failed: " . $conn->error;
        $stmt->close();
    }

    $conn->close();
}




if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['iframeContents'])) {
    uploadNewYoutubeVideo();
}
require __DIR__ . '/../../vendor/autoload.php';
    

    use Dotenv\Dotenv;
    use GuzzleHttp\Client;
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reset_email'])) {
    require '../../php/config.php';

    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    global $conn;

    $reset_email = mysqli_real_escape_string($conn, $_POST['reset_email']);
    $temp_password = rand(84747373, 34748383);
    $subject = "Armely One-Time Password";

    $select = $conn->query("SELECT * FROM admin WHERE email='$reset_email'");

    if ($select->num_rows > 0) {
        $row = $select->fetch_assoc();
        $name = htmlspecialchars($row['name']);

        $update = $conn->query("UPDATE admin SET password='$temp_password' WHERE email='$reset_email'");

        if ($update) {
            // Create HTML message
            $message = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
                    .container { min-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9; }
                    .header { background-color: #007bff; color: white; padding: 10px; text-align: center; }
                    .content { padding: 20px; }
                    .content h2 { color: #007bff; }
                    .footer { text-align: center; padding: 10px; font-size: 12px; color: #777; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>One-Time Password (OTP)</h1>
                    </div>
                    <div class='content'>
                        <h2>Hello, $name</h2>
                        <p>Use the following one-time password to log into your Armely admin account:</p>
                        <p><strong>Password:</strong> $temp_password</p>
                        <p>Please log in and change your password immediately for security.</p>
                    </div>
                    <div class='footer'>
                        <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>";

            try {
                // Microsoft Graph Email
                $client = new Client();
                $tenantId     = $_ENV['AZURE_TENANT_ID'];
                $clientId     = $_ENV['AZURE_CLIENT_ID'];
                $clientSecret = $_ENV['AZURE_CLIENT_SECRET'];
                $fromEmail    = $_ENV['FROM_EMAIL'];

                // Get token
                $tokenResponse = $client->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
                    'form_params' => [
                        'client_id'     => $clientId,
                        'scope'         => 'https://graph.microsoft.com/.default',
                        'client_secret' => $clientSecret,
                        'grant_type'    => 'client_credentials',
                    ],
                ]);
                $accessToken = json_decode($tokenResponse->getBody(), true)['access_token'];

                // Send mail
                $emailPayload = [
                    'message' => [
                        'subject' => $subject,
                        'body' => [
                            'contentType' => 'HTML',
                            'content'     => $message,
                        ],
                        'toRecipients' => [
                            ['emailAddress' => ['address' => $reset_email]]
                        ]
                    ],
                    'saveToSentItems' => true,
                ];

                $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
                    'headers' => [
                        'Authorization' => "Bearer $accessToken",
                        'Content-Type'  => 'application/json',
                    ],
                    'body' => json_encode($emailPayload),
                ]);

                echo 100;
            } catch (Exception $e) {
                error_log("Email send error: " . $e->getMessage());
                echo "Email sending failed. Please try again later.";
            }
        } else {
            echo "Password update failed.";
        }
    } else {
        echo "Email address not registered. Please use a valid email.";
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['event_url']) && isset($_POST['event_date']) && isset($_POST['event_title']) && isset($_POST['event_body']) ) {
    include '../../php/config.php';
    $event_url     = mysqli_real_escape_string($conn,$_POST['event_url']);
    $event_date = mysqli_real_escape_string($conn,date('d/m/Y',strtotime($_POST['event_date'])));
    $event_title = mysqli_real_escape_string($conn,$_POST['event_title']);
    $event_body = mysqli_real_escape_string($conn,$_POST['event_body']);
    $submit = $conn->query("INSERT INTO events(title,body,start_date,url) VALUES('$event_title','$event_body','$event_date','$event_url')");
    if ($submit) {
        echo "3";
         
   
    }else{
        echo "Server Error";
    }
    
}


#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Start of submit teams form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
if (isset($_FILES["team_image"]["name"]) && isset($_POST['team_body']) && isset($_POST['team_title']) && isset($_POST['team_name']) && isset($_POST['x']) && isset($_POST['instagram']) && isset($_POST['facebook']) && isset($_POST['linkedin'])) {
    include '../../php/config.php';
    // Sanitize and validate user input
    $team_name = isset($_POST['team_name']) ? htmlspecialchars($_POST['team_name']) : '';
    $team_body = isset($_POST['team_body']) ? htmlspecialchars($_POST['team_body']) : '';
    $team_title = isset($_POST['team_title']) ? htmlspecialchars($_POST['team_title']) : '';
    $team_title = isset($_POST['team_title']) ? htmlspecialchars($_POST['team_title']) : '';
    $x = isset($_POST['x']) ? htmlspecialchars($_POST['x']) : '';
    $instagram = isset($_POST['instagram']) ? htmlspecialchars($_POST['instagram']) : '';
    $facebook = isset($_POST['facebook']) ? htmlspecialchars($_POST['facebook']) : '';
    $linkedin = isset($_POST['linkedin']) ? htmlspecialchars($_POST['linkedin']) : '';
    $created_date = date("d-m-y h:i:sa");
    $random_name = rand(100000,3000000);
    $new_file_name = $random_name.".webp";
    $target = "../../images/team/".$random_name.".webp"; 
    if (move_uploaded_file($_FILES['team_image']['tmp_name'], $target)) {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO team (team_name, team_title, team_body,team_image,x,instagram,facebook,linkedin,created_date) VALUES (?, ?, ?, ?,?,?,?,?,?)");
            $stmt->bind_param("sssssssss", $team_name, $team_title, $team_body,$new_file_name,$x,$instagram,$facebook,$linkedin,$created_date);

            // Execute the statement
            if ($stmt->execute()) {
             echo "1";
            } else {
                // Log the error securely
                error_log('Failed to insert contact form data into the database');

                // Display a generic error message
                echo "Failed to submit the form. Please try again later";
            }

            // Close the statement
            $stmt->close();

    } else{
        echo "Failed to upload pdf, try again";
    }
   
    

}

function UpdateJobPosting() {
    include '../../php/config.php'; 


    // Check if this is an update
    if (isset($_GET['editId']) && $_GET['type'] === 'vidcareereo') {
        $editId = intval($_GET['editId']);

        // Update existing video
        $stmt = $conn->prepare("UPDATE career SET url = ? WHERE id = ?");
        $stmt->bind_param("si", $iframeContents, $editId);

        echo $stmt->execute() ? "Updated" : "Update failed: " . $conn->error;
        $stmt->close();
    } else {
        // Insert new video
        $stmt = $conn->prepare("INSERT INTO videos (url) VALUES (?)");
        $stmt->bind_param("s", $iframeContents);

        echo $stmt->execute() ? "Inserted" : "Insert failed: " . $conn->error;
        $stmt->close();
    }

    $conn->close();
}

?>
