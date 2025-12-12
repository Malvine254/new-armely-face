<?php
/**
 * Config file for API endpoints
 * This file includes ONLY database connection
 * NO UI includes (header, footer, etc.)
 */

// Prevent direct access
if (!defined('API_ACCESS')) {
    define('API_ACCESS', true);
}

// Include only the database configuration
require_once __DIR__ . '/../../php/config.php';

// Set error handling for API
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors in API responses
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/api_errors.log');

// Function to send JSON response and exit
function sendJsonResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// Function to send error response
function sendErrorResponse($message, $statusCode = 400) {
    sendJsonResponse([
        'error' => true,
        'message' => $message
    ], $statusCode);
}

// Function to validate session
function validateSession() {
    if (!isset($_SESSION['email'])) {
        sendErrorResponse('Unauthorized', 401);
    }
}
