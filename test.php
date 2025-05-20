<?php
require __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
use GuzzleHttp\Client;

$tenantId = $_ENV['AZURE_TENANT_ID'];
$clientId = $_ENV['AZURE_CLIENT_ID'];
$clientSecret = $_ENV['AZURE_CLIENT_SECRET'];
$fromEmail = 'ai.solutions@armely.com';
$toEmail = 'owuormalvine75@gmail.com';

$client = new Client();

// Step 1: Get Access Token
$response = $client->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
    'form_params' => [
        'client_id' => $clientId,
        'scope' => 'https://graph.microsoft.com/.default',
        'client_secret' => $clientSecret,
        'grant_type' => 'client_credentials',
    ],
]);

$accessToken = json_decode($response->getBody(), true)['access_token'];

// Step 2: Send Email
$emailPayload = [
    'message' => [
        'subject' => 'Test Email via Microsoft Graph',
        'body' => [
            'contentType' => 'HTML',
            'content' => '<b>This is a test email</b> sent from PHP via Microsoft Graph API.',
        ],
        'toRecipients' => [
            [
                'emailAddress' => [
                    'address' => $toEmail,
                ]
            ]
        ]
    ],
    'saveToSentItems' => true,
];

$sendMailResponse = $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
    'headers' => [
        'Authorization' => "Bearer $accessToken",
        'Content-Type'  => 'application/json',
    ],
    'body' => json_encode($emailPayload),
]);

echo "✅ Email sent!";
