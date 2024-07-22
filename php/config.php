<?php
require_once 'config.php';

// Use the constants to establish a database connection
$conn = new mysqli("localhost", "root", "", "armely_db");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
