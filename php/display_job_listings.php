<?php
if (isset($_POST['see_all_btn'])) {
   selectFromCareerTable("");
 } else{
  selectFromCareerTable("LIMIT 4");
 }

function joblistingNumbering($length){
  if (strlen($length)===1) {
    return "0".$length;
  }else{
    return $length;
  }
}

function selectFromCareerTable($condition){
  $numbering = 1;
  require 'config.php';
  $select = $conn->query("SELECT * FROM career $condition");
  if ($select->num_rows>0) {
    while ($row=$select->fetch_assoc()) {
      echo "<tr class='hover-effect' data-aos='fade-left'>
        <td class='text-muted'>".joblistingNumbering($numbering++)."</td>
        <td>
        <div class='profile-card d-flex align-items-center'>
          <img width='150' src='".$row['job_image_path']."' class='img-fluid mr-3' alt='Profile Picture'>
            <div class='text-muted'>
              <h5>".$row['job_title']."</h5>
              <div class='d-flex mt-2'>
                <span class='mr-3'><i class='fa fa-map-marker'></i> ".$row['job_location']."</span>
                <span class='mr-3'><i class='fa fa-clock'></i> ".$row['job_type']."</span>
              </div>
                <div class='d-flex'>
                  <span class='mt-2'>Deadline: ".$row['job_deadline']."</span>
              </div>
            </div>
        </div>
    </td>
    <td>
      <div class='align-self-end mt-5  '>
        <div class='d-flex align-items-center'>
          <a href='job-board?jobId=".$row['job_id']."' class='btn btn-outline-primary'>Apply</a>
        </div>
      </div>
    </td>
      </tr>";
    }
  }else{
    echo "<tr class='hover-effect'>
        <td class='text-muted'>03</td>
        <td>
        <div class='profile-card d-flex align-items-center'>
          <img width='150' src='images/careers/career-float.jpg' class='img-fluid mr-3' alt='Profile Picture'>
            <div class='text-muted'>
              <h5>Data Engineer</h5>
              <div class='d-flex mt-2'>
                <span class='mr-3'><i class='fa fa-map-marker'></i> New York</span>
                <span class='mr-3'><i class='fa fa-clock'></i> Part Time</span>
              </div>
                <div class='d-flex'>
                  <span class='mt-2'>Deadline: Jan 31, 2019</span>
              </div>
            </div>
        </div>
    </td>
    <td>
      <div class='align-self-end mt-5  '>
        <div class='d-flex align-items-center'>
          <button class='btn btn-outline-primary'>Apply</button>
        </div>
      </div>
    </td>
      </tr>";
  }
  }

 ?>