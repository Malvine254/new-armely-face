<?php 
function displayYoutubeVideos() {
   require '../php/config.php';

    $stmt = $conn->prepare("SELECT url FROM videos ORDER BY id DESC LIMIT 3");
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Extract Video ID from iframe
            preg_match('/src="([^"]+)"/', $row['url'], $matches);
            $videoSrc = isset($matches[1]) ? $matches[1] : '';

            $videoId = getYouTubeId($videoSrc);

            if ($videoId) {
                echo '
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="lazy-video" data-src="https://www.youtube.com/embed/' . htmlspecialchars($videoId) . '?autoplay=1">
                        <div class="play-overlay">
                            <img src="https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg" class="lazy-thumb" alt="Video Thumbnail">
                            <div class="play-button"></div>
                        </div>
                    </div>
                </div>';
            }
        }
    } else {
        echo "<p>No video was found!</p>";
    }

    $stmt->close();
}
 function checkShortlistingStatus($status,$id){
        if ($status ==="2") {
            return '<a class="btn btn-info col-12" >Shortlisted</a>';
        }elseif ($status==="3") {
           return '<a class="btn btn-danger col-12" >Rejected</a>';
        }else{
            return '<a class="btn btn-warning col-12" href="?listId='.$id.'">Shortlist</a>';
        }
    }
    function revertRejected($status,$id){
        if ($status ==="1") {
            return '<a href="?rejectId='.$id.'" class="btn btn-danger col-12" >Reject</a>';
        }elseif ($status==="3" || $status==="2" ) {
           return '<a href="?revertId='.$id.'" class="btn btn-danger col-12" >Revert</a>';
        }
    }
    function backgroundColor($status){
        if ($status ==="2") {
            return 'bg-info text-light';
        }elseif ($status==="3") {
           return 'bg-danger text-light';
        }else{
            return 'text-dark';
        }
    }
    function deleteRecords($tableName, $id,$header){
        require '../php/config.php';
        $del = $conn->query("DELETE FROM $tableName WHERE id=$id");
        if ($del) {
            return header("location:".$header."");
        }
    }


function displayAllCareerOpoortunities(){
  
    require '../php/config.php';
    $numbering = 1;
    $select = $conn->query("SELECT * FROM job_applications  ORDER BY id DESC");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            echo '
            <tr class="'.backgroundColor($row['status']).'">
                <td>'.$numbering++.'</td>
                <td>'.$row["position"].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['address'].'</td>
                <td>'.$row['application_date'].'</td>
                <td>'.$row['phone'].'</td>
                <td><a href="../pdf/'.$row['cv'].'" target="_blank">cv</a></td>
                <td>'.checkShortlistingStatus($row['status'],$row['id']).'<br><br> '.revertRejected($row['status'],$row['id']).'</td>
            </tr>';
}
}
if (isset($_GET['listId'])) {
    $id = $_GET['listId'];
    $update = $conn->query("UPDATE job_applications SET status='2' WHERE id=$id");
    if ($update) {
        echo "<script>window.location.assign('career');</script>";
    }else{
        echo "Failed";
    }
}
if (isset($_GET['revertId'])) {
    $id = $_GET['revertId'];
    $update = $conn->query("UPDATE job_applications SET status='1' WHERE id=$id");
    if ($update) {
        echo "<script>window.location.assign('career');</script>";
    }else{
        echo "Failed";
    }
}

}

//delete records
if (isset($_GET['delId'])) {
   $id = $_GET['delId'];
   deleteRecords('job_applications', $id,'career');
}

function displayShortlistedCandidates(){
   
    require '../php/config.php';
    $numbering = 1;
    $select = $conn->query("SELECT * FROM job_applications  WHERE status='2' ORDER BY id DESC");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            echo '
            <tr>
                <td>'.$numbering++.'</td>
                <td>'.$row["position"].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['address'].'</td>
                <td>'.$row['application_date'].'</td>
                <td>'.$row['phone'].'</td>
                <td><a href="../pdf/'.$row['cv'].'" target="_blank">cv</a></td>
               <td>'.checkShortlistingStatus($row['status'],$row['id']).'<br><br> '.revertRejected($row['status'],$row['id']).'</td>
            </tr>';
}
}
if (isset($_GET['rejectId'])) {
    $id = $_GET['rejectId'];
    $update = $conn->query("UPDATE job_applications SET status='3' WHERE id=$id");
    if ($update) {
        echo "<script>window.location.assign('career');</script>";
        
    }else{
        echo "Failed";
    }
}
}

