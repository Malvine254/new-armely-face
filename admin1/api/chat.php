<?php
/**
 * Chat API Endpoint
 * This file handles ONLY chat requests and returns JSON responses
 * NO HTML, NO INCLUDES of UI files
 */

// Prevent any output buffering issues
ob_start();

// Set JSON header immediately
header('Content-Type: application/json');

// Only include essential files
session_start();

// Check authentication
if (!isset($_SESSION['email'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

// Only include config, not header/footer
require_once __DIR__ . '/../../php/config.php';

// Handle POST requests only
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Get the message from POST data
$input = json_decode(file_get_contents('php://input'), true);
$message = $input['message'] ?? $_POST['message'] ?? '';

if (empty($message)) {
    http_response_code(400);
    echo json_encode(['error' => 'Message is required']);
    exit;
}

// Process the chat message (add your chat logic here)
try {
    // Example: Store message in database
    if (isset($conn)) {
        $stmt = $conn->prepare("INSERT INTO chat_messages (user_email, message, created_at) VALUES (?, ?, NOW())");
        if ($stmt) {
            $stmt->bind_param("ss", $_SESSION['email'], $message);
            $stmt->execute();
            $stmt->close();
        }
    }
    
    // Generate response (replace with your actual chat logic)
    $response = [
        'success' => true,
        'message' => 'Message received',
        'reply' => 'Thank you for your message. How can I assist you?',
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    // Clear any accidental output
    ob_end_clean();
    
    // Return JSON response
    echo json_encode($response);
    
} catch (Exception $e) {
    ob_end_clean();
    http_response_code(500);
    echo json_encode([
        'error' => 'Server error',
        'message' => $e->getMessage()
    ]);
}

// CRITICAL: Exit immediately to prevent any further execution
exit;
