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
		<div  style='display: none;' class='row align-items-center blog-article'>
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
			echo '<div class="col-lg-4 col-md-6 col-12" data-aos="fade-in">
			<div class="single-news" style="min-height: 430px;">
					<div class="news-head">
						<img src="'.$row['image_path'].'" alt="#">
					</div>
					<div class="news-body">
						<div class="news-content">
							<div class="date">'.$row['date'].', 2024.</div>
							<h6 class="text-muted">'.$row['author'].' |<span>'.estimateReadingTime($row['body']).' min read</span></h6>
							<h2><a href="blog?blogId='.$row['blog_id'].'">'.$row['title'].'</a></h2>
							<a class="default-color" href="blog?blogId='.$row['blog_id'].'">READ MORE<i class="fa fa-long-arrow-right "></i></a>
						</div>
					</div>
				</div></div>';
		
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
        <div data-aos="fade-right" class="card border-dark transparent-card" style="min-height: 300px !important;">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="images/customer-stories/'.$row['profile'].'"
                class="rounded-circle shadow-1-strong lazyload" width="150" height="150" />
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
function displayCustomerStoriesTestimonialsShort(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM customer_stories LIMIT 3");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
        	echo '<div class="col-lg-4 col-md-6 col-12" >
				<!-- single-schedule -->
				<div class="single-schedule first " style="min-height: 380px; max-height: 380px;">
					<div class="inner">
						<div class="icon">
							<i class="fa fa-data"></i>
						</div>
						<div class="single-content">
							<center><img style="width: 70px; height: 70px;" src="images/customer-stories/'.$row['profile'].'" class="img-fluid rounded-circle"></center>
							<div class="text-center">
								<h4 >'.$row['name'].'</h4><br>
								<strong class="text-light">'.$row['position'].'</strong>
							</div>
							<p>'.substr($row['body_content'],0,150) .'</p>
							<a href="#">READ MORE<i class="fa fa-long-arrow-right"></i></a>
						</div>
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

        	echo '<div class="col-md-4 column card-item">
            <div class=" p-4" style="min-height: 320px !important;">
                <img width="100" height="100" src="images/company/'.$row['icon'].' " alt="" class="img-fluid rounded-circle  lazyload bg-light p-1 mt-2 mb-1 p-2">
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
    function readMoreText($text){
    	if (strlen($text)>=50) {
    		return substr($text, 0,100)."...";
    	}else{
    		return $text;
    	}
    }
     $select = $conn->query("SELECT * FROM services_lists ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo ' <div class="col-md-4 mb-4 card-item">
				        <div style="min-height: 450px;height: auto;" class="card transparent-card">
				          <div class="card-body py-4 mt-1">
				            <div class="d-flex justify-content-start mb-4">
				              <img src="images/services/'.$row['image'].'"
				                class=" shadow-1-strong lazyload" width="100%" height="240"/>
				            </div>
				            <h5 class="font-weight-bold my-3">'.$row['title'].'</h5>
				            <p class="mb-2">
				              <i class="fas fa-quote-left pe-2"></i>'.readMoreText($row['body']).' <a href="service_details?service_name='.$row['title'].'">Learn More</a>
				            </p>
				          </div>
				        </div>
				      </div>';
      
        }
    }else{
        echo "No records found!";
    }

    

}

function displayMoreServicesList(){
    include 'config.php';
    function readMoreText($text){
    	if (strlen($text)>=50) {
    		return substr($text, 0,100)."...";
    	}else{
    		return $text;
    	}
    }
     $select = $conn->query("SELECT * FROM services_lists ORDER BY id DESC LIMIT 3");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo ' <div class="col-md-4 mb-4 card-item">
				        <div style="min-height: 450px;height: auto;" class="card transparent-card">
				          <div class="card-body py-4 mt-1">
				            <div class="d-flex justify-content-start mb-4">
				              <img src="images/services/'.$row['image'].'"
				                class=" shadow-1-strong lazyload" width="100%" height="240"/>
				            </div>
				            <h5 class="font-weight-bold my-3">'.$row['title'].'</h5>
				            <p class="mb-2">
				              <i class="fas fa-quote-left pe-2"></i>'.readMoreText($row['body']).' <a href="service_details?service_name='.$row['title'].'">Learn More</a>
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
	
	if (count(explode(",",$arrayString))>=2) {
		$id = explode(",", $arrayString)[0];
		$category = strtolower(explode(",", $arrayString)[1]) ;
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
                    <img style="min-height: 300px;" src="images/case-study/'.$row['listing_image'].'" class="d-block img-fluid lazyload" alt="">
                    <div class="p-3">
                       <strong> <p id="'.$row['id'].'" class="text-muted">Industry: '.$row['category'].'</p></strong>
                        <p>'.substr($row['body'], 0,120) .'...</p>
                          <div class="col">
                             <h6><a target="_blank" href="case_docs/'.$row['pdf_url'].'" id="'.$row['id'].'">Read More <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> </a></h6>
                           </div>
                    </div>
                </div>
            </div>';
      
        }
    }else{
        echo "No records found!";
    }

    // function placeholderImages($count){
	// 	// Check if the count is divisible by 3
	// 	if ($count % 3 != 0) {
	// 	    // Calculate the number of records to add
	// 	    $remainder = $count % 3;
	// 	    $recordsToAdd = 3 - $remainder;

	// 	   for ($i = 0; $i < $recordsToAdd; $i++) {
	// 	   	return '';
           
    // }
	// 	} else {
	// 	    echo "The count is already divisible by 3.";
	// 	}


    // }

}

function displayIndustryListingsSlider(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM industry_listings  ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo '   <div class="carousel-item active">
         <img src="https://images.pexels.com/photos/3025005/pexels-photo-3025005.jpeg" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100 bg-danger lazyload" width="800" height="500" alt="First slide">
         <img src="https://images.pexels.com/photos/1642770/pexels-photo-1642770.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100 bg-danger" width="800" height="500" alt="First slide">

          <div class="carousel-caption d-none d-md-block">
            <button class="btn btn-warning">Read Full Report</button>
            <h5>Industry: Health</h5>
            <p>Automating data sharing with Health Agencies, Insurance Companies, Pharmaceuticals and Other Providers significantly improves Swope health efficiency and accuracy allowing for better care coordination, faster diagnoses, and more personalized treatment plans.</p>
          </div>
        </div>';
      
        }
    }else{
        echo "No records found!";
    }

}

function displayRecentIndustryListings(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM industry_listings ORDER BY id DESC ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
        	echo '<div class="single-pf card shadow p-2" style="min-height: 400px;">
				<img src="images/case-study/'.$row['listing_image'].'" alt="#">
				<a href="case_docs/'.$row['pdf_url'].'" id="'.$row['id'].'" class="btn" target="_blank">View Details</a>
				<h5 class="text-muted default-color" ><strong>Industry: '.$row['category'].'</strong></h5>
				<p>'.substr($row['body'], 0,120) .'...</p></div>';
      
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

        	echo '<a href="'.$row['site_url'].'" class="ml-5"><img class="svg-img lazyload" src="'.$row['logo_url'].'"  alt="" ></a>';
      
        }
    }else{
        echo "No records found!";
    }

}


?>
