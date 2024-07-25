<?php 
//register user
if (isset($_POST['register_btn'])) {
	require 'config.php';
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$address = mysqli_real_escape_string($conn,$_POST['address']);
	$role = mysqli_real_escape_string($conn,$_POST['role']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$check = $conn->query("SELECT * FROM users WHERE email='$email'");
	if ($check->num_rows>0) {
		echo "<script>alert('User already exist')</script>";
	}else{
		$register = $conn->query("INSERT INTO users (name,email,role,address,phone,password) VALUES('$name','$email','$role','$address','$phone','$password')");
		if ($register) {
			echo "<script>alert('Registration was successful');window.location.assign('login.php');</script>";
		}else{
			echo "<script>alert('Registration failed')</script>";
		}
		
	}
}

//login user
if (isset($_POST['login_btn'])) {
	require 'config.php';
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$check = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
	if ($check->num_rows>0) {
		session_start();
		$_SESSION['email']=$email;
		header('location:index.php');
	}else{
		echo "<script>alert('Incorrect password or username')</script>";
		
	}
}
//admin user
if (isset($_POST['admin_login_btn'])) {
	require 'config.php';
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$check = $conn->query("SELECT * FROM admin WHERE email='$email' AND password='$password'");
	if ($check->num_rows>0) {
		session_start();
		$_SESSION['admin']=$email;
		header('location:index.php');
	}else{
		echo "<script>alert('Incorrect password or username')</script>";
		
	}
}

//change user profile
if (isset($_POST['profile_btn'])) {
	require 'config.php';
	$image = mysqli_real_escape_string($conn,$_FILES['image']['name']);
	$email = $_SESSION['email'];
	$path = "img/".basename($image);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
		$update = $conn->query("UPDATE users set image='$path' WHERE email = '$email'");
		if ($update) {
			echo "<script>alert('Operation was successful')</script>";
		}else{
			echo "<script>alert('Failed to update the image')</script>";
		}
	}else{
		echo "<script>alert('image could not be uploaded')</script>";
	}
	
}
//change admin profile
if (isset($_POST['admin_profile_btn'])) {
	require 'config.php';
	$image = mysqli_real_escape_string($conn,$_FILES['image']['name']);
	$email = $_SESSION['admin'];
	$path = "img/".basename($image);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
		$update = $conn->query("UPDATE admin set image='$path' WHERE email = '$email'");
		if ($update) {
			echo "<script>alert('Operation was successful')</script>";
		}else{
			echo "<script>alert('Failed to update the image')</script>";
		}
	}else{
		echo "<script>alert('image could not be uploaded')</script>";
	}
	
}

//change user profile
if (isset($_POST['update_profile'])) {
	require 'config.php';
	$email = $_SESSION['email'];
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$address = mysqli_real_escape_string($conn,$_POST['address']);
	$role = mysqli_real_escape_string($conn,$_POST['role']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$check = $conn->query("SELECT * FROM users WHERE email='$email'");
	while ($row=$check->fetch_assoc()) {
		$db_password = $row['password'];
	}
	function returnValueOnEmpty($form_value,$db_value){
		if ($form_value==="") {
			return $db_value;
		}else{
			return $form_value;
		}
	}
	$password = returnValueOnEmpty(mysqli_real_escape_string($conn,$_POST['password']),$db_password);
	$update = $conn->query("UPDATE users SET name='$name',address='$address',password='$password',phone='$phone',role='$role' WHERE email = '$email'");
		if ($update) {
			echo "<script>alert('Operation was successful')</script>";
		}else{
			echo "<script>alert('Failed')</script>";
		}
	
}

//change admin profile
if (isset($_POST['admin_update_profile'])) {
	require 'config.php';
	$email = $_SESSION['admin'];
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$address = mysqli_real_escape_string($conn,$_POST['address']);
	$role = mysqli_real_escape_string($conn,$_POST['role']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$check = $conn->query("SELECT * FROM admin WHERE email='$email'");
	while ($row=$check->fetch_assoc()) {
		$db_password = $row['password'];
	}
	function returnValueOnEmpty($form_value,$db_value){
		if ($form_value==="") {
			return $db_value;
		}else{
			return $form_value;
		}
	}
	$password = returnValueOnEmpty(mysqli_real_escape_string($conn,$_POST['password']),$db_password);
	$update = $conn->query("UPDATE admin SET name='$name',address='$address',password='$password',phone='$phone',role='$role' WHERE email = '$email'");
		if ($update) {
			echo "<script>alert('Operation was successful')</script>";
		}else{
			echo "<script>alert('Failed')</script>";
		}
	
}
// add new task
if (isset($_POST['task_btn'])) {
	require 'config.php';
	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];
		$get_name = $conn->query("SELECT * FROM users WHERE email='$email'");
		while ($row=$get_name->fetch_assoc()) {
			$name = $row['name'];
		}
		$time_stamp = time();
		$task =  mysqli_real_escape_string($conn,$_POST['task']);
		$new_task = $conn->query("INSERT INTO tasks (task,status,email,owner,time_stamp,notification_one) VALUES('$task','active','$email','$name','$time_stamp','1')");
			if ($new_task) {
				echo "<script>alert('Task added successfully'); window.location.assign('index.php');</script>";
			}else{
				echo "<script>alert(' failed')</script>";
			}
	}else{
		$email = $_SESSION['admin'];
		$get_name = $conn->query("SELECT * FROM admin WHERE email='$email'");
		while ($row=$get_name->fetch_assoc()) {
			$name = $row['name'];
		}
		$time_stamp = time();
		$task =  mysqli_real_escape_string($conn,$_POST['task']);
		$new_task = $conn->query("INSERT INTO tasks (task,status,email,owner,time_stamp,notification_one) VALUES('$task','active','$email','$name','$time_stamp','1')");
		if ($new_task) {
			echo "<script>alert('Task added successfully');</script>";
		}else{
			echo "<script>alert(' failed')</script>";
		}
	}
	
	
	
}

