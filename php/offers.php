<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use GuzzleHttp\Client;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$tenantId     = $_ENV['AZURE_TENANT_ID'];
$clientId     = $_ENV['AZURE_CLIENT_ID'];
$clientSecret = $_ENV['AZURE_CLIENT_SECRET'];
$fromEmail    = 'ai.solutions@armely.com';
$adminEmail   = $_ENV['FROM_EMAIL'];

function getDownloadLink($download_link) {
    if (empty($download_link)) {
        return "No download link available.";
    }
    $list = explode("{}", $download_link);
    $links = array_map(function ($link) {
        return "<a href='" . htmlspecialchars(trim($link)) . "' target='_blank' style='color:#007bff;text-decoration:none;'>Download Here</a>";
    }, $list);
    return implode("<br>", $links);
}

function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

function sendGraphEmail($toEmail, $subject, $bodyHtml, $accessToken, $fromEmail) {
    $client = new Client();
    $payload = [
        'message' => [
            'subject' => $subject,
            'body' => [
                'contentType' => 'HTML',
                'content' => $bodyHtml,
            ],
            'toRecipients' => [
                ['emailAddress' => ['address' => $toEmail]]
            ]
        ],
        'saveToSentItems' => true,
    ];
    return $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
        'headers' => [
            'Authorization' => "Bearer $accessToken",
            'Content-Type'  => 'application/json',
        ],
        'body' => json_encode($payload),
    ]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../php/config.php';

    $fname1    = sanitizeInput($_POST['fname1'] ?? '');
    $lname1    = sanitizeInput($_POST['lname1'] ?? '');
    $email1    = filter_var($_POST['email1'], FILTER_VALIDATE_EMAIL);
    $phone1    = sanitizeInput($_POST['phone1'] ?? '');
    $country1  = sanitizeInput($_POST['country1'] ?? '');
    $category1 = sanitizeInput($_POST['category1'] ?? '');
    $time = date("Y-m-d H:i:s"); 

    if (!$email1) {
        echo "Invalid email.";
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM freemium WHERE title = ?");
    $stmt->bind_param("s", $category1);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row  = $result->fetch_assoc();
        $link = getDownloadLink($row['download_link']);
        $year = date("Y");

        // Get Access Token
        $client = new Client();
        try {
            $tokenResponse = $client->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
                'form_params' => [
                    'client_id' => $clientId,
                    'scope' => 'https://graph.microsoft.com/.default',
                    'client_secret' => $clientSecret,
                    'grant_type' => 'client_credentials',
                ],
            ]);
            $accessToken = json_decode($tokenResponse->getBody(), true)['access_token'];
        } catch (Exception $e) {
            echo "Authentication error.";
            exit;
        }

        // 1️⃣ Email to the user
        $userSubject = "🔓 Your Freemium Access: $category1";
        $userBody = <<<HTML
        <html>
        <body style="font-family:Segoe UI, sans-serif; background-color:#f4f4f4; padding:20px;">
           <div style="border:1px solid #ddd; border-radius:6px; max-width:600px; margin:auto; padding: 19px; background-color: white;">
                <h2 style="background:#007bff; color:white; padding:15px; border-radius:8px 8px 0 0;">Your Download is Ready!</h2>
                <p>Hello <strong>$fname1 $lname1</strong>,</p>
                <p>Thank you for requesting the <strong>$category1</strong> freemium resource.</p>
                <p>You can download it using the link(s) below:</p>
                <p>$link</p>
                <p>If you have any questions, reply to this email.</p>
                <p style="text-align:center;color:#777;">&copy; $year Armely. All rights reserved.</p>
            </div>
        </body>
        </html>
        HTML;

        // 2️⃣ Email to the admin
        $adminSubject = "📥 New Freemium Download Request - $category1";
        $adminBody = <<<HTML
        <html>
        <body style="font-family:Segoe UI, sans-serif; background-color:#fff; padding:20px;">
        <div style="border:1px solid #ddd; border-radius:6px; max-width:600px; margin:auto; padding: 19px; background-color: white;">
            <h3 style="color:#007bff;">New Freemium Request Received</h3><hr>
            <p><strong>Name:</strong> $fname1 $lname1</p><hr>
            <p><strong>Email:</strong> $email1</p><hr>
            <p><strong>Phone:</strong> $phone1</p><hr>
            <p><strong>Country:</strong> $country1</p><hr>
            <p><strong>Category:</strong> $category1</p><hr>
            <p><strong>Time:</strong> $time</p>
        </div>
        </body>
        </html>
        HTML;

        try {
            // Send emails
            sendGraphEmail($email1, $userSubject, $userBody, $accessToken, $fromEmail);
            sendGraphEmail($adminEmail, $adminSubject, $adminBody, $accessToken, $fromEmail);

            // Save to DB
            $insert = $conn->prepare("INSERT INTO offers_form (fname, lname, email, phone, country, category) VALUES (?, ?, ?, ?, ?, ?)");
            $insert->bind_param("ssssss", $fname1, $lname1, $email1, $phone1, $country1, $category1);
            $insert->execute();

            echo 1;
        } catch (Exception $e) {
            echo "❌ Failed to send emails.";
        }
    } else {
        echo "No freemium item found.";
    }
}
?>
