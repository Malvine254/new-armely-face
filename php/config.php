<?php



// Suppress MySQLi error reporting
mysqli_report(MYSQLI_REPORT_OFF);

try {
    // Suppress errors using '@' operator and handle manually
    $conn = @new  mysqli("localhost", "root", "", "armely_new_db");

    // Check for connection errors manually
    if ($conn->connect_errno) {
        throw new Exception("Database connection failed.");
    }

    // Set charset to utf8mb4 (security best practice)
    $conn->set_charset("utf8mb4");

} catch (Exception $e) {
    // Log error details but show a generic message to users
    error_log("Database Error: " . $conn->connect_error);

    // Display only a generic error message
    die("Database connection failed. Please try again later.");
}

?>
