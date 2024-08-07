<?php
function dateFormat(){
	// Your date
	$date =  date('y-m-d');
	// Convert the date to a timestamp
	$timestamp = strtotime($date);
	// Format the date
	$formattedDate = date("j M Y", $timestamp);
	return $formattedDate;
}
echo dateFormat();
?>
