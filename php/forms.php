<?php 
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Beginning of submit consultation form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['organization'])&& isset($_POST['phone']) && isset($_POST['message']) && isset($_POST['service_type'])) {
   echo submitConsultationForm();
}
function submitConsultationForm(){
include 'config.php';
function dateFormatTwo(){
// Your date
$date =  date('y-m-d');
// Convert the date to a timestamp
$timestamp = strtotime($date);
// Format the date
$formattedDate = date("j M Y", $timestamp);
return $formattedDate;
}
$date_now = dateFormatTwo();
// Sanitize and validate user input
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
$organization = isset($_POST['organization']) ? htmlspecialchars($_POST['organization']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
$service_type  = isset($_POST['service_type']) ? htmlspecialchars($_POST['service_type']) : '';

// Validate phone number format
if ($phone && !preg_match('/(\d{1})(\d{3})(\d{3})(\d{4})/', $phone)) {
    // Invalid phone number format
    return "Invalid phone format, use this format +19724600643";
} else {
    // Check if required fields are not empty
    if ($name && $email && $organization && $phone && $message && $service_type) {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO consultation (name, email, organization, phone, message,service_type,date_now) VALUES (?, ?, ?, ?, ?,?,?)");
        $stmt->bind_param("sssssss", $name, $email, $organization, $phone, $message,$service_type,$date_now);

        // Execute the statement
        if ($stmt->execute()) {
            return 1;
        } else {
            // Log the error securely
            error_log('Failed to insert contact form data into the database');

            // Display a generic error message
            return "Failed to submit the form. Please try again later";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Display an error message if required fields are not provided
        return "Please fill in all the required fields";
    }
}
}
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#End of submit consultation form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''


#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Beginning of submit contact form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

function submitContactUsForm(){
include 'config.php';
function dateFormat(){
// Your date
$date =  date('y-m-d');
// Convert the date to a timestamp
$timestamp = strtotime($date);
// Format the date
$formattedDate = date("j M Y", $timestamp);
return $formattedDate;
}
$date_now = dateFormat();
// Sanitize and validate user input
$name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : '';
$organization = isset($_POST['organization']) ? htmlspecialchars(trim($_POST['organization'])) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
$message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

// Validate phone number format
if ($phone && !preg_match('/^\+?\d{1,4}?[\d\s]{3,}$/', $phone)) {
    // Invalid phone number format
    echo "Invalid phone format, use this format +19724600643";
    // exit;
}

// Check if required fields are not empty and valid
if (!empty($name) && !empty($email) && !empty($organization) && !empty($phone) && !empty($message)) {
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, organization, phone, message,sent_date) VALUES (?, ?, ?, ?, ?,?)");
    if ($stmt) {
        $stmt->bind_param("ssssss", $name, $email, $organization, $phone, $message, $date_now);

        // Execute the statement
        if ($stmt->execute()) {
            return 1;
        } else {
            // Log the error securely
            error_log('Failed to insert contact form data into the database: ' . $stmt->error);

            // Display a generic error message
            return "Failed to submit the form. Please try again later";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Log the error securely
        error_log('Failed to prepare SQL statement: ' . $conn->error);

        // Display a generic error message
        return "Failed to submit the form. Please try again later";
    }
} else {
    // Display an error message if required fields are not provided
    return "Please fill in all the required fields";
}
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['organization'])&& isset($_POST['phone']) && isset($_POST['message'])) {
   echo submitContactUsForm();
}
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#End of submit contact form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Start of submit job app form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
function submitJobAppForm(){
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
    $application_date = date("d-m-y h:i:sa");
    $random_name = rand(100000,3000000);
    $new_file_name = $random_name.".pdf";
    $target = "../pdf/".$random_name.".pdf"; 
    $check_if_applied = $conn->query("SELECT * FROM job_applications WHERE LOWER(email)='$final_email' AND LOWER(role)='$final_role' ORDER BY id DESC");
    // while ($row=$check_if_applied->fetch_assoc()) {
    //  $job_title = $row['job_title'];
    // }
    if ($check_if_applied->num_rows>0) {
            echo "You have already made an application";
        }else{
            if (move_uploaded_file($_FILES['cv']['tmp_name'], $target)) {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO job_applications (name, email, city, phone, address,state,zip,role,position,cv,application_date) VALUES (?, ?, ?, ?, ?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssss", $name, $email, $city, $phone, $address, $state,$zip,$role,$position,$new_file_name,$application_date);

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

}

if ( isset($_POST['zip']) && isset($_POST['state']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['name'])) {
    submitJobAppForm();
}





 ?>