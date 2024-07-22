<?php
if($_FILES["cv"]["error"] == UPLOAD_ERR_OK) {
    include 'config.php';
    // Sanitize and validate user input
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email =  isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
    $final_email = strtolower($email);
    $city = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $state = isset($_POST['state']) ? htmlspecialchars($_POST['state']) : '';
    $zip = isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : '';
    $role = isset($_POST['role']) ? htmlspecialchars($_POST['role']) : '';
    $final_role = strtolower($role);
    $position = isset($_POST['position']) ? htmlspecialchars($_POST['position']) : '';
    $cv = isset($_FILES['cv']['name']) ? htmlspecialchars($_FILES['cv']['name'] ) : '';
    $new_file_name = $email.basename($cv);
    $target = "../pdf/".$email.basename($cv); 
    $check_if_applied = $conn->query("SELECT * FROM job_applications WHERE LOWER(email)='$final_email' AND LOWER(role)='$final_role' ORDER BY id DESC");
    if ($check_if_applied->num_rows>0) {
            echo "You have already made an application";
        }else{
            if (move_uploaded_file($_FILES['cv']['tmp_name'], $target)) {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO job_applications (name, email, city, phone, address,state,zip,role,position,cv) VALUES (?, ?, ?, ?, ?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssss", $name, $email, $city, $phone, $address, $state,$zip,$role,$position,$new_file_name);

            // Execute the statement
            if ($stmt->execute()) {
             echo 1;
            } else {
                // Log the error securely
                error_log('Failed to insert contact form data into the database');

                // Display a generic error message
                echo "Failed to submit the form. Please try again later";
            }

            // Close the statement
            $stmt->close();

    } else{
        echo "Failed to upload pdf, try again";
    }
        }    
    

}


?>