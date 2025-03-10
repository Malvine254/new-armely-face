<?php 
session_start();
if (isset($_SESSION['admin'])) {


  // Function to convert timestamp to human-readable date
  function getRemainingTime($timestamp,$status,$completed_time,$startTime) {
    $deadline = ($timestamp + (12 * 3600))- time(); // Calculate remaining time in seconds
    $hours = floor($deadline / 3600); // Convert remaining seconds to hours
    $minutes = floor(($deadline % 3600) / 60); // Convert remaining seconds to minutes
    $seconds = $deadline % 60; // Remaining seconds

    if ($status === "completed") {
      $startTime = date('jS F, g.i a', $startTime);
       return "<b class='text-success'>". $startTime ."</b> to <b  class='text-primary'>". $completed_time."</b>";
    }else  if ($hours<=0  && $minutes<=0 && $seconds<=0) {
         // Return remaining time as formatted string
        return "<button class='btn btn-danger'>Deadline Passed</button>";
      } else{
        
        // Return remaining time as formatted string
        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }
      
  }
  function checkStatus($status){
      if ($status==='active') {
        return "warning ";
      }else if ($status==='completed') {
      return 'success';
      }
  }
  
  require 'config.php';
  $email = $_SESSION['admin'];
  $numbering = 1;
  $select = $conn->query("SELECT * FROM tasks  ORDER BY CASE WHEN status != 'completed' THEN 0 ELSE 1 END, status;
  ");
  if ($select->num_rows>0) {
  while ($row=$select->fetch_assoc()) {
    echo ' 
          
          <tr>
            <td>'.$numbering++.'</td>
            <td>
              <p class="fw-normal mb-1">'.$row['task'].'</p>
            </td>
            <td>
              <p class="fw-normal mb-1">'.$row['owner'].'</p>
            </td>
            <td>
              <span class="badge badge-'.checkStatus($row['status']).' rounded-pill d-inline">'.$row['status'].'</span>
            </td>
            <td class="font-monospace timer-column"><strong>'.getRemainingTime($row['time_stamp'],$row['status'],$row['completed_time'],$row['time_stamp']).'</strong></td>
            
          </tr>';
  }
  }

  
}





?>