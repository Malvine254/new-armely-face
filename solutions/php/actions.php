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
                // Password matches, set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
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

if (isset($_POST['transcription'])) {
	echo $_POST['transcription'] ;
}else{
	echo "nothing";
}

 ?>