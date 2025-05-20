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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['career_title'])) {
    echo "hey man";
}

?>

