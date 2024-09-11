<?php 
function registerUser(){
	include '../php/config.php';
	$name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Basic validation
    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "<script>alert(' fields are required!');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!');</script>";
    } elseif ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Hash the password before saving
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $select = $conn->query("SELECT * FROM users WHERE email='$email'");
        if ($select->num_rows>0) {
        	echo "<script>alert('Email already egistered');</script>";
        }else{
        	 // Insert user into the database
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

        if ($conn->query($sql)) {
            echo "<script>alert('Registration successful!');window.location.assign('login');</script>";
        } else {
            echo "<script>alert('Server error');</script>";
        }
        }
       
    }
}
if (isset($_POST["register"])) {
    registerUser();
}

// Close connection
// $conn->close();

function loginUser(){
	include '../php/config.php';
// Form submission handling
 $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic validation
    if (empty($email) || empty($password)) {
        echo "Email and password are required!";
    } else {
        // Check if the user exists in the database
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User found, verify the password
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_start();
                // Password matches, set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $email;
                // echo "<script>alert('Login successful! Welcome, " . $user['name']."');</script>";
                // Redirect to a dashboard page or homepage after successful login
                header("Location: index");
            } else {
                echo "<script>alert('Invalid password!');</script>";
            }
        } else {
            echo "<script>alert('No account found with that email!');</script>";
        }
    }

}




if ( isset($_POST['login'])) {
   loginUser();
}

if (isset($_POST['new_chat_set'])) {
    session_start();
    require '../../php/config.php';
    // Check the server's default timezone
     date_default_timezone_get();

    // Get the current date and time
    $currentDate = date('Y-m-d');
    $currentTime = date('h:i A');

    // Format for today
    $date = "Today, " . $currentTime;

   $chat_id =  rand(5676554,9498882);
   $_SESSION['chat_id'] = $chat_id;
   $current_session_id =  $_SESSION['chat_id'];
   $user_id = $_SESSION['user_name'];
   $insert = $conn->query("INSERT INTO transcription (`date`,user_id,transcribed_text,chat_id) VALUES('$date','$user_id','null','$current_session_id')");
   //echo $_SESSION['chat_id'] ;
   if ($insert) {
       echo "successful";
   }


}

if (isset($_POST['transcription'])) {
     session_start();
    require '../../php/config.php';
    $current_session_id =  $_SESSION['chat_id'];
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_name']);
	$transcribed_text = mysqli_real_escape_string($conn,$_POST['transcription']) ;
    $update = $conn->query("UPDATE transcription SET transcribed_text='$transcribed_text' WHERE user_id='$user_id' AND chat_id='$current_session_id'");
    $select=$conn->query("SELECT * FROM transcription  WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            echo '<h6>'.$row['date'].'</h6><a href="" class="text-link"><h6>'.substr($row['transcribed_text'], 0,80).'></h6></a>
                    <hr>';
        }
    }


}



 ?>