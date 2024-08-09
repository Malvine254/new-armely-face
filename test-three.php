<?php
$user_id = 123456;
setcookie("user_id", $user_id, time() + (86400 * 1), "/"); // 86400 = 1 day
if(isset($_COOKIE['user_id'])) {

    $user_id = $_COOKIE['user_id'];
    echo $user_id. "is set";
    // Check if the cookie matches an active user ID (e.g., from a database)
    // Assume you have a function `isUserIdActive($user_id)` that checks if the user ID is active.
    
    // if(isUserIdActive($user_id)) {
    //     echo "User ID " . $user_id . " is active.";
    // } else {
    //     echo "User ID " . $user_id . " is not active.";
    // }
} else {
    echo "User ID cookie is not set.";
}

// Set a cookie with name 'user_id', value '12345', and expiration time of 1 day

?>

