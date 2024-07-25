<?php
function uploadNewBlog(){
    include '../../php/config.php';
    if($_FILES["blog_image"]["error"] == UPLOAD_ERR_OK) {
    // Sanitize and validate user input
    $blog_title = mysqli_real_escape_string($conn,$_POST['blog_title']);
    $blog_image = mysqli_real_escape_string($conn,$_FILES['blog_image']['name']);  
    $new_path = "images/blogs/". $blog_image;  
    $body = mysqli_real_escape_string($conn,$_POST['blog_body']);
    $blog_author = "Malvine Owuor";
    $date = date("F jS"); // Get the month and day in "Month DayOrdinal" format
    $date = date("F jS", strtotime($date)); // Ensure proper date parsing
    $blog_id= rand(1000000,10000000000);
    
    $target = "../../images/blogs/".$blog_image;     
    if (move_uploaded_file($_FILES['blog_image']['tmp_name'], $target)) {
            // Prepare and bind the SQL statement
            $stmt = $conn->query("INSERT INTO blogs (title, author, body, `date`, image_path,blog_id) VALUES ('$blog_title', '$blog_author', '$body', '$date', '$new_path','$blog_id')");

            // Execute the statement
            if ($stmt) {
                echo "1";
            } else {
                // Log the error securely
                //error_log('Failed to insert contact form data into the database');

                // Display a generic error message
                echo "Failed to submit the form. Please try again later";
            }

            // Close the statement
           

    } else{
        echo "Failed to upload, try again";
    }

}else{
    echo "Not set";
}

} 

if (isset($_FILES['blog_image']['name']) && isset($_POST['blog_title']) && isset($_POST['blog_body'])) {
    uploadNewBlog();
}


function displayJobApplicantsTable(){
    function cheIfNull($role){
        if ($role==="") {
                return "Data Analysis | Data Management | Business";
            }else{
                return $role;
            }
    }
include '../php/config.php';
$numbering=1;
$select = $conn->query("SELECT * FROM job_applications ORDER BY ID DESC");
if ($select->num_rows>0) {
    while ($row=$select->fetch_assoc()) {
    echo  ' <tr class="'.highlightStatus($row['status']).'" id="'.$row['id'].'">
            <td>'.$numbering++.'</td>
            <td>'.cheIfNull($row['role']).'</td>
            <td> '.$row['name'].'</td>
            <td> <a href="mailto:'.$row['email'].'">'.$row['email'].'</a></td>
            <td> '.$row['address'].'</td>
            <td> <a href="tel:'.$row['phone'].'">'.$row['phone'].'</a></td>
            <td> <a href="../pdf/'.$row['cv'].'" target="_blank">Click here to Preview Cv</a></td>
            <td>
             <div class="d-flex">
              '.revokeShortlisted($row['status'],$row['id']).'
              <a class="btn btn-danger me-2" href="?deletionId='.$row['id'].'">Delete
                <i class="fa fa-trash"> </i>
              </a>
            </div>

            </td> 
          </tr>';
    }
}
if (isset($_GET['aplicationId'])) {
        $id = mysqli_real_escape_string($conn,$_GET['aplicationId']);
        $update_status = $conn->query("UPDATE job_applications SET status='2' WHERE id='$id'");
        if ($update_status) {
            echo "<script>window.location.assign('career#".$id."')</script>";
        }else{
            echo "<script>alert('Could not finish the operation!')</script>";
        }
    }
    if (isset($_GET['revokeId'])) {
        $id = mysqli_real_escape_string($conn,$_GET['revokeId']);
        $update_status = $conn->query("UPDATE job_applications SET status='1' WHERE id='$id'");
        if ($update_status) {
            echo "<script>window.location.assign('career#".$id."')</script>";
        }else{
            echo "<script>alert('Could not finish the operation!')</script>";
        }
    }
    if (isset($_GET['rejectId'])) {
        $id = mysqli_real_escape_string($conn,$_GET['rejectId']);
        $update_status = $conn->query("UPDATE job_applications SET status='3' WHERE id='$id'");
        if ($update_status) {
            echo "<script>window.location.assign('career#".$id."')</script>";
        }else{
            echo "<script>alert('Could not finish the operation!')</script>";
        }
    }
}

