<?php 
	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];
		$get_name = $conn->query("SELECT * FROM tasks WHERE notification_one='0' AND email='$email'");
		if ($get_name->num_rows>0) {
			while ($row=$get_name->fetch_assoc()) {
			echo '<a class="dropdown-item" href="#">You have successfully added '.$row['task'].' task which is due in 12 hours</a><div class="dropdown-divider"></div>';
		}
		}
	}if (isset($_SESSION['admin'])) {
		$get_name = $conn->query("SELECT * FROM tasks WHERE notification_one='0'");
		if ($get_name->num_rows>0) {

			while ($row=$get_name->fetch_assoc()) {
			echo '<a class="dropdown-item" href="#">'.$row['owner'].' has successfully added '.$row['task'].' task which is due in 12 hours</a><div class="dropdown-divider"></div>';
		}
		}
	}
	
	

 ?>