<?php 
$date = date("F jS"); // Get the month and day in "Month DayOrdinal" format
$date = date("F jS", strtotime($date)); // Ensure proper date parsing
echo $date; // Output: April 30th


 ?>