<?php
require 'config.php'; 
function submitContactForm(){
	global $conn;
	$name = $_POST['name'];
	$email = $_POST['email'];
	$organization = $_POST['organization'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	
	// Prepare and bind the SQL statement
	$stmt = $conn->prepare("INSERT INTO contacts (name, email, organization, phone, message) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $name, $email, $organization, $phone, $message);
	
	// Execute the statement
	if ($stmt->execute()) {
		echo "<script>alert('Message was sent Successfully')</script>";
	} else {
		echo "<script>alert('Failed')</script>";
	}
	
	// Close the statement
	$stmt->close();
}

function scheduleConsultant(){
    global $conn;
	$name = $_POST['name'];
	$email = $_POST['email'];
	$organization = $_POST['organization'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	$service_name = $_POST['service_name'];
	
	// Prepare and bind the SQL statement
	$stmt = $conn->prepare("INSERT INTO consultation (name, email, organization, phone, message, service_name) VALUES (?, ?, ?, ?, ?,?)");       
	$stmt->bind_param("ssssss", $name, $email, $organization, $phone, $message,$service_name);
	
	// Execute the statement
	if ($stmt->execute()) {
		echo "<script>alert('Message was sent Successfully')</script>";
	} else {
		echo "<script>alert('Failed')</script>";
	}
	
	// Close the statement
	$stmt->close();
}

if (isset($_POST['submit_form'])) {
	submitContactForm();
}
if (isset($_POST['consultation_btn'])) {
	scheduleConsultant();
}

if (isset($_POST['submit_form'])) {
	submitContactForm();
}

function displayHeader(){
	include 'config.php';
	$select = $conn->query("SELECT * FROM header_footer_contents LIMIT 1");
	if ($select->num_rows>0) {
		while ($row=$select->fetch_assoc()) {
			return  $row['header'];
		}
	}
	
}
function displayFooter(){
	include 'config.php';
	$select = $conn->query("SELECT * FROM header_footer_contents LIMIT 1");
	if ($select->num_rows>0) {
		while ($row=$select->fetch_assoc()) {
			return  $row['footer'];
		}
	}
}

function displayFloatingButton(){
	return "
<div class='d-flex justify-content-center' >
  <div style='overflow: hidden;' id='floatingItem' class='floating-item floatingItemTwo container col-md-12 shadow bg-light'>
    <div class='m-5 '>
      <div style='overflow: scroll; height: 60vh;'>  
        <h4>Search Results</h4>
         <div id='searchResults'></div>
      </div>
       
   
    </div>
  </div>
</div>
";
}

function displayBlogs(){
	function stringLength($length){

	if (strlen($length)===1) {
		return "0".$length;
	}else{
		return $length;
	}
}
function hightlightSelectedBlog($checkingId){
   
 if (isset($_GET['blogId'])) {
   if ($_GET['blogId']===$checkingId) {
    return "bg-warning p-1";
  }
	}

}


function estimateReadingTime($htmlText) {
    $wordsPerMinute = 200;
    // Strip HTML tags from the text
    $plainText = strip_tags($htmlText);

    // Count the number of words in the plain text
    $wordCount = str_word_count($plainText);

    // Calculate the reading time in minutes
    $readingTime = ceil($wordCount / $wordsPerMinute);

    return $readingTime;
}
	
function selectFromBlog($condition){
	require 'config.php';
	$numbering = 1;
	$select = $conn->query("SELECT * FROM blogs $condition");
	if ($select->num_rows>0) {
		while ($row=$select->fetch_assoc()) {
			echo "
		<div  style='display: none;' class='row align-items-center blog-article' data-aos='fade-up'>
    <div class='col-2'>
        <h6 class='lead h1 text-muted text-center'>".stringLength($numbering++)."</h6>
    </div>
    <a href='?blogId=".$row['blog_id']."'>
        <div class='col-10'>
            <span class='text-muted title-new ".hightlightSelectedBlog($row['blog_id'])."'><strong>".$row['title']."</strong></span>
            <div>
            </a>
                <p style='font-size: 14px;' class='mt-0 text-sm text-muted'>".$row['author']."
                    <br><span class='text-muted'>".$row['date']." • ".estimateReadingTime($row['body'])." min read</span>
                </p>
        </div>
    </div>
</div>
";
		}
	}else{
		echo "<div class='row align-items-center'>
	            <div class='col-2'>
	            <h6 class='lead h1 text-muted text-center'></h6>
	          </div>
	          <div class='col-10 '>
	             <span class='text-muted title-new '><strong>No data was found! </strong></span>
	           <div>
	              <p style='font-size: 14px;' class='mt-0 text-sm text-muted'>
	                <br><span class='text-muted'></span>
	              </p>
	          </div>
	        </div>

	      </div></span>";
	}
	}
	if (isset($_GET['aseealessblogpost'])) {
	   selectFromBlog("");
	 }elseif (isset($_GET['aseealessblogpost']) && isset($_GET['blogId']) ) {
	 	selectFromBlog("");
	 } else{
	  selectFromBlog("ORDER BY id DESC");
	 }

}

function displayRecentBlogs(){
	require 'config.php';
	function estimateReadingTime($htmlText) {
	$wordsPerMinute = 200;
	// Strip HTML tags from the text
	$plainText = strip_tags($htmlText);

	// Count the number of words in the plain text
	$wordCount = str_word_count($plainText);

	// Calculate the reading time in minutes
	$readingTime = ceil($wordCount / $wordsPerMinute);

	return $readingTime;
	}
	$numbering = 1;
	$select = $conn->query("SELECT * FROM blogs ORDER BY id DESC LIMIT 3");
	if ($select->num_rows>0) {
		while ($row=$select->fetch_assoc()) {
			echo "<div class='col-md-4' data-aos='fade-in'>
	        <div class='card bg-primary mb-3 transparent-card shadow'>
	          <img style='max-height: 250px; min-height: 250px;' class='card-img-top img-fluid' src='".$row['image_path']."' alt='Card image cap'>
	          <div class='card-body'>
	              <h6 class='text-muted'>".$row['title']."</h6>
	             <p style='font-size: 14px;' class='mt-0 text-sm'>".$row['author']."
	                <br><span class='text-muted'>".$row['date']." • ". estimateReadingTime($row['body'])." min read</span>
	                 <a href='blog?blogId=".$row['blog_id']."' class='btn btn-outline-primary ml-2'>Read more</a>
	              </p>
	          </div>
	      </div> 
	      </div>";
		}
	}else{
		echo "<div class='shadow align-items-center blog-id'>
			<div class='alert alert-danger'>
				<p>No data was found</a>
			</div>
		</div>";
	}

}


function readMore(){
	require 'config.php';
	$select = $conn->query("SELECT * FROM career ");
	if ($select->num_rows>4) {
		echo " <div class='mt-3 row justify-content-center'>
	    <button type='button' id='see_all_btn' class='btn btn-outline-primary'>Browse all Jobs</button>
	    <button style='display: none;' type='button' id='see_less_btn' class='btn btn-outline-primary'>Browse Less Jobs</button>
	  </div>";
	}else{
		echo "";
	}
}

function displayCustomerStoriesTestimonials(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM customer_stories");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo '<div class="col-md-4 mb-2 mb-md-2 card-item">
        <div class="card border-dark transparent-card" style="min-height: 300px !important;" data-aos="fade-in">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="images/customer-stories/'.$row['profile'].'"
                class="rounded-circle shadow-1-strong" width="60" height="60" />
            </div>
            <h6 class="font-weight-bold">'.$row['name'].'</h6>
            <p class="font-weight-bold my-3">'.$row['position'].'</p>

            <div class="mb-0 truncated-text">
              '.$row['body_content'].'
            </div>
             <button class="btn btn-outline-primary read-more-btn">Read More</button>
          </div>
        </div>
      </div>';
      
        }
    }else{
        echo "No records found!";
    }

}

function displayCoreValues(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM core_values ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo '<div class="col-md-4 column card-item" data-aos="fade-right">
            <div class=" p-4" style="min-height: 320px !important;">
                <img width="100" height="100" src="images/company/'.$row['icon'].' " alt="" class="img-fluid rounded-circle  bg-light p-1 mt-2 mb-1 p-2">
                <h5>'.$row['title'].'</h5>
                <p class="mb-4 truncated-text">'.$row['body'].'</p>
                 <button class="btn btn-outline-primary read-more-btn">Read More</button>
            </div>
                   
        </div>';
      
        }
    }else{
        echo "No records found!";
    }

}

