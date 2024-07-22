<?php 
if (isset($_GET['jobId'])) {
  require 'config.php';
  $numbering = 1;
  $id = mysqli_real_escape_string($conn,$_GET['jobId']);
  $select = $conn->query("SELECT * FROM career WHERE job_id='$id'");
  if ($select->num_rows>0) {
    while ($row=$select->fetch_assoc()) {
      $job_type = $row['job_type'];
       $job_title = $row['job_title'];
      echo "
        <h4>Job Title: ".$row['job_title']."</h4>
        <h6>Job Location: ".$row['job_location']."</h6>
        ".$row['job_description']."
      ";
    }
  }else{
    echo "Nothing was found!!";
  }
  function joblistingNumbering($length){
    if (strlen($length)===1) {
      return "0".$length;
    }else{
      return $length;
    }
  }
}



 ?>