function highlightStatus($status){
    if ($status==="1") {
       return "";
    }else if($status==="3"){
         return "table-danger";
    }else{
        return "table-success";
    }
}
function revokeShortlisted($status,$id){
     if ($status==="1") {
       return '<a class="btn btn-primary me-2" href="?aplicationId='.$id.'">Shortlist<i class="fas fa-check"></i></a>
       <a class="btn btn-info me-2" href="?rejectId='.$id.'">Reject<i class="fas fa-times"></i></a>';
    }else{
        return '<a class="btn btn-danger me-2" href="?revokeId='.$id.'"> Shortlisted
                        <i class="fas fa-times"></i>
                      </a><a class="btn btn-info me-2" href="?rejectId='.$id.'">Reject<i class="fas fa-times"></i></a>';
    }
}

function returnAllLocation(){
    include '../php/config.php';
    $select = $conn->query("SELECT address FROM job_applications");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            echo "<option>".$row['address']."</option>";
        }
    }else{
            echo "<option> disabled>No location found!</option>";
        }
}


function displayShortlistedCandidates(){
    function cheIfNullTwo($role){
        if ($role==="") {
                return "Data Analysis | Data Management | Business";
            }else{
                return $role;
            }
    }
include '../php/config.php';
$numbering=1;
$select = $conn->query("SELECT * FROM job_applications WHERE status='2' ORDER BY ID DESC ");
if ($select->num_rows>0) {
    while ($row=$select->fetch_assoc()) {
    echo  ' <tr class="'.highlightStatus($row['status']).'" id="'.$row['id'].'">
            <td>'.$numbering++.'</td>
            <td>'.cheIfNullTwo($row['role']).'</td>
            <td> '.$row['name'].'</td>
            <td> <a href="mailto:'.$row['email'].'">'.$row['email'].'</a></td>
            <td> '.$row['address'].'</td>
            <td> <a href="tel:'.$row['phone'].'">'.$row['phone'].'</a></td>
            <td> <a href="../pdf/'.$row['cv'].'" target="_blank">Click here to Preview Cv</a></td>
            <td>
             <div class="d-flex">
              '.revokeShortlisted($row['status'],$row['id']).'
              <a class="btn btn-danger me-2" href="?deletionId='.$row['id'].'">
                <i class="fa fa-trash"></i>
              </a>
            </div>

            </td> 
          </tr>';
    }
}
if (isset($_GET['aplicationId'])) {
        $id = mysqli_real_escape_string($conn,$_GET['aplicationId']);
        $update_status = $conn->query("UPDATE job_applications SET status='2' WHERE id='$id'");
        if ($update_status) {
            echo "<script>window.location.assign('career#".$id."')</script>";
        }else{
            echo "<script>alert('Could not finish the operation!')</script>";
        }
    }
    if (isset($_GET['revokeId'])) {
        $id = mysqli_real_escape_string($conn,$_GET['revokeId']);
        $update_status = $conn->query("UPDATE job_applications SET status='1' WHERE id='$id'");
        if ($update_status) {
            echo "<script>window.location.assign('career#".$id."')</script>";
        }else{
            echo "<script>alert('Could not finish the operation!')</script>";
        }
    }
}

//start of display Jobs Posted//
function displayJobsPosted(){
    include '../php/config.php';
    $numbering =1;
    $select = $conn->query("SELECT * FROM career");
     function readMore($text,$id){
        if (strlen($text) > 100) {
        // Trim the text to the maximum length and append the additional text
        return substr($text, 0, 100) . "<a href='?readMoreId=".$id."'>..Read More</a>";
    }
   
    }

    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
        echo  ' <tr id="'.$row['id'].'">
                <td>'.$numbering++.'</td>
                <td>'.$row['job_title'].'</td>
                <td> '. readMore($row['job_description'],$row['job_id']).'</td>
                <td> '.$row['job_deadline'].'</td>
                <td> '.$row['job_type'].'</td>
                <td> '.$row['job_location'].'</td>
                <td> <a href="../'.$row['job_image_path'].'"><img src=../'.$row['job_image_path'].'/></a></td>
                <td>
                 <div class="d-flex">
                  <a class="btn btn-danger me-2" href="?editJobId='.$row['job_id'].'">
                    <i class="fa fa-pen-to-square"> Close</i>
                  </a>
                  <a class="btn btn-danger me-2" href="?deletionJobId='.$row['job_id'].'">
                    <i class="fa fa-trash"></i>
                  </a>
                </div>

                </td> 
                  </tr>';
        }
    }
   
}
//end of display Jobs Posted//

