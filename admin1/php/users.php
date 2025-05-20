<?php 

  require __DIR__ . '/../../vendor/autoload.php';
  require '../php/config.php';

  if (isset($_SESSION['email'])) {
    require '../php/config.php';
    $email = $_SESSION['email'];
    $select = $conn->query("SELECT * FROM admin WHERE email='$email'");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            $name = $row['name'];
            $email = $row['email'];
            $pass = $row['password'];
            $joined_date = $row['joined_date'];
            $phone = $row['phone'];
          
    }
    }
}


    use Dotenv\Dotenv;
    use GuzzleHttp\Client;
if (isset($_POST['send_invitation_link'])) {
  

    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $full_name     = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $subject       = "Invitation to the Armely Admin Portal";

    $select = $conn->query("SELECT * FROM admin WHERE email='$email_address'");
    $passwordHash = rand(888888, 937372);

    if ($select->num_rows > 0) {
        echo "<script>alert('User already exists')</script>";
    } else {
        $register = $conn->query("INSERT INTO admin (name, email, password) VALUES ('$full_name', '$email_address', '$passwordHash')");

        if ($register) {
            // HTML email content
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
                        <h2>Dear " . htmlspecialchars($full_name) . ",</h2>
                        <p>You have been invited to access the <strong>Armely Admin Portal</strong>.</p>
                        <p><strong>Email Address:</strong> " . $email_address . "</p>
                        <p><strong>Password:</strong> " . $passwordHash . "</p>
                        <p>Please log in and update your profile and password after your first login.</p>
                    </div>
                    <div class='footer'>
                        <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>
            ";

            // Send email using Microsoft Graph
            try {
                $client = new Client();

                $tenantId     = $_ENV['AZURE_TENANT_ID'];
                $clientId     = $_ENV['AZURE_CLIENT_ID'];
                $clientSecret = $_ENV['AZURE_CLIENT_SECRET'];
                $fromEmail    = $_ENV['FROM_EMAIL'];

                // Step 1: Get access token
                $tokenResponse = $client->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
                    'form_params' => [
                        'client_id' => $clientId,
                        'scope' => 'https://graph.microsoft.com/.default',
                        'client_secret' => $clientSecret,
                        'grant_type' => 'client_credentials',
                    ],
                ]);

                $accessToken = json_decode($tokenResponse->getBody(), true)['access_token'];

                // Step 2: Send email
                $emailPayload = [
                    'message' => [
                        'subject' => $subject,
                        'body' => [
                            'contentType' => 'HTML',
                            'content' => $message,
                        ],
                        'toRecipients' => [
                            ['emailAddress' => ['address' => $email_address]]
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

                echo "<script>alert('Invitation link has been sent to " . htmlspecialchars($full_name) . "')</script>";
            } catch (Exception $e) {
                error_log("Email sending failed: " . $e->getMessage());
                echo "<script>alert('Registration saved, but email failed.')</script>";
            }

        } else {
            echo "<script>alert('Failed to register user')</script>";
        }
    }
}

?>
