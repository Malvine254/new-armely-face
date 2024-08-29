<?php 
// submit offers form
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email2']) && isset($_POST['phone2']) && isset($_POST['country'])) {
    
    include 'mail.php';

    $phone = $_POST['phone2'];
    

    // Regular expression to match a basic phone number format
    if (preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        
        require 'config.php';
        $category = "PowerBi Dashboard";
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO offers_form (fname, lname, email, phone, country,category) VALUES (?, ?, ?, ?, ?,?)");
        
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $country,$category);

            // Assign values
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email2'];
            $country = $_POST['country'];

            // Execute the query
            if ($stmt->execute()) {
                sendEmail($email, $fname." ".$lname, $phone,$country, $category);
                sendDownloadLink($email, $category,$fname." ". $lname);
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

} 

// submit sql offers form
if (isset($_POST['fname1']) && isset($_POST['lname1']) && isset($_POST['email1']) && isset($_POST['phone1']) && isset($_POST['country1'])) {
    
    $phone = $_POST['phone1'];
    
    // Regular expression to match a basic phone number format
    if (preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        
        require 'config.php';
          $category = "sql health check";
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO offers_form (fname, lname, email, phone, country,category) VALUES (?, ?, ?, ?, ?,?)");
      
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $country,$category);

            // Assign values
            $fname = $_POST['fname1'];
            $lname = $_POST['lname1'];
            $email = $_POST['email1'];
            $country = $_POST['country1'];

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

} 


// submit coe offers form
if (isset($_POST['fname3']) && isset($_POST['lname3']) && isset($_POST['email3']) && isset($_POST['phone3']) && isset($_POST['country3'])) {
    
    $phone = $_POST['phone3'];
    
    // Regular expression to match a basic phone number format
    if (preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        
        require 'config.php';
          $category = "COE Integration";
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO offers_form (fname, lname, email, phone, country,category) VALUES (?, ?, ?, ?, ?,?)");
      
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $country,$category);

            // Assign values
            $fname = $_POST['fname3'];
            $lname = $_POST['lname3'];
            $email = $_POST['email3'];
            $country = $_POST['country3'];

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

} 

 ?>