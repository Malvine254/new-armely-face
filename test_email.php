<?php
/**
 * Email Testing Script
 * Tests Microsoft Graph API email sending with your Azure credentials
 */

// Load environment variables
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use GuzzleHttp\Client;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Get credentials from .env
$tenantId     = $_ENV['AZURE_TENANT_ID'] ?? '';
$clientId     = $_ENV['AZURE_CLIENT_ID'] ?? '';
$clientSecret = $_ENV['AZURE_CLIENT_SECRET'] ?? '';
$fromEmail    = $_ENV['FROM_EMAIL'] ?? '';

echo "<h1>📧 Email Configuration Test</h1>";
echo "<hr>";

// Step 1: Verify credentials are loaded
echo "<h2>Step 1: Verifying Credentials</h2>";
if (empty($tenantId)) {
    echo "<p style='color: red;'>❌ AZURE_TENANT_ID is empty or not set</p>";
} else {
    echo "<p style='color: green;'>✅ AZURE_TENANT_ID: " . substr($tenantId, 0, 10) . "...</p>";
}

if (empty($clientId)) {
    echo "<p style='color: red;'>❌ AZURE_CLIENT_ID is empty or not set</p>";
} else {
    echo "<p style='color: green;'>✅ AZURE_CLIENT_ID: " . substr($clientId, 0, 10) . "...</p>";
}

if (empty($clientSecret)) {
    echo "<p style='color: red;'>❌ AZURE_CLIENT_SECRET is empty or not set</p>";
} else {
    echo "<p style='color: green;'>✅ AZURE_CLIENT_SECRET: " . substr($clientSecret, 0, 10) . "...</p>";
}

if (empty($fromEmail)) {
    echo "<p style='color: red;'>❌ FROM_EMAIL is empty or not set</p>";
} else {
    echo "<p style='color: green;'>✅ FROM_EMAIL: " . $fromEmail . "</p>";
}

// Stop if credentials are missing
if (empty($tenantId) || empty($clientId) || empty($clientSecret) || empty($fromEmail)) {
    echo "<hr>";
    echo "<p style='color: red;'><b>⚠️ Missing required credentials in .env file</b></p>";
    exit;
}

// Step 2: Get Microsoft Graph Access Token
echo "<h2>Step 2: Obtaining Microsoft Graph Access Token</h2>";

try {
    $client = new Client();
    $response = $client->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
        'form_params' => [
            'client_id'     => $clientId,
            'scope'         => 'https://graph.microsoft.com/.default',
            'client_secret' => $clientSecret,
            'grant_type'    => 'client_credentials',
        ],
    ]);

    $tokenData = json_decode($response->getBody(), true);
    
    if (!isset($tokenData['access_token'])) {
        echo "<p style='color: red;'>❌ Failed to obtain access token</p>";
        echo "<p><b>Response:</b> " . json_encode($tokenData) . "</p>";
        exit;
    }

    $accessToken = $tokenData['access_token'];
    echo "<p style='color: green;'>✅ Access token obtained successfully</p>";
    echo "<p><small>Token (first 50 chars): " . substr($accessToken, 0, 50) . "...</small></p>";

} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error obtaining token: " . $e->getMessage() . "</p>";
    exit;
}

// Step 3: Test sending email
echo "<h2>Step 3: Sending Test Email</h2>";

$testEmail = $_GET['test_email'] ?? 'malvine.owuor@armely.com';

echo "<p>Attempting to send email to: <b>" . htmlspecialchars($testEmail) . "</b></p>";

$emailPayload = [
    'message' => [
        'subject' => 'Test Email - Armely Email System',
        'body' => [
            'contentType' => 'HTML',
            'content'     => '<p>This is a test email from the Armely email system.</p><p>If you received this, the email configuration is working correctly! 🎉</p>',
        ],
        'toRecipients' => [
            ['emailAddress' => ['address' => $testEmail]]
        ],
    ],
    'saveToSentItems' => true,
];

try {
    $response = $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
        'headers' => [
            'Authorization' => "Bearer $accessToken",
            'Content-Type'  => 'application/json',
        ],
        'body' => json_encode($emailPayload),
    ]);

    echo "<p style='color: green;'>✅ Email sent successfully!</p>";
    echo "<p><b>Status Code:</b> " . $response->getStatusCode() . "</p>";

} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error sending email: " . $e->getMessage() . "</p>";
    
    $errorResponse = $e->getResponse();
    if ($errorResponse) {
        echo "<p><b>Error Response Body:</b></p>";
        echo "<pre style='background: #f0f0f0; padding: 10px; overflow-x: auto;'>";
        echo htmlspecialchars($errorResponse->getBody());
        echo "</pre>";
    }
}

// Step 4: Help section
echo "<hr>";
echo "<h2>📝 Testing Instructions</h2>";
echo "<p>To test email sending with a different email address, visit:</p>";
echo "<p><code><a href='test_email.php?test_email=your-email@example.com' target='_blank'>test_email.php?test_email=your-email@example.com</a></code></p>";

echo "<hr>";
echo "<p style='color: #666; font-size: 12px;'><b>Debug Information:</b></p>";
echo "<p style='color: #666; font-size: 12px;'>Sending from: " . $fromEmail . "</p>";
echo "<p style='color: #666; font-size: 12px;'>Tenant ID: " . substr($tenantId, 0, 10) . "...</p>";

?>
