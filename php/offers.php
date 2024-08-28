<?php 
// submit offers form
if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email2']) && !empty($_POST['phone2']) && !empty($_POST['country'])) {
    
    $phone = $_POST['phone2'];
    
    // Regular expression to match a basic phone number format
    if (preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        
        require 'config.php';

        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO offers_form (fname, lname, email, phone, country) VALUES (?, ?, ?, ?, ?)");
        
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("sssss", $fname, $lname, $email, $phone, $country);

            // Assign values
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email2'];
            $country = $_POST['country'];

            // Execute the query
            if ($stmt->execute()) {
                echo 1;
            } else {
                echo "Failed to submit the form";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Failed to prepare the statement";
        }

        // Close the connection
        $conn->close();
        
    } else {
        echo "Invalid phone number format.";
    }

} else {
    echo "Please fill in all required fields.";
}



 ?>