function displayServicesList(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM services_lists ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo ' <div class="col-md-4 mb-4 mb-md-0 card-item" data-aos="fade-left">
				        <div class="card transparent-card">
				          <div class="card-body py-4 mt-2">
				            <div class="d-flex justify-content-start mb-4">
				              <img src="images/services/'.$row['image'].'"
				                class=" shadow-1-strong" width="100%" height="240"/>
				            </div>
				            <h5 class="font-weight-bold my-3">'.$row['title'].'</h5>
				            <p class="mb-2">
				              <i class="fas fa-quote-left pe-2"></i>'.$row['body'].' <a href="data">Learn More</a>
				            </p>
				          </div>
				        </div>
				      </div>';
      
        }
    }else{
        echo "No records found!";
    }

}

//display industry contents

function displayIndustriesRecords($arrayString){
	
	if (count(explode("$",$arrayString))>=2) {
		$id = explode("$", $arrayString)[0];
		$category = strtolower(explode("$", $arrayString)[1]) ;
		//echo "<script>alert('ID: ".$id." Category: ".$category."')</script>";
		 include 'config.php';
	     $select = $conn->query("SELECT * FROM industry_listings WHERE id ='$id' AND LOWER(category) ='$category' ");
	     if ($select->num_rows>0) {
	        while ($row=$select->fetch_assoc()) {

	    	echo $row['full_content'];
	      
	        }
	    }else{
	        echo "No records found!";
	    }
	}
   

}
if (isset($_POST['arrayString'])) {

	displayIndustriesRecords($_POST['arrayString']);
}


