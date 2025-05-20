<?php 
if (isset($_POST['login_btn'])) {
	require '../php/config.php';
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$check = $conn->query("SELECT * FROM admin WHERE email='$email' AND password='$password'");
	if ($check->num_rows>0) {
		session_start();
		$_SESSION['email']=$email;
		header('location:index');
	}else{
		echo "<script>alert('Incorrect password or username')</script>";
		
	}
}
 ?>