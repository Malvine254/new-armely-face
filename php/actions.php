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

function displayBlogFullDetals(){
	require 'config.php';
	$id = mysqli_real_escape_string($conn, $_GET['blogId']);
	$select = $conn->query("SELECT * FROM blogs WHERE blog_id='$id'");
	if ($select->num_rows>0) {
		while ($row=$select->fetch_assoc()) {
			echo '
			<div class="single-main">
				<!-- News Head -->
				<div class="news-head">
					<img style="height: auto; min-height: 400px;" src="'.$row['image_path'].'" alt="#">
				</div>
				<!-- News Title -->
				<h1 class="news-title"><a >'.$row['title'].'</a></h1>
				<!-- Meta -->
				<div class="meta">
					<div class="meta-left">
						<span class="author"><a href="#"><img src="images/blog/profile.svg" alt="#">'.$row['author'].'</a></span>
						<span class="date"><i class="fa fa-clock-o"></i>'.$row['date'].' 2024</span>
					</div>
					<div class="meta-right">
						<span id="toggleSpeech" class="comments"><a ><i class="fa-solid fa-volume-high" id="volume-icons"></i>Read Aloud</a></span>
						<span class="views"><i class="fa fa-eye"></i>33K Views</span>
					</div>
				</div>
				<!-- News Text -->
				<div style="height: 935px; overflow: scroll;" class="news-text scrollable-div"  id="content">
					'.$row['body'].'
				</div><br>

				<div class="blog-bottom">
					<!-- Social Share -->
					<ul class="social-share">
						<li class="facebook"><a class="shareBtn"  data-social="facebook"><i class="fa-brands fa-facebook"></i><span>Facebook</span></a></li>
						<li class="twitter"><a class="shareBtn" data-social="twitter"><i class="fa-brands fa-x-twitter"></i><span>Twitter</span></a></li>
						<li class="google-plus"><a class="shareBtn"  data-social="instagram"><i class="fa-brands fa-instagram"></i><span>Instagram</span></a></li>
						<li class="linkedin"><a class="shareBtn"  data-social="linkedin"><i class="fa-brands fa-linkedin"></i> <span>LinkedIn</span></a> </li>
					</ul>
					<!-- Next Prev -->
					<ul class="prev-next">
						<li id="show-more" class="show-more-button"><button class="btn btn-warning">Scroll to Read all More <i class="icofont-long-arrow-down"></i></button></li>
						
					</ul>
					<!--/ End Next Prev -->
				</div>
			</div>';
		}
		
	}else{
		echo "";
	}
}
function selectblogByDefault(){
	require 'config.php';
	$select = $conn->query("SELECT * FROM blogs ORDER BY id DESC LIMIT 1");
	if ($select->num_rows>0) {
		while ($row=$select->fetch_assoc()) {
			echo '
			<div class="single-main">
				<!-- News Head -->
				<div class="news-head">
					<img style="height: auto; min-height: 400px;" src="'.$row['image_path'].'" alt="#">
				</div>
				<!-- News Title -->
				<h1 class="news-title"><a >'.$row['title'].'</a></h1>
				<!-- Meta -->
				<div class="meta">
					<div class="meta-left">
						<span class="author"><a href="#"><img src="images/blog/profile.svg" alt="#">'.$row['author'].'</a></span>
						<span class="date"><i class="fa fa-clock-o"></i>'.$row['date'].' 2024</span>
					</div>
					<div class="meta-right">
						<span id="toggleSpeech" class="comments"><a ><i class="fa-solid fa-volume-high" id="volume-icons"></i>Read Aloud</a></span>
						<span class="views"><i class="fa fa-eye"></i>33K Views</span>
					</div>
				</div>
				<!-- News Text -->
				<div style="height: 935px; overflow: scroll;" class="news-text scrollable-div"  id="content">
					'.$row['body'].'
				</div><br>

				<div class="blog-bottom">
					<!-- Social Share -->
					<ul class="social-share">
						<li class="facebook"><a class="shareBtn"  data-social="facebook"><i class="fa-brands fa-facebook"></i><span>Facebook</span></a></li>
						<li class="twitter"><a class="shareBtn" data-social="twitter"><i class="fa-brands fa-x-twitter"></i><span>Twitter</span></a></li>
						<li class="google-plus"><a class="shareBtn"  data-social="instagram"><i class="fa-brands fa-instagram"></i><span>Instagram</span></a></li>
						<li class="linkedin"><a class="shareBtn"  data-social="linkedin"><i class="fa-brands fa-linkedin"></i> <span>LinkedIn</span></a> </li>
					</ul>
					<!-- Next Prev -->
					<ul class="prev-next">
						<li id="show-more" class="show-more-button"><button class="btn btn-warning">Scroll to Read all More <i class="icofont-long-arrow-down"></i></button></li>
						
					</ul>
					<!--/ End Next Prev -->
				</div>
			</div>';
		}
		
	}else{
		echo "";
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

function displayRecentBlogsOthers(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM blogs ORDER BY id DESC LIMIT 10");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo '<div class="single-post data-item">
				<div class="image" style="height: auto !important;">
					<img style="height: auto !important;" src="'.$row['image_path'].'" alt="#">
				</div>
				<div class="content">
					<h5><a href="?blogId='.$row['blog_id'].'">'.$row['title'].'</a></h5>
					<ul class="comment">
						<li><i class="fa fa-calendar" aria-hidden="true"></i>'.$row['date'].', 2024</li>
						<li><i class="fa fa-eye" aria-hidden="true"></i>'.$row['clicks'].'</li>
					</ul>
				</div>
			</div>';
      
        }
    }else{
        echo "No records found!";
    }

}