function displayJobPosted(){
   
    require '../php/config.php';
    $numbering = 1;
    $select = $conn->query("SELECT * FROM career ORDER BY id DESC");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            echo '
            <tr>
                <td>'.$numbering++.'</td>
                <td>'.$row["job_title"].'</td>
                <td>'.substr($row['job_description'],0,200).'....</td>
                <td>'.$row['job_deadline'].'</td>
                <td>'.$row['job_type'].'</td>
                <td>'.$row['job_location'].'</td>
                <td> <a class="btn btn-danger col-12" href="?jobDelId='.$row['id'].'">Remove</a><br><br><a class="btn btn-info col-12" href="?editId='.$row['id'].'">Edit</a></td>
            </tr>';
}
}
}

function displayLocations() {
    require '../php/config.php';

    $select = $conn->query("SELECT address FROM job_applications");
    if ($select->num_rows > 0) {
        $seen = []; // To track lowercase versions of addresses
        while ($row = $select->fetch_assoc()) {
            $address = $row['address'];
            $lowerAddress = strtolower($address);
            if (!in_array($lowerAddress, $seen)) {
                $seen[] = $lowerAddress;
                echo "<option>" . htmlspecialchars($address) . "</option>";
            }
        }
    }
}



function displayBlogsTable(){
   
    require '../php/config.php';
    $numbering = 1;
    $select = $conn->query("SELECT * FROM blogs   ORDER BY id DESC");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            echo '
            <tr >
                <td>'.$numbering++.'</td>
                <td><a href="../blog?blogId='.$row["blog_id"].'" target=_blank>'.$row["title"].'</a></td>
                <td><img width="100" class="img-fluid" src="../'.$row['image_path'].'"></td>
                <td>'.$row['date'].'</td>
                <td><a href="actions?editId='.$row['blog_id'].'&type=blog" class="fa fa-edit p-3 "></a> <a href="?blogDelId='.$row['blog_id'].'" class="fa fa-trash text-danger"></a> </td>
               
            </tr>';
}
}

}

function displayYoutubeVideosTable(){
   
    require '../php/config.php';
    $numbering = 1;
    $select = $conn->query("SELECT * FROM videos   ORDER BY id DESC");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            echo '
            <tr >
                <td>'.$numbering++.'</td>
                <td>'.$row["url"].'</td>
               
                <td><a href="actions?editId='.$row['id'].'&type=video" class="fa fa-edit p-3 "></a><a href="?videosDelId='.$row['id'].'" target="_blank" class="fa fa-trash"></a></td>
               
            </tr>';
}
}

}

if (isset($_GET['blogDelId'])) {
    require '../php/config.php';
    $id = $_GET['blogDelId'];

    // Fetch the image filename before deleting the blog post
    $query = $conn->query("SELECT * FROM blogs WHERE blog_id=$id");
    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        $imagePath = "../" . $row['image_path']; // Adjust the path to match your image directory

        // Delete the image file from the directory if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }else{
            echo "No image found";
        }
    }

    // Now delete the blog entry from the database
    $delete = $conn->query("DELETE FROM blogs WHERE blog_id=$id");

    if ($delete) {
        echo "<script>alert('deleted');window.location</script>";
    } else {
        echo "Failed";
    }
}else if (isset($_GET['videosDelId'])) {
     $videosDelId = $_GET['videosDelId'];
     // Now delete the blog entry from the database
    $delete = $conn->query("DELETE FROM videos WHERE id=$videosDelId");

    if ($delete) {
        echo "<script>alert('deleted');</script>";
    } else {
        echo "Failed";
    }

}else if (isset($_GET['socialDelId'])) {
    require '../php/config.php';
    $id = intval($_GET['socialDelId']); // Always sanitize input

    // Fetch the images before deleting the post
    $query = $conn->query("SELECT image_url FROM social_impact WHERE id = $id");

    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();

        // Convert comma-separated string into array
        $images_array = explode(",", $row['image_url']);

        foreach ($images_array as $img) {
            $imagePath = "../images/social-impact/" . trim($img);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Now delete the post
        $delete = $conn->query("DELETE FROM social_impact WHERE id = $id");

        if ($delete) {
            echo "<script>alert('Deleted successfully'); window.location.assign('tables');</script>";
        } else {
            echo "Failed to delete record from database.";
        }
    } else {
        echo "No record found.";
    }
}