if (isset($_POST['storedIds'])) {
	require 'config.php';
	session_start();
	$email = $_SESSION['email'];
	$time_now = date('jS F, g.i a');
	$id = explode(",",mysqli_real_escape_string($conn,$_POST['storedIds']));
	for ($i=0; $i < count($id) ; $i++) { 
		$final_id = $id[$i];
		$update = $conn->query("UPDATE tasks set status='completed',completed_time='$time_now',notification_two='1'WHERE id = '$final_id' AND email='$email'");
		if ($update) {
			echo "success";
			//echo "<script>alert('Operation was successful')</script>";
		}else{
			echo "<script>alert('Failed')</script>";
		}	
	}
	$email = $_SESSION['email'];
	
	
}
if (isset($_POST['deleteId'])) {
	require 'config.php';
	session_start();
	$id = explode(",",mysqli_real_escape_string($conn,$_POST['deleteId']));
	for ($i=0; $i < count($id) ; $i++) { 
		$final_id = $id[$i];
		$update = $conn->query("DELETE FROM tasks WHERE id = '$final_id'");
		if ($update) {
			
			
		}else{
			echo "<script>alert('Failed')</script>";
		}	
	}
		
	
}

if (isset($_POST['storedIdsAssign'])) {
	require 'config.php';
	session_start();
	$email = mysqli_real_escape_string($conn,$_POST['emailsArray']);
	$get_name = $conn->query("SELECT * FROM users WHERE email='$email'");
	while ($row=$get_name->fetch_assoc()) {
		$name = $row['name'];
	}
	$time_now = date('jS F, g.i a');
	$id = explode(",",mysqli_real_escape_string($conn,$_POST['storedIdsAssign']));
	for ($i=0; $i < count($id) ; $i++) { 
		$final_id = $id[$i];
		$update = $conn->query("UPDATE tasks SET email='$email',owner='$name',notification_status ='1' WHERE id = '$final_id'");
		if ($update) {
			
			echo "Task successfully assigned to ".$name."";
		}else{
			echo "<script>alert('Failed')</script>";
		}	
	}
	
	
	
}

function showNotifications(){
	require 'config.php';
	$email = $_SESSION['email'];
	$get_name = $conn->query("SELECT * FROM tasks WHERE   email='$email' ORDER BY id DESC");
		while ($row=$get_name->fetch_assoc()) {
			echo notificationTypes($row['notification_one'],$row['notification_two'],$row['task'],$row['owner']);
			

	}
	

}
function showNotificationsTwo(){
	require 'config.php';
	$get_name = $conn->query("SELECT * FROM tasks  ORDER BY id DESC");
		while ($row=$get_name->fetch_assoc()) {
			echo notificationTypesTwo($row['notification_one'],$row['notification_two'],$row['task'],$row['owner']);
			

	}
	

}

