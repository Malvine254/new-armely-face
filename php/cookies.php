<?php
include 'config.php';

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$userID = isset($_GET['userID']) ? $_GET['userID'] : null;

if ($userID) {
    // Use an API to get the country of origin from IP (e.g., ipinfo.io)
    $details = @json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

    // Check if country is available in the API response
    $country = isset($details->country) ? $details->country : 'Unknown';

    // Log the data for debugging
    error_log("IP: $ip, UserID: $userID, Country: $country");

    // Check if the user ID already exists in the database
    $stmt = $conn->prepare("SELECT id FROM analytics WHERE user_id = ?");
    $stmt->bind_param("s", $userID);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User ID exists
        echo json_encode(array('message' => 'User already tracked'));
    } else {
        // User ID does not exist, insert new record
        $stmt = $conn->prepare("INSERT INTO analytics (ip_address, country, user_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $ip, $country, $userID);

        if ($stmt->execute()) {
            echo json_encode(array('ip' => $ip, 'country' => $country, 'user_id' => $userID));
        } else {
            echo json_encode(array('error' => $stmt->error));
        }
    }

    $stmt->close();
} else {
    echo json_encode(array('error' => 'User ID not provided'));
}

$conn->close();
?>