function displayAllCareerListing(){
  
    require '../php/config.php';
    $numbering = 1;
    $select = $conn->query("SELECT * FROM career  ORDER BY id DESC");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            echo '
            <tr>
                <td>'.$numbering++.'</td>
                <td>'.$row["job_title"].'</td>
                <td>'.$row['job_deadline'].'</td>
                <td>'.$row['job_type'].'</td>
                <td>'.$row['job_location'].'</td>
                <td><a href="actions?editId='.$row['id'].'&type=career" class="fa fa-edit p-3 "></a><a href="?jobDelId='.$row['id'].'" target="_blank" class="fa fa-trash text-danger"></a></td>
            </tr>';
}
}
}

function displayAllSocialImpactTable(){
  
    require '../php/config.php';
    $numbering = 1;
    $select = $conn->query("SELECT * FROM social_impact  ORDER BY id DESC");
    if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
            echo '
            <tr>
                <td>'.$numbering++.'</td>
                <td>'.$row["title"].'</td>
                <td>'.substr($row['body'],0,200).'</td>
                <td>'.$row['category'].'</td>
                <td>'.$row['author_name'].'</td>
                <td><a href="actions?editId='.$row['id'].'&type=social_impact" class="fa fa-edit p-3 "></a><a href="?socialDelId='.$row['id'].'" target="_blank" class="fa fa-trash text-danger"></a></td>
            </tr>';
}
}
}

function editBlogArticle() {
    require '../php/config.php';
    global $conn; // Add this line

    if (isset($_GET['type'])  && isset($_GET['editId'])) {
        if ($_GET['type'] === "blog") {
             $editId = intval($_GET['editId']);

                $stmt = $conn->query("SELECT title, body FROM blogs WHERE blog_id = $editId");

                if ($stmt && $stmt->num_rows > 0) {
                    $row = $stmt->fetch_assoc();
                    return [
                        'title' => $row['title'],
                        'body' => $row['body']
                    ];
                } else {
                    return "blah blah"; // You may want to return null instead
                }
            }

            return null;
        }
       
}



function editVideos() {
    require '../php/config.php';
    global $conn; // Add this line

    if (isset($_GET['type']) && isset($_GET['editId'])) {
        if ($_GET['type'] === "video") {
            $editId = intval($_GET['editId']);

                $stmt = $conn->query("SELECT url FROM videos WHERE id = $editId");

                if ($stmt && $stmt->num_rows > 0) {
                    $row = $stmt->fetch_assoc();
                    return [
                        'url' => $row['url']
                    ];
                } else {
                    return "blah blah"; // You may want to return null instead
                }
            }

            return null;
        }
       
}


function editCareer() {
    require '../php/config.php';
    global $conn; // Add this line

    if (isset($_GET['type']) && isset($_GET['editId'])) {
        if ($_GET['type'] === "career") {
            $editId = intval($_GET['editId']);

                $stmt = $conn->query("SELECT job_title, job_description,job_deadline  FROM career WHERE id = $editId");

                if ($stmt && $stmt->num_rows > 0) {
                    $row = $stmt->fetch_assoc();
                    return [
                        'job_title' => $row['job_title'],
                        'job_description' => $row['job_description'],'deadline'=>date('Y-m-d', strtotime($row['job_deadline']))
                    ];
                } else {
                    return ""; // You may want to return null instead
                }
            }

            return null;
        }
       
}