function displayCustomerStoriesTestimonials(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM customer_stories");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo '<div class="col-lg-4 col-md-6 col-12 " >
				<!-- single-schedule -->
				<div class="single-schedule first card p-2" style="min-height: 340px; height: auto;">
					<div class="inner ">
						<div class="icon">
							<i class="fa fa-data"></i>
						</div>
						<div class="single-content p-2">
							<center><img style="width: 70px; height: 70px;" src="images/customer-stories/'.$row['profile'].'" class="img-fluid rounded-circle"></center>
							<div class="text-center">
								<h5 class="mt-2">'.$row['name'].'</h5>
								<strong 	>'.$row['position'].'</strong>
							</div>
							<span class="shorten-content">'.$row['body_content'] .'</span>
							<a id="'.$row['id'].'" class="default-color read-more-btn" href="#"><strong>READ MORE<i class="fa fa-long-arrow-right"></i></strong></a>
						</div>
					</div>
				</div>
				<br>
				</div>';

      
        }
    }else{
        echo "No records found!";
    }

}
function displayCustomerStoriesTestimonialsShort(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM offers ORDER BY id LIMIT 3");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
        	echo '<div class="col-lg-4 col-md-6 col-12" >
				<!-- single-schedule -->
				<div class="single-schedule first " style="min-height: 400px; height: auto;">
					<div class="inner">
						<div class="icon">
							<i class="fa fa-data"></i>
						</div>
						<div class="single-content">
						<img src="images/offers/'.$row['image'].'" class="img-fluid">
							<div class="">
								<h4 >'.$row['title'].'</h4>
							</div>
							<p class="shorten-content">'.$row['body']
							 .'</p>
							<a href=""  class="read-more-btn">READ MORE<i class="fa fa-long-arrow-right"></i></a>
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
        	echo '<div class="col-lg-4 col-md-6 col-12">
					<div class="single-service">
				  <i class="icofont '.$row['icon-font'].'"></i>
				  <h4><a href="service-details.html">'.$row['title'].'</a></h4>
				  <p>'.$row['body'].' </p> 
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
    	if (strlen($text)>=200) {
    		return substr($text, 0,200)."...";
    	}else{
    		return $text;
    	}
    }
     $select = $conn->query("SELECT * FROM services_lists ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
        	echo '<div class="col-lg-4 col-md-12 col-12">
					<div class="single-table">
						<!-- Table Head -->
						<a href="service-details?title='.$row['title'].'">
						<div class="table-head">
							<div class="icon">
								<i class="icofont '.$row['image'].'"></i>
							</div>
							<h4 class="title">'.$row['title'].'</h4>
							<div class="price">
								<p> '.readMoreText($row['body']).'</p>
							</div>	
						</div>
						</a>
					</div>
					</div>';
        	

        }
    }else{
        echo "No records found!";
    }

    

}