function displayIndustryListings(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM industry_listings ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo '<div class="col-md-4 mb-4 p-1">
                <div class="customer-story-card shadow m-1" data-aos="fade-right">
                    <img style="min-height: 250px; max-height: 250px;" src="images/services/'.$row['listing_image'].'" class="d-block img-fluid" alt="">
                    <div class="p-3">
                        <small id="'.$row['id'].'" class="text-muted">'.$row['category'].'</small>
                        <p>'.substr($row['body'], 0,120) .'...</p>
                           <div class="mb-2 row">
                            <div class="col-md-6 col-sm-12">
                               <img width="auto" height="40" src="'.$row['logo_link'].'">
                          </div>
                           <div class="col-md-6 col-sm-12">
                             <h5><a class="readMoreLink" id="'.$row['id'].'">Read More <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> </a></h5>
                           </div>
                         </div>
                    </div>
                </div>
            </div>';
      
        }
    }else{
        echo "No records found!";
    }

}

function displayPartnersLogo(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM partners_logo ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo '<a href="'.$row['site_url'].'" class="ml-5"><img class="svg-img" src="'.$row['logo_url'].'" alt=""></a>';
      
        }
    }else{
        echo "No records found!";
    }

}

function displayIndustriesCategories($category){
	
	if (count(explode("$",$arrayString))>=2) {
		$id = explode("$", $arrayString)[0];
		$category = strtolower(explode("$", $arrayString)[1]) ;
		//echo "<script>alert('ID: ".$id." Category: ".$category."')</script>";
		
	}
   

}


?>
