<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Simulate session
session_start();
$_SESSION['email'] = 'test@armely.com';
$_SESSION['name'] = 'Admin User';

// Connect to database
require __DIR__ . '/../../php/config.php';

// Set up test request
$_GET['action'] = 'export_pdf';
$_GET['report'] = 'activity';

// Run the export report script
require __DIR__ . '/export_report.php';
?>