function displayCareerListings(){
    include 'config.php';
   
     $select = $conn->query("SELECT * FROM career ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
        	echo '<div class="col-lg-4 col-md-12 col-12">
					<div class="single-table shadow">
						<!-- Table Head -->
						<div class="table-head">
							<a href="job-board?job-details='.$row['job_id'].'"><h4 class="title">'.$row['job_title'].'</h4>
							<div class="price">
								<span> <i class="fa fa-map-marker"></i> Location:  '.$row['job_location'].'</span>
								<div>
									<span> <i class="fa fa-list"></i> Category:  '.$row['job_type'].'</span>

								</div>
								<div>
								<span> <i class="fa fa-clock-o"></i> Deadline:  '.$row['job_deadline'].'</span>
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
				        <div style="min-height: 430px;height: auto;" class="card transparent-card">
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
        	echo '<div class="single-pf card shadow p-2" style="min-height: 360px;">
				<img src="images/case-study/'.$row['listing_image'].'" alt="#">
				<a href="case_docs/'.$row['pdf_url'].'" id="'.$row['id'].'" class="btn" target="_blank">View Details</a>
				<h6 class="text-muted default-color mt-2" ><strong>Industry: '.$row['category'].'</strong></h6>
				<p>'.substr($row['body'], 0,120) .'...</p></div>';
      
        }
    }else{
        echo "No records found!";
    }

}

function displayRecentIndustryListingsAll(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM industry_listings ORDER BY id DESC ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo '<div class="col-md-4 mb-4 p-1">
                <div class="customer-story-card card m-1" style="min-height: 450px; max-height: 700px;">
                    <img  src="images/case-study/'.$row['listing_image'].'" class="d-block img-fluid lazyload" alt="">
                    <div class="p-3">
                       <strong> <p id="'.$row['id'].'" class="text-muted h5">Industry: '.$row['category'].'</p></strong>
                        <p>'.substr($row['body'], 0,120) .'...</p>
                          <div class="mt-1">
                             <strong><a class="default-color h6" target="_blank" href="case_docs/'.$row['pdf_url'].'" id="'.$row['id'].'">Read More <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> </a></strong>
                           </div>
                    </div>
                </div>
            </div>';
      
        }
    }else{
       echo "<span class='text-center col-md-12 text-danger p-5'>No records found!</span>";
    }

}

function displayWhitePaperListings(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM white_paper ORDER BY id DESC ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {

        	echo '<div class="col-md-4 mb-4 p-1">
                <div class="customer-story-card card m-1" style="min-height: 450px; max-height: 450px;">
                    <img  src="images/white-papers/'.$row['images'].'" class="d-block img-fluid lazyload" alt="">
                    <div class="p-3">
                    	 <strong> <p class="text-muted h5"> '.$row['title'].'</p></strong>
                        <p>'.substr($row['body'], 0,120) .'...</p>
                          <div class="mt-1">
                             <strong><a class="default-color h6" target="_blank" href="white_paper_docs/'.$row['pdf'].'" id="'.$row['id'].'">Read More <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> </a></strong>
                           </div>
                    </div>
                </div>
            </div>';
      
        }
    }else{
        echo "<span class='text-center col-md-12 text-danger p-5'>No records found!</span>";
    }

}

function displayPartnersLogo(){
    include 'config.php';
     $select = $conn->query("SELECT * FROM partners_logo ");
     if ($select->num_rows>0) {
        while ($row=$select->fetch_assoc()) {
        	// echo '<div class="single-clients">
			// 		<a href="'.$row['site_url'].'"><img src="'.$row['logo_url'].'" alt="#">
			// 		</div>';

		echo '<div  class="m-4"><a href="'.$row['site_url'].'"><img src="'.$row['logo_url'].'" alt="#"></div>';			

        	
      
        }
    }else{
        echo "No records found!";
    }

}

