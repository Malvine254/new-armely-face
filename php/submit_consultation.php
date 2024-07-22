<?php
include 'config.php';

// Sanitize and validate user input
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
$organization = isset($_POST['organization']) ? htmlspecialchars($_POST['organization']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
$service_type  = isset($_POST['service_type']) ? htmlspecialchars($_POST['service_type']) : '';

// Validate phone number format
if ($phone && !preg_match('/(\d{1})(\d{3})(\d{3})(\d{4})/', $phone)) {
    // Invalid phone number format
    echo "Invalid phone format, use this format +19724600643";
} else {
    // Check if required fields are not empty
    if ($name && $email && $organization && $phone && $message && $service_type) {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO consultation (name, email, organization, phone, message,service_type) VALUES (?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssssss", $name, $email, $organization, $phone, $message,$service_type);

        // Execute the statement
        if ($stmt->execute()) {
            echo 1;
        } else {
            // Log the error securely
            error_log('Failed to insert contact form data into the database');

            // Display a generic error message
            echo "Failed to submit the form. Please try again later";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Display an error message if required fields are not provided
        echo "Please fill in all the required fields";
    }
}
?>