function NotificationCounter(){
	require 'config.php';
	$email = $_SESSION['email'];
	$get_name = $conn->query("SELECT * FROM tasks WHERE email='$email' AND notification_two !='2' AND notification_one!='2' ORDER BY id DESC");
	echo $get_name->num_rows;
}
function NotificationCounterTwo(){
	require 'config.php';
	$get_name = $conn->query("SELECT * FROM tasks WHERE notification_two !='2' AND notification_one!='2' ORDER BY id DESC");
	echo $get_name->num_rows;
}
function notificationTypes($not1,$not2,$task){
	if ($not1==='1' && $not2==='0') {
		return '<a class="dropdown-item" href="notifications.php?name='.$task.'">You have successfully added <b><u>'.$task.'</u></b> task which is due in 12 hours</a><div class="dropdown-divider"></div>';
	}else if($not1==='1' && $not2==='1'){
		return '<a class="dropdown-item" href="notifications.php?name='.$task.'">Congrats, you have successfully Completed <b><u>'.$task.'</u></b>  task </a><div class="dropdown-divider"></div>';
	}else if($not1==='0' && $not2==='0'){
		return '<a class="dropdown-item" href="notifications.php?name='.$task.'">Congrats, you have successfully Completed <b><u>'.$task.'</u></b>  task </a><div class="dropdown-divider"></div>';
	}
	
}

function notificationTypesTwo($not1,$not2,$task,$name){
	if ($not1==='1' && $not2==='0') {
			return '<a class="dropdown-item" href="notifications.php?nameTwo='.$task.'">'.$name.' have successfully added <b><u>'.$task.'</u></b> task which is due in 12 hours</a><div class="dropdown-divider"></div>';
		}else if($not1==='1' && $not2==='1'){
			return '<a class="dropdown-item" href="notifications.php?nameTwo='.$task.'">'.$name.', have successfully Completed <b><u>'.$task.'</u></b>  task </a><div class="dropdown-divider"></div>';
		}else if($not1==='0' && $not2==='0'){
			return '<a class="dropdown-item" href="notifications.php?nameTwo='.$task.'">'.$name.', have successfully Completed <b><u>'.$task.'</u></b>  task </a><div class="dropdown-divider"></div>';
		}
	
}
function displayAllNotifications(){
	function selectFromLists($db_value){
		if (isset($_GET['name'])) {
			$task = $_GET['name'];
			if ($task===$db_value) {
				return "bg-info text-light";
			}
		}
	}
	require 'config.php';
	$email = $_SESSION['email'];
	$get_name = $conn->query("SELECT * FROM tasks WHERE notification_two !='2' AND notification_one!='2' AND notification_status ='1'  ORDER BY id DESC");
	if ($get_name->num_rows>0) {
		while ($row=$get_name->fetch_assoc()) {
		echo '<li class="list-group-item d-flex justify-content-between align-items-start '.selectFromLists($row['task']).'">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">'.$row['task'].'</div>
                  '.notificationTypes($row['notification_one'],$row['notification_two'],$row['task']).'
                </div>
                <span class="badge badge-primary rounded-pill"><a class="btn btn-info" href="?markRead='.$row['task'].'">MarkRead</a></span>
              </li>';
		
		
	}
	}else{
		echo '<li class="l d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">No tasks found!</div>
                  
                </div>
                
              </li>';
		
	}
	if (isset($_GET['markRead'])) {
		$task = mysqli_real_escape_string($conn, $_GET['markRead']);
		$update = $conn->query("UPDATE tasks SET notification_two ='2',notification_one ='2' WHERE task = '$task' ");
		if ($update) {
			echo "<script>window.location.assign('notifications.php');</script>";
			//echo "<script>alert('Operation was successful')</script>";
		}else{
			echo "<script>alert('Failed')</script>";
		}	
	}
}

function displayAllNotificationsTwo(){
	function selectFromLists($db_value){
		if (isset($_GET['nameTwo'])) {
			$task = $_GET['nameTwo'];
			if ($task===$db_value) {
				return "bg-info text-light";
			}
		}
	}
	require 'config.php';
	$get_name = $conn->query("SELECT * FROM tasks WHERE notification_two !='2' AND notification_one!='2'   ORDER BY id DESC");
	if ($get_name->num_rows>0) {
		while ($row=$get_name->fetch_assoc()) {
		echo '<li class="list-group-item d-flex justify-content-between align-items-start '.selectFromLists($row['task']).'">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">'.$row['task'].'</div>
                  '.notificationTypesTwo($row['notification_one'],$row['notification_two'],$row['task'],$row['owner']).'
                </div>
                <span class="badge badge-primary rounded-pill"><a class="btn btn-info" href="?markReadTwo='.$row['task'].'">MarkRead</a></span>
              </li>';
		
		
	}
	}else{
		echo '<li class="l d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">No tasks found!</div>
                  
                </div>
                
              </li>';
		
	}
	if (isset($_GET['markReadTwo'])) {
		$task = mysqli_real_escape_string($conn, $_GET['markReadTwo']);
		$update = $conn->query("UPDATE tasks set notification_two='2',notification_one='2' WHERE task = '$task' ");
		if ($update) {
			echo "<script>window.location.assign('notifications.php');</script>";
			//echo "<script>alert('Operation was successful')</script>";
		}else{
			echo "<script>alert('Failed')</script>";
		}	
	}
}

 ?>