#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Beginning of submit consultation form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['organization'])&& isset($_POST['phone']) && isset($_POST['message']) && isset($_POST['service_type'])) {
   echo submitConsultationForm();
}
function submitConsultationForm(){
include 'config.php';
function dateFormatTwo(){
// Your date
$date =  date('y-m-d');
// Convert the date to a timestamp
$timestamp = strtotime($date);
// Format the date
$formattedDate = date("j M Y", $timestamp);
return $formattedDate;
}
$date_now = dateFormatTwo();
// Sanitize and validate user input
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
$organization = isset($_POST['organization']) ? htmlspecialchars($_POST['organization']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
$service_type  = isset($_POST['service_type']) ? htmlspecialchars($_POST['service_type']) : '';

// Validate phone number format
if ($phone && !preg_match('/(\d{1})(\d{3})(\d{3})(\d{4})/', $phone)) {
    // Invalid phone number format
    return "Invalid phone format, use this format +19724600643";
} else {
    // Check if required fields are not empty
    if ($name && $email && $organization && $phone && $message && $service_type) {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO consultation (name, email, organization, phone, message,service_type,date_now) VALUES (?, ?, ?, ?, ?,?,?)");
        $stmt->bind_param("sssssss", $name, $email, $organization, $phone, $message,$service_type,$date_now);

        // Execute the statement
        if ($stmt->execute()) {
            return 1;
        } else {
            // Log the error securely
            error_log('Failed to insert contact form data into the database');

            // Display a generic error message
            return "Failed to submit the form. Please try again later";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Display an error message if required fields are not provided
        return "Please fill in all the required fields";
    }
}
}
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#End of submit consultation form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''


#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Beginning of submit contact form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

function submitContactUsForm(){
include 'config.php';
function dateFormat(){
// Your date
$date =  date('y-m-d');
// Convert the date to a timestamp
$timestamp = strtotime($date);
// Format the date
$formattedDate = date("j M Y", $timestamp);
return $formattedDate;
}
$date_now = dateFormat();
// Sanitize and validate user input
$name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : '';
$organization = isset($_POST['organization']) ? htmlspecialchars(trim($_POST['organization'])) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
$message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

// Validate phone number format
if ($phone && !preg_match('/^\+?\d{1,4}?[\d\s]{3,}$/', $phone)) {
    // Invalid phone number format
    echo "Invalid phone format, use this format +19724600643";
    exit;
}

// Check if required fields are not empty and valid
if (!empty($name) && !empty($email) && !empty($organization) && !empty($phone) && !empty($message)) {
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, organization, phone, message,sent_date) VALUES (?, ?, ?, ?, ?,?)");
    if ($stmt) {
        $stmt->bind_param("ssssss", $name, $email, $organization, $phone, $message, $date_now);

        // Execute the statement
        if ($stmt->execute()) {
            return 1;
        } else {
            // Log the error securely
            error_log('Failed to insert contact form data into the database: ' . $stmt->error);

            // Display a generic error message
            return "Failed to submit the form. Please try again later";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Log the error securely
        error_log('Failed to prepare SQL statement: ' . $conn->error);

        // Display a generic error message
        return "Failed to submit the form. Please try again later";
    }
} else {
    // Display an error message if required fields are not provided
    return "Please fill in all the required fields";
}
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['organization'])&& isset($_POST['phone']) && isset($_POST['message'])) {
   echo submitContactUsForm();
}
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#End of submit contact form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Start of job description display
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
function displayJobDescriptions(){
if (isset($_GET['job-details'])) {
  require 'config.php';
  $numbering = 1;
  $id = mysqli_real_escape_string($conn,$_GET['job-details']);
  $select = $conn->query("SELECT * FROM career WHERE job_id='$id'");
  if ($select->num_rows>0) {
    while ($row=$select->fetch_assoc()) {
      $job_type = $row['job_type'];
       $job_title = $row['job_title'];
      echo "
        <div class='section-title mt-5'><h3><span class='default-color'>".$row['job_title']." , </span>".$row['job_location']."<center><hr class='default-background hr' ></center></h3>
        	
        </div>
        ".$row['job_description']."
         <div class='m-5'>
            <a href='applications?job-details=".$row['job_id']."&application=true&title=".$job_title."' class='btn btn-primary col-lg-2 col-sm-6 ml-5'>Apply Now</a>
       </div>
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
}

#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#End of job description display
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Start of display services details 
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
function displayServicesDetails(){
	include 'config.php';
		$title = mysqli_real_escape_string($conn, $_GET['title']);
		$select = $conn->query("SELECT * FROM services_lists WHERE title='$title'");
		while ($row=$select->fetch_assoc()) {
			echo "<h2 class='mb-3 default-color'>".$title."</h2>";
			echo $row['intro_content'];
			echo $row['other_contents'];
		}


}

#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Start of submit job app form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
function submitJobAppForm(){
	if($_FILES["cv"]["error"] == UPLOAD_ERR_OK) {
    include 'config.php';
    // Sanitize and validate user input
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email =  isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
    $final_email = strtolower($email);
    $city = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $state = isset($_POST['state']) ? htmlspecialchars($_POST['state']) : '';
    $zip = isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : '';
    $role = isset($_POST['role']) ? htmlspecialchars($_POST['role']) : '';
    $final_role = strtolower($role);
    $position = isset($_POST['position']) ? htmlspecialchars($_POST['position']) : '';
    $cv = isset($_FILES['cv']['name']) ? htmlspecialchars($_FILES['cv']['name'] ) : '';
    $application_date = date("d-m-y h:i:sa");
    $random_name = rand(100000,3000000);
    $new_file_name = $random_name.".pdf";
    $target = "../pdf/".$random_name.".pdf"; 
    $check_if_applied = $conn->query("SELECT * FROM job_applications WHERE LOWER(email)='$final_email' AND LOWER(role)='$final_role' ORDER BY id DESC");
    // while ($row=$check_if_applied->fetch_assoc()) {
    // 	$job_title = $row['job_title'];
    // }
    if ($check_if_applied->num_rows>0) {
            echo "You have already made an application";
        }else{
            if (move_uploaded_file($_FILES['cv']['tmp_name'], $target)) {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO job_applications (name, email, city, phone, address,state,zip,role,position,cv,application_date) VALUES (?, ?, ?, ?, ?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssss", $name, $email, $city, $phone, $address, $state,$zip,$role,$position,$new_file_name,$application_date);

            // Execute the statement
            if ($stmt->execute()) {
             echo 1;
            } else {
                // Log the error securely
                error_log('Failed to insert contact form data into the database');

                // Display a generic error message
                echo "Failed to submit the form. Please try again later";
            }

            // Close the statement
            $stmt->close();

    } else{
        echo "Failed to upload pdf, try again";
    }
        }    
    

}

}

if ( isset($_POST['zip']) && isset($_POST['state']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['name'])) {
	submitJobAppForm();
}

//actions
function listCountries(){
	$apiUrl = 'https://restcountries.com/v3.1/all';
	$response = file_get_contents($apiUrl);
	$countries = json_decode($response, true);

	foreach ($countries as $country) {
	    echo "<option>".$country['name']['common']."</option>";
	}
}


// add conts to blog clicks

if (isset($_GET['blogId'])) {
    include 'config.php';
    $id = mysqli_real_escape_string($conn, $_GET['blogId']);
    
    // Default expiration time for the cookie (30 days)
    $expiration_days = 30;

    // Initialize clicks array
    $clicks = [];

    // Check if the 'clicks' cookie exists
    if (isset($_COOKIE['clicks'])) {
        $cookie_data = $_COOKIE['clicks'];

        // Decode the cookie value (it should be a JSON array)
        $clicks = json_decode($cookie_data, true);
        // print_r($clicks);

        // If the cookie data isn't an array, reset it to an empty array
        if (!is_array($clicks)) {
            $clicks = [];
        }
    }

    // Fetch the blog data from the database
    $select = $conn->query("SELECT * FROM blogs WHERE blog_id='$id'");
    if ($select->num_rows > 0) {
        $row = $select->fetch_assoc();
        $row_count = $row['clicks'] + 1;

        // Check if the current blogId exists in the cookie array
        if (isset($clicks[$id])) {
            // If the blogId exists in the cookie, do not update the database
            //echo "This blog post has already been clicked by this user!";
        } else {
            // If the blogId does not exist in the cookie, update the database
            $update = $conn->query("UPDATE blogs SET clicks='$row_count' WHERE blog_id='$id'");

            // Add this blogId to the clicks array to mark it as clicked
            $clicks[$id] = $id;

            // Encode the updated array back to JSON and set it in the cookie
            setcookie('clicks', json_encode($clicks), time() + ($expiration_days * 24 * 60 * 60), "/");

            //echo "Click registered for blog post ID: $id!";
        }
    }
}




?>
