<?php 
$conn = new mysqli("localhost","root","","tech_hub");
if ($conn->connect_error) {
    // Log the error instead of displaying it to users
    error_log("Connection failed: " . $conn->connect_error);
    die("Database connection failed. Please try again later.");
}

// Set the charset to avoid security issues like SQL injection
$conn->set_charset("utf8mb4");

 ?>