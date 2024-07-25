<?php 
$conn = new mysqli("localhost","root","","tech_hub");
if ($conn) {
	// code...
}else{
	mysql_error($conn);
}

 ?>