//start of add new customer story//
function addNewCustomerStory(){
   include '../../php/config.php';
    $body_content = mysqli_real_escape_string($conn,$_POST['body_content']);
    $profile = mysqli_real_escape_string($conn,$_FILES['profile']['name']); 
    $new_path = strtolower(rand(10000,20000)."_".basename($profile));  
    $destination = "../../images/customer-stories/". $new_path; 
    $position = mysqli_real_escape_string($conn,$_POST['position']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    if (move_uploaded_file($_FILES['profile']['tmp_name'], $destination)) {
        $insert = $conn->query("INSERT INTO customer_stories(name,position,body_content,profile) VALUES('$name','$position','$body_content','$new_path')");
        if ($insert) {
             echo "1";
        }else{
             echo "Could not finish the operation!";
        }
    }else{
        echo "Failed to upload the file!";
    }
    

}
if (isset($_POST['name']) && isset($_FILES['profile']['name']) && isset($_POST['position'])) {
    addNewCustomerStory();
}
//end of add new customer story//

//start of edit career banner//
function editCareerBanner(){
   include '../../php/config.php';
    $career_body = mysqli_real_escape_string($conn,$_POST['career_body']);
    $career_image = mysqli_real_escape_string($conn,$_FILES['career_image']['name']); 
    $new_path = strtolower(rand(10000,20000)."_".basename($career_image));  
    $destination = "../../images/careers/". $new_path; 
    $career_title = mysqli_real_escape_string($conn,$_POST['career_title']);
    $select = $conn->query("SELECT * FROM career_banner");
    if ($select->num_rows>0) {
        if (move_uploaded_file($_FILES['career_image']['tmp_name'], $destination)) {
        $insert = $conn->query("UPDATE career_banner SET (career_body='$career_body',career_image='$career_image',career_title='$career_title')");
        if ($insert) {
             echo "1";
        }else{
             echo "Could not finish the operation!";
        }
    }else{
        echo "Failed to upload the file!";
    }
    }else{
        if (move_uploaded_file($_FILES['career_image']['tmp_name'], $destination)) {
        $insert = $conn->query("INSERT INTO career_banner (career_body,career_image,career_title) VALUES('$career_body','$career_image','$career_title')");
        if ($insert) {
             echo "1";
        }else{
             echo "Could not finish the operation!";
        }
    }else{
        echo "Failed to upload the file!";
    }
    }
   
    

}
if (isset($_POST['career_title']) && isset($_FILES['career_image']['name']) && isset($_POST['career_body'])) {
    editCareerBanner();
}
//end of edit career banner//

//start of edit career banner//
function editFooter(){
   include '../../php/config.php';
    $footerBody = mysqli_real_escape_string($conn,$_POST['footerBody']);
    $select = $conn->query("SELECT * FROM header_footer_contents");
    if ($select->num_rows>0) {
       $insert = $conn->query("UPDATE header_footer_contents SET footer='$footerBody'");
        if ($insert) {
             echo "1";
        }else{
             echo "Could not finish the operation!";
        }
    }else{
         $insert = $conn->query("INSERT INTO header_footer_contents (footer) VALUES('$footerBody')");
        if ($insert) {
             echo "1";
        }else{
             echo "Could not finish the operation!";
        }
    }
   
    

}
if (isset($_POST['footerBody'])) {
    editFooter();
}
//end of edit career banner//

?>