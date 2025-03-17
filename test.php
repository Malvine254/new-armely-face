<?php

// 🔹 Define API Authentication Variables
$tenantId = "588cadf4-9902-4465-86c0-8bcf04f4f102";
$clientId = "8ec24eb7-ebe3-4614-92e4-59c0a2878e0c";
$clientSecret = "qIr8Q~_YNgETW2OXEfYn-cMRTCzkckzRhV-Jdbez";
$resource = "https://purview.azure.net";
$tokenUrl = "https://login.microsoftonline.com/$tenantId/oauth2/token";
$purviewName = "armelypurview";
$apiVersion = "2023-09-01";
$dataSourcesUrl = "https://$purviewName.purview.azure.com/scan/datasources?api-version=$apiVersion";

// 🔹 Function to Request Access Token
function getAccessToken($tokenUrl, $clientId, $clientSecret, $resource) {
    $data = [
        "grant_type" => "client_credentials",
        "client_id" => $clientId,
        "client_secret" => $clientSecret,
        "resource" => $resource
    ];

    $options = [
        "http" => [
            "header" => "Content-Type: application/x-www-form-urlencoded",
            "method" => "POST",
            "content" => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $result = file_get_contents($tokenUrl, false, $context);
    
    if ($result === FALSE) {
        die("❌ Failed to get Access Token");
    }

    $response = json_decode($result, true);
    
    return $response['access_token'] ?? die("❌ Access Token Missing");
}

// 🔹 Get Access Token
$accessToken = getAccessToken($tokenUrl, $clientId, $clientSecret, $resource);
echo "✅ Successfully retrieved Access Token <br>";

// 🔹 Fetch Data Sources from Purview API
$options = [
    "http" => [
        "header" => "Authorization: Bearer " . $accessToken . "\r\n" .
                    "Content-Type: application/json\r\n",
        "method" => "GET"
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($dataSourcesUrl, false, $context);

// 🔹 Handle API Response
if ($response === FALSE) {
    die("❌ Failed to retrieve Data Sources");
}

$dataSources = json_decode($response, true);

if (isset($dataSources["value"]) && !empty($dataSources["value"])) {
    echo "✅ Successfully retrieved Data Sources: <br><pre>";
    print_r($dataSources["value"]);
    echo "</pre>";
} else {
    die("❌ No Data Sources Found");
}

?>
