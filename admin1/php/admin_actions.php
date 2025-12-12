<?php
session_start();
require '../../php/config.php';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$action = $_POST['action'] ?? '';

try {
    switch ($action) {
        case 'update_admin':
            $admin_id = intval($_POST['admin_id'] ?? 0);
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $role = trim($_POST['role'] ?? 'Admin');
            $status = trim($_POST['status'] ?? 'active');

            if ($admin_id <= 0 || empty($name) || empty($email)) {
                throw new Exception('Invalid input');
            }

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Invalid email format');
            }

            $stmt = $conn->prepare("UPDATE admin SET name = ?, email = ?, role = ?, status = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $name, $email, $role, $status, $admin_id);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Admin updated successfully']);
            } else {
                throw new Exception('Failed to update admin');
            }
            $stmt->close();
            break;

        case 'remove_admin':
            $admin_id = intval($_POST['admin_id'] ?? 0);
            
            if ($admin_id <= 0) {
                throw new Exception('Invalid admin ID');
            }

            // Prevent deleting yourself
            $check_stmt = $conn->prepare("SELECT email FROM admin WHERE id = ?");
            $check_stmt->bind_param("i", $admin_id);
            $check_stmt->execute();
            $result = $check_stmt->get_result();
            $admin = $result->fetch_assoc();
            $check_stmt->close();

            if ($admin && $admin['email'] === $_SESSION['email']) {
                throw new Exception('Cannot remove yourself');
            }

            $stmt = $conn->prepare("DELETE FROM admin WHERE id = ?");
            $stmt->bind_param("i", $admin_id);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Admin removed successfully']);
            } else {
                throw new Exception('Failed to remove admin');
            }
            $stmt->close();
            break;

        case 'suspend_admin':
            $admin_id = intval($_POST['admin_id'] ?? 0);
            
            if ($admin_id <= 0) {
                throw new Exception('Invalid admin ID');
            }

            // Prevent suspending yourself
            $check_stmt = $conn->prepare("SELECT email FROM admin WHERE id = ?");
            $check_stmt->bind_param("i", $admin_id);
            $check_stmt->execute();
            $result = $check_stmt->get_result();
            $admin = $result->fetch_assoc();
            $check_stmt->close();

            if ($admin && $admin['email'] === $_SESSION['email']) {
                throw new Exception('Cannot suspend yourself');
            }

            $stmt = $conn->prepare("UPDATE admin SET status = 'suspended' WHERE id = ?");
            $stmt->bind_param("i", $admin_id);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Admin suspended successfully']);
            } else {
                throw new Exception('Failed to suspend admin');
            }
            $stmt->close();
            break;

        case 'resend_invite':
            $admin_id = intval($_POST['admin_id'] ?? 0);
            
            if ($admin_id <= 0) {
                throw new Exception('Invalid admin ID');
            }

            // Get admin details
            $stmt = $conn->prepare("SELECT name, email, password FROM admin WHERE id = ? AND status = 'pending'");
            $stmt->bind_param("i", $admin_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $admin = $result->fetch_assoc();
            $stmt->close();

            if (!$admin) {
                throw new Exception('Admin not found or not pending');
            }

            // Send invitation email (using existing email sending logic)
            require __DIR__ . '/../../vendor/autoload.php';
            use Dotenv\Dotenv;
            use GuzzleHttp\Client;

            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();

            $subject = "Invitation to the Armely Admin Portal";
            $message = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
                    .container { width: auto; min-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9; }
                    .header { background-color: #007bff; color: white; padding: 10px; text-align: center; }
                    .content { padding: 20px; }
                    .content h2 { color: #007bff; }
                    .footer { text-align: center; padding: 10px; font-size: 12px; color: #777; }
                    .btn { background: #007bff; padding: 15px; color: white; text-decoration: none; border-radius: 5px; }
                    .btn:hover { background: black; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>Welcome to Armely LLC</h1>
                    </div>
                    <div class='content'>
                        <h2>Dear " . htmlspecialchars($admin['name']) . ",</h2>
                        <p>You have been invited to access the <strong>Armely Admin Portal</strong>.</p>
                        <p><strong>Email Address:</strong> " . htmlspecialchars($admin['email']) . "</p>
                        <p><strong>Password:</strong> " . htmlspecialchars($admin['password']) . "</p>
                        <p>Please log in and update your profile and password after your first login.</p>
                    </div>
                    <div class='footer'>
                        <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>
            ";

            try {
                $client = new Client();
                $tenantId     = $_ENV['AZURE_TENANT_ID'];
                $clientId     = $_ENV['AZURE_CLIENT_ID'];
                $clientSecret = $_ENV['AZURE_CLIENT_SECRET'];
                $fromEmail    = $_ENV['FROM_EMAIL'];

                $tokenResponse = $client->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
                    'form_params' => [
                        'client_id' => $clientId,
                        'scope' => 'https://graph.microsoft.com/.default',
                        'client_secret' => $clientSecret,
                        'grant_type' => 'client_credentials',
                    ],
                ]);

                $accessToken = json_decode($tokenResponse->getBody(), true)['access_token'];

                $emailPayload = [
                    'message' => [
                        'subject' => $subject,
                        'body' => [
                            'contentType' => 'HTML',
                            'content' => $message,
                        ],
                        'toRecipients' => [
                            ['emailAddress' => ['address' => $admin['email']]]
                        ]
                    ],
                    'saveToSentItems' => true,
                ];

                $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
                    'headers' => [
                        'Authorization' => "Bearer $accessToken",
                        'Content-Type' => 'application/json',
                    ],
                    'body' => json_encode($emailPayload),
                ]);

                echo json_encode(['success' => true, 'message' => 'Invitation resent successfully']);
            } catch (Exception $e) {
                error_log("Email sending failed: " . $e->getMessage());
                throw new Exception('Failed to send invitation email');
            }
            break;

        default:
            throw new Exception('Invalid action');
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

$conn->close();
?>
