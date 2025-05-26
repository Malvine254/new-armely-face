<?php
$autoloadPath = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath)) {
    require $autoloadPath;
} else {
    // Optional: log the issue or display a warning (non-fatal)
    error_log("⚠️ Skipped loading autoload.php – file not found at: $autoloadPath");
    // You can optionally define fallbacks or continue silently
}

// Load config only if needed and available
$configPath = __DIR__ . '/config.php';
if (file_exists($configPath)) {
    require $configPath;
} else {
    error_log("⚠️ config.php not found at: $configPath");
}

use Dotenv\Dotenv;
use GuzzleHttp\Client;

// Optional: handle undefined classes if autoload is skipped
if (!class_exists('Dotenv\Dotenv')) {
    // Define dummy behavior, show a notice, or handle gracefully
    error_log("⚠️ Dotenv class not found. Functionality may be limited.");
}



function scheduleConsultant() {
    global $conn;

    // Use filter_input() to sanitize and trim user inputs
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $organization = trim(filter_input(INPUT_POST, 'organization', FILTER_SANITIZE_STRING));
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));
    $service_name = trim(filter_input(INPUT_POST, 'service_name', FILTER_SANITIZE_STRING));

    // Validate critical fields (name, email, and service name are required)
    if (empty($name) || empty($email) || empty($service_name)) {
        echo "<script>alert('Please fill in all required fields.')</script>";
        return;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.')</script>";
        return;
    }

    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO consultation (name, email, organization, phone, message, service_name) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $organization, $phone, $message, $service_name);

    // Execute the statement and handle success or failure
    if ($stmt->execute()) {
        echo "<script>alert('Message was sent successfully.')</script>";
    } else {
        // Log the error for debugging without exposing it to users
        error_log("Database Error: " . $stmt->error);
        echo "<script>alert('Failed to send the message. Please try again.')</script>";
    }

    // Close the prepared statement
    $stmt->close();
}


if (isset($_POST['submit_form'])) {
	submitContactForm();
}
if (isset($_POST['consultation_btn'])) {
	scheduleConsultant();
}

// if (isset($_POST['submit_form'])) {
// 	submitContactForm();
// }




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
	$select = $conn->query("SELECT blog_id,title,author,`date`,body FROM blogs $condition");
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
			<div class="single-news" style="min-height: 430px; max-height: 430px;">
					<div class="news-head">
						<img class="lazy-img " style="min-height: 200px; max-height: 200px;" src="'.$row['image_path'].'" alt="#">
					</div>
					<div class="news-body">
						<div class="news-content">
							<div class="date">'.$row['date'].'.</div>
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
			<div class=" single-main ">
				<!-- News Head -->
				<div class="news-head ">
					<img  style="height: auto; " src="'.$row['image_path'].'" alt="#">
				</div>
				<!-- News Title -->
				<h1 class="news-title"><a >'.$row['title'].'</a></h1>
				<!-- Meta -->
				<div class="meta">
					<div class="meta-left">
						<span class="author"><a href="#"><img  src="images/blog/profile.svg" alt="#">'.$row['author'].'</a></span>
						<span class="date"><i class="fa fa-clock-o"></i>'.$row['date'].' </span>
					</div>
					<div class="meta-right">
						<span id="toggleSpeech" class="comments"><a ><i class="fa-solid fa-volume-high" id="volume-icons"></i>Read Aloud</a></span>
						<span class="views"><i class="fa fa-eye"></i>'.$row['clicks'].' Views</span>
					</div>
				</div>
				<!-- News Text -->
				<div style="height: 120vh; overflow-y: scroll;" class="news-text scrollable-div"  id="blog-content">
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
			<div class="single-main main-article">
				<!-- News Head -->
				<div class="news-head">
					<img  style="height: auto;" src="'.$row['image_path'].'" alt="#">
				</div>
				<!-- News Title -->
				<h1 class="news-title"><a >'.$row['title'].'</a></h1>
				<!-- Meta -->
				<div class="meta">
					<div class="meta-left">
						<span class="author"><a href="#"><img  src="images/blog/profile.svg" alt="#">'.$row['author'].'</a></span>
						<span class="date"><i class="fa fa-clock-o"></i>'.$row['date'].'</span>
					</div>
					<div class="meta-right">
						<span id="toggleSpeech" class="comments"><a ><i class="fa-solid fa-volume-high" id="volume-icons"></i>Read Aloud</a></span>
						<span class="views"><i class="fa fa-eye"></i>'.$row['clicks'].' Views</span>
					</div>
				</div>
				<!-- News Text -->
				<div style="height: 120vh; overflow-y: scroll;" class="news-text scrollable-div"  id="content">
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
						<li id="show-more" class="show-more-button"><button class="btn btn-warning">Scroll to Read More <i class="icofont-long-arrow-down"></i></button></li>
						
					</ul>
					<!--/ End Next Prev -->
				</div>
			</div>';
		}
		
	}else{
		echo "";
	}
}

function readMore() {
    require 'config.php';

    try {
        // Use a prepared statement to query the number of rows
        $stmt = $conn->prepare("SELECT COUNT(*) as job_count FROM career");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        // Check if the number of rows is greater than 4
        if ($row['job_count'] > 4) {
            echo "
            <div class='mt-3 row justify-content-center'>
                <button type='button' id='see_all_btn' class='btn btn-outline-primary'>Browse all Jobs</button>
                <button style='display: none;' type='button' id='see_less_btn' class='btn btn-outline-primary'>Browse Less Jobs</button>
            </div>";
        }

        // Close the statement and connection
      
    } catch (Exception $e) {
        // Log the error and avoid displaying sensitive information to the user
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to retrieve job data at this time. Please try again later.</p>";
    }
}


function displayRecentBlogsOthers() {
    include 'config.php';

    try {
        // Use a prepared statement to fetch the recent 14 blogs, selecting only the needed columns
        $stmt = $conn->prepare("SELECT blog_id, title, image_path, date, clicks FROM blogs ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $blog_id = htmlspecialchars($row['blog_id']);
                $title = htmlspecialchars($row['title']);
                $image_path = htmlspecialchars($row['image_path']);
                $date = htmlspecialchars($row['date']);
                $clicks = htmlspecialchars($row['clicks']);

                // Display the blog post
                echo '<div class="single-post data-item sidebar-article" >
                    <div class="image" style="height: auto !important;">
                        <img  style="height: auto !important;" src="' . $image_path . '" alt="Blog Image">
                    </div>
                    <div class="content">
                        <h5><a href="?blogId=' . $blog_id . '">' . $title . '</a></h5>
                        <ul class="comment">
                            <li><i class="fa fa-calendar" aria-hidden="true"></i>' . $date . '</li>
                            <li><i class="fa fa-eye" aria-hidden="true"></i>' . $clicks . ' Views</li>
                        </ul>
                    </div>
                </div>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
      
    } catch (Exception $e) {
        // Log the error for debugging without exposing it to users
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to retrieve blogs at this time. Please try again later.</p>";
    }
}


function displayCustomerStoriesTestimonials() {
    include 'config.php';

    try {
        // Use a prepared statement to fetch customer stories (best practice)
        $stmt = $conn->prepare("SELECT id, name, position, body_content, profile FROM customer_stories ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $id = htmlspecialchars($row['id']);
                $name = htmlspecialchars($row['name']);
                $position = htmlspecialchars($row['position']);
                $body_content = $row['body_content'];
                $profile = htmlspecialchars($row['profile']);

                // Check if the profile image exists, use a default if not
                $profile_path = "images/customer-stories/" . $profile;
                if (!file_exists($profile_path) || empty($profile)) {
                    $profile_path = "images/default-profile.png";  // Default image
                }

                // Output the customer story securely
                echo '<div class="col-lg-4 col-md-6 col-12">
                    <div class="single-schedule first card p-2 card-shadow" style="min-height: 300px; max-height: auto;">
                        <div class="inner">
                            <div class="icon">
                                <i class="fa fa-data"></i>
                            </div>
                            <div class="single-content p-2">
                                    <img style="width: 70px; height: 70px;" src="' . $profile_path . '" 
                                    class="img-fluid rounded-circle lazy-img alt="Profile Image">
                                <div class="">
                                    <h5 class="mt-2 default-color h6">' . $name . '</h5>
                                    <strong>' . $position . '</strong>
                                </div>
                                <span class="shorten-content">' . $body_content . '</span>
                                <a id="' . $id . '" class="default-color read-more-btn" href="#">
                                    <strong>READ MORE <i class="fa fa-long-arrow-right"></i></strong>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
       
    } catch (Exception $e) {
        // Log the error securely without exposing details to the user
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load customer stories at this time. Please try again later.</p>";
    }
}

function displayCustomerStoriesTestimonialsShort() {
    include 'config.php';

    try {
        // Use a prepared statement for fetching offers
        $stmt = $conn->prepare("SELECT id, title, body, image FROM offers ORDER BY id LIMIT 3");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $id = htmlspecialchars($row['id']);
                $title = htmlspecialchars($row['title']);
                $body = htmlspecialchars($row['body']);
                $image = htmlspecialchars($row['image']);

                // Check if the image exists, use a default if not
                $image_path = "images/offers/" . $image;
                if (!file_exists($image_path) || empty($image)) {
                    $image_path = "images/default-offer.png";  // Default image path
                }

                // Output the offer securely
                echo '<div class="col-lg-4 col-md-6 col-12">
                    <div class="single-schedule first" style="min-height: 480px; height: auto;">
                        <div class="inner">
                            <div class="icon">
                                <i class="fa fa-data"></i>
                            </div>
                            <div class="single-content">
                                <img src="' . $image_path . '" class="img-fluid lazy-img" alt="Offer Image">
                                <div class="">
                                    <h4>' . $title . '</h4>
                                </div>
                                <p class="shorten-content">' .substr($body, 0,400)  . '</p>
                                <a href="#" class="read-more-btn">READ MORE <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
       
    } catch (Exception $e) {
        // Log the error for debugging without exposing it to the user
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load offers at this time. Please try again later.</p>";
    }
}


function displayCoreValues() {
    include 'config.php';

    try {
        // Use prepared statement for consistent secure querying
        $stmt = $conn->prepare("SELECT `icon-font`, title, body FROM core_values");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize the data to prevent XSS
                $icon_font = htmlspecialchars($row['icon-font']);
                $title = htmlspecialchars($row['title']);
                $body = htmlspecialchars($row['body']);

                // Output the core value item securely
                echo '<div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service">
                        <i class="icofont ' . $icon_font . '"></i>
                        <h4><a href="service-details">' . $title . '</a></h4>
                        <p>' . $body . '</p>
                    </div>
                </div>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
       
    } catch (Exception $e) {
        // Log the error and display a user-friendly message
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load core values at this time. Please try again later.</p>";
    }
}


function displayEvents() {
    include 'config.php';
    function formatDateWithSuffix($start_date) {
    // Convert the string date (d/m/Y) to a DateTime object
    $dateTime = DateTime::createFromFormat('d/m/Y', $start_date);
    if ($dateTime === false) {
        // If the format doesn't match or the date is invalid, return false
        return false;
    }

    // Get the day, month, and year components
    $day = $dateTime->format('j'); // Day without leading zeros
    $month = $dateTime->format('M'); // Short month name (e.g., Jan, Feb)
    $year = $dateTime->format('Y'); // Full year (e.g., 2024)

    // Determine the appropriate suffix for the day
    if (!in_array(($day % 100), [11, 12, 13])) {
        switch ($day % 10) {
            case 1: $suffix = 'st'; break;
            case 2: $suffix = 'nd'; break;
            case 3: $suffix = 'rd'; break;
            default: $suffix = 'th'; break;
        }
    } else {
        $suffix = 'th'; // Default suffix is 'th'
    }

    // Return the formatted date string
    return  $month.  ' ' . $day . $suffix . '  ' . $year;
}

// Example usage:
$start_date = "23/01/2024"; // Example date in d/m/Y format
$formattedDate = formatDateWithSuffix($start_date);
if ($formattedDate !== false) {
    // echo "Formatted date: " . $formattedDate; // Output: 23rd Jan 2024
} else {
    // echo "Invalid date format!";
}

    function trimText($text){
        if (strlen($text) <= 200) {
            return $text;
        } else {
            return substr($text, 0, 150) . "...";
        }
    }

    function parseDate($dateString) {
        // Create a DateTime object from the d/m/Y format
        $dateTime = DateTime::createFromFormat('d/m/Y', $dateString);
        // Return the timestamp for comparison
        return $dateTime ? $dateTime->getTimestamp() : false;
    }

    try {
        // Use prepared statement for consistent secure querying
        $stmt = $conn->prepare("SELECT start_date, title, body,url,recorded_url FROM events ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

        	function CutText($text, $characters) {
			    $count = 0;
			    $result = '';

			    for ($i = 0; $i < strlen($text); $i++) {
			        $char = $text[$i];

			        // Check if alphanumeric
			        if (ctype_alnum($char)) {
			            $count++;
			        }

			        $result .= $char;

			        // Stop once we reach the limit of alphanumeric characters
			        if ($count >= $characters) {
			            break;
			        }
			    }

			    // If there's more content beyond the limit, append ...
			    if ($count >= $characters && $i < strlen($text) - 1) {
			        return $result . "...";
			    }

			    return $text;
			}

            while ($row = $result->fetch_assoc()) {
                // Sanitize the data to prevent XSS
                $title = htmlspecialchars($row['title']);
                $body = htmlspecialchars(trimText($row['body']));
                $start_date = trim($row['start_date']); // Trim any extra spaces

                // Convert the start date from d/m/Y format to a timestamp
                $eventTimestamp = parseDate($start_date);
                $currentTimestamp = time();
                $background2 = "";

                // If the date format is invalid, skip the event
                if ($eventTimestamp === false) {
                    continue;
                }

                // Determine if the registration button should be disabled
                if ($eventTimestamp > $currentTimestamp) {
                    $buttonText = "Register";
                    $buttonDisabled = "href='".$row['url']."'";
                    $background = "btn btn-danger ";
                } elseif($row['recorded_url']===null){
                	$buttonText = "No Recording Link";
                    $buttonDisabled = "";
                    $background = "btn btn-warning ";
                    $background2 = 'style="background: orange !important;"';
                }else {
                    $buttonText = "View Recording";
                    $buttonDisabled = "target='_blank' href='".$row['recorded_url']."'";
                    $background = "btn btn-danger ";
                    $background2 = 'style="background: red !important;"';

                }
               
               

                // Output the core value item securely
               // Inside the while loop
                // Inside the while loop
				echo '<div class="col-lg-4 col-md-6 col-12">
				    <div class="single-service card card-shadow" style="height: 350px;">
				        <div class="p-2" style="min-height: 470px;">
				        <div style="height: 230px;">
					        <p class="default-background p-2 text-light h1" id="countdown-' . $eventTimestamp . '">Loading countdown...</p>
					        <i class="icofont-calendar m-2"></i>
					        <strong class="default-color">' . formatDateWithSuffix($start_date) . '</strong>
					        <p><a ><b>' . CutText($title,20). '</b></a></p>
					        <p>' . CutText($body, 130) . '...</p>
					    </div>    
				        
				        <a target="blank" ' . $background2 . ' ' . $buttonDisabled . ' class=" mt-4 ' . $background . ' p-2 text-light d col-10">' . $buttonText . '</a>
				        </div>
				    </div>
				</div>';



            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log the error and display a user-friendly message
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load core values at this time. Please try again later.</p>";
    }
}



function displayServicesList() {
    include 'config.php';

    // Helper function to limit text length
    function readMoreText2($text) {
        $text = htmlspecialchars($text); // Prevent XSS attacks
        return (strlen($text) >= 100) ? substr($text, 0, 150) . "..." : $text;
    }

    try {
        // Use a prepared statement to fetch the data
        $stmt = $conn->prepare("SELECT title, image, body FROM services_lists");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $title = htmlspecialchars($row['title']);
                $icon = htmlspecialchars($row['image']);
                $body = readMoreText2($row['body']);

                // Output the service securely
                echo '<div class="col-lg-4 col-md-12 col-12" >
                    <div class="single-table card-shadow" style="max-height: 350px; min-height: 340px;">
                        <a href="service-details?title=' . urlencode($title) . '">
                            <div class="table-head">
                                <div class="icon">
                                    <i class="icofont ' . $icon . '"></i>
                                </div>
                                <h4 class="title">' . $title . '</h4>
                                <div class="price">
                                    <p>' . $body . '</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log the error without exposing details to the user
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load services at this time. Please try again later.</p>";
    }
}


function displayCareerListings() {
    include 'config.php';

    function isDeadlinePassed($deadline) {
    // Convert deadline string to a DateTime object
    $deadlineDate = DateTime::createFromFormat('M d, Y', $deadline);
    
    if (!$deadlineDate) {
        return "Invalid Date"; // Return an error message if the date format is incorrect
    }

    // Get today's date (without time) for accurate comparison
    $currentDate = new DateTime(); 
    $currentDate->setTime(0, 0); // Remove time for accurate date-only comparison

    // Compare deadline with today's date
    return ($deadlineDate < $currentDate) ? "Closed" : "Open";
}
function changeStatusColor($status){
	if ($status==="Open") {
		return '<span class="text-primary"><i class="fa fa-circle text-primary"></i> ' . $status . '</span>';
	}else{
		return '<span class="text-danger"><i class="fa fa-info-circle text-danger"></i>  ' . $status . '</span>';
	}

}
function disableUrl($status,$unicord){
	if ($status==="Open") {
		return ' href="job-board?job-details=' . $unicord . '"';
	}else{
		return '';
	}
}

    try {
        // Use prepared statement for secure querying
        $stmt = $conn->prepare("SELECT job_id, job_title, job_location, job_type, job_deadline FROM career ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $job_id = htmlspecialchars($row['job_id']);
                $job_title = htmlspecialchars($row['job_title']);
                $job_location = htmlspecialchars($row['job_location']);
                $job_type = htmlspecialchars($row['job_type']);
                $job_deadline = htmlspecialchars($row['job_deadline']);

                // Output the job listing securely
                echo '<div class="col-lg-3 col-md-12 col-12">
        <div class="single-table card-shadow text-center">
            <div class="table-head">
                <a '.disableUrl(isDeadlinePassed($job_deadline),urlencode($job_id)).'>
                    <h4 class="title">' . $job_title . '</h4>
                    <div class="price d-flex justify-content-center align-items-center gap-2 flex-wrap">
                        <span><i class="fa fa-map-marker"></i> ' . $job_location . '</span><br>
                        <span><i class="fa fa-list"></i> ' . $job_type . '</span><br>
                        <span><i class="fa fa-clock-o"></i> ' . $job_deadline . '</span><br>
                        '.changeStatusColor(isDeadlinePassed($job_deadline)).'
                    </div>
                </a>
            </div>
        </div>
    </div><style>.single-table {
    text-align: center; /* Center all text */
}

.price {
    display: flex;
    align-items: center;  /* Align items in the center */
    justify-content: center;  /* Center horizontally */
    flex-wrap: wrap; /* Prevents breaking into multiple lines */
    gap: 10px; /* Adds spacing between items */
}

.price span {
    white-space: nowrap; /* Ensures all text remains on one line */
    display: flex;
    align-items: center; /* Align icon and text */
    gap: 5px; /* Small space between icon and text */
}

.price i {
    font-size: 14px; /* Adjust icon size */
    color: #555; /* Adjust icon color */
}
</style>';

            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
       
    } catch (Exception $e) {
        // Log the error for debugging without exposing it to the user
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load career listings at this time. Please try again later.</p>";
    }
}


function displayMoreServicesList() {
    include 'config.php';

    // Helper function to truncate text safely
    function readMoreText($text) {
        $text = htmlspecialchars($text); // Prevent XSS attacks
        return (strlen($text) >= 100) ? substr($text, 0, 97) . "..." : $text;
    }

    try {
        // Use prepared statement to fetch the data securely
        $stmt = $conn->prepare("SELECT id, title, body, image FROM services_lists ORDER BY id DESC LIMIT 3");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $title = htmlspecialchars($row['title']);
                $body = readMoreText($row['body']);
                $image = htmlspecialchars($row['image']);

                // Validate image path or assign a default image
                $image_path = "images/services/" . $image;
                if (!file_exists($image_path) || empty($image)) {
                    $image_path = "images/default-service.png";  // Default image
                }

                // Output the service securely
                echo '<div class="col-md-4 mb-4 card-item">
                    <div style="min-height: 430px; height: auto;" class="card transparent-card">
                        <div class="card-body py-4 mt-1">
                            <div class="d-flex justify-content-start mb-4">
                                <img src="' . $image_path . '" class="shadow-1-strong lazy-img" width="100%" height="240" alt="Service Image" />
                            </div>
                            <h5 class="font-weight-bold my-3">' . $title . '</h5>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i>' . $body . ' 
                                <a href="service_details?service_name=' . urlencode($title) . '">Learn More</a>
                            </p>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log the error for debugging without exposing it to the user
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load services at this time. Please try again later.</p>";
    }
}


//display industry contents

function displayIndustriesRecords($arrayString) {
    // Validate and sanitize the input array
    $parts = explode(",", $arrayString);

    if (count($parts) >= 2) {
        // Extract ID and category and sanitize them
        $id = intval($parts[0]);  // Ensure ID is an integer
        $category = strtolower(trim($parts[1]));  // Sanitize and normalize category

        include 'config.php';

        try {
            // Use a prepared statement to prevent SQL injection
            $stmt = $conn->prepare("SELECT full_content FROM industry_listings WHERE id = ? AND LOWER(category) = ?");
            $stmt->bind_param("is", $id, $category);  // 'i' for integer, 's' for string

            // Execute the statement
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if records are found
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Sanitize output to prevent XSS attacks
                    echo htmlspecialchars($row['full_content']);
                }
            } else {
                echo "No records found!";
            }

            // Close the statement and connection
          
        } catch (Exception $e) {
            // Log the error for debugging without exposing details to the user
            error_log("Database Error: " . $e->getMessage());
            echo "<p>Unable to load industry records at this time. Please try again later.</p>";
        }
    } else {
        echo "<p>Invalid input. Please provide the correct parameters.</p>";
    }
}



if (isset($_POST['arrayString'])) {

	displayIndustriesRecords($_POST['arrayString']);
}


function displayIndustryListings() {
    include 'config.php';

    try {
        // Use a prepared statement to query the database
        $stmt = $conn->prepare("SELECT id, category, listing_image, body, pdf_url FROM industry_listings");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $id = htmlspecialchars($row['id']);
                $category = htmlspecialchars($row['category']);
                $body = htmlspecialchars(substr($row['body'], 0, 120)) . '...';
                $image = htmlspecialchars($row['listing_image']);
                $pdf_url = htmlspecialchars($row['pdf_url']);

                // Validate and set default image if necessary
                $image_path = "images/case-study/" . $image;
                if (!file_exists($image_path) || empty($image)) {
                    $image_path = "images/default-image.png";  // Use a default image
                }

                // Validate PDF link
                $pdf_link = !empty($pdf_url) ? "case_docs/" . urlencode($pdf_url) : "#";

                // Output the industry listing securely
                echo '<div class="col-md-4 mb-4 p-1">
                    <div class="customer-story-card shadow m-1" data-aos="fade-right">
                        <img style="min-height: 300px;" src="' . $image_path . '" class="d-block img-fluid lazy-img" alt="Industry Image">
                        <div class="p-3">
                            <strong><p id="' . $id . '" class="text-muted">Industry: ' . $category . '</p></strong>
                            <p>' . $body . '</p>
                            <div class="col">
                                <h6><a target="_blank" href="' . $pdf_link . '" id="' . $id . '">
                                    Read More <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>
                                </a></h6>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log the error for debugging without exposing it to the user
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load industry listings at this time. Please try again later.</p>";
    }
}








// function displayIndustryListingsSlider(){
//     include 'config.php';
//      $select = $conn->query("SELECT * FROM industry_listings  ");
//      if ($select->num_rows>0) {
//         while ($row=$select->fetch_assoc()) {

//         	echo '   <div class="carousel-item active">
//          <img src="https://images.pexels.com/photos/3025005/pexels-photo-3025005.jpeg" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100 bg-danger lazyload" width="800" height="500" alt="First slide">
//          <img src="https://images.pexels.com/photos/1642770/pexels-photo-1642770.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100 bg-danger" width="800" height="500" alt="First slide">

//           <div class="carousel-caption d-none d-md-block">
//             <button class="btn btn-warning">Read Full Report</button>
//             <h5>Industry: Health</h5>
//             <p>Automating data sharing with Health Agencies, Insurance Companies, Pharmaceuticals and Other Providers significantly improves Swope health efficiency and accuracy allowing for better care coordination, faster diagnoses, and more personalized treatment plans.</p>
//           </div>
//         </div>';
      
//         }
//     }else{
//         echo "No records found!";
//     }

// }

function displayRecentIndustryListings() {
    include 'config.php';

    try {
        // Use a prepared statement to fetch recent industry listings
        $stmt = $conn->prepare("SELECT id, category, listing_image, body, pdf_url FROM industry_listings ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $id = htmlspecialchars($row['id']);
                $category = htmlspecialchars($row['category']);
                $body = htmlspecialchars(substr($row['body'], 0, 150)) . '...';
                $image = htmlspecialchars($row['listing_image']);
                $pdf_url = htmlspecialchars($row['pdf_url']);

                // Validate and set default image if necessary
                $image_path = "images/case-study/" . $image;
                if (!file_exists($image_path) || empty($image)) {
                    $image_path = "images/default-image.png";  // Use a default image
                }

                // Validate PDF link
                $pdf_link = !empty($pdf_url) ? "case_docs/" . urlencode($pdf_url) : "#";

                // Output the listing securely
                echo '<div class="single-pf   p-2" style="min-height: 360px;">
                    <div class="p-4 card-shadow shadow">
                    	<img src="' . $image_path . '" alt="Industry Image" class="img-fluid lazy-img">
	                    <a href="' . $pdf_link . '" id="' . $id . '" class="btn" target="_blank">View Details</a>
	                    <h6 class="  mt-2">
	                        <strong class="default-color">Industry: ' . $category . '</strong>
	                    </h6>
	                    <p>' . $body . '</p>
	                    </div>
                </div>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log the error for debugging without exposing sensitive details to users
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load industry listings at this time. Please try again later.</p>";
    }
}


function displayRecentIndustryListingsAll() {
    include 'config.php';

    try {
        // Use prepared statements for secure querying
        $stmt = $conn->prepare("SELECT id, category, listing_image, body, pdf_url FROM industry_listings ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $id = htmlspecialchars($row['id']);
                $category = htmlspecialchars($row['category']);
                $body = htmlspecialchars(substr($row['body'], 0, 120)) . '...';
                $image = htmlspecialchars($row['listing_image']);
                $pdf_url = htmlspecialchars($row['pdf_url']);

                // Validate image path and use a default image if necessary
                $image_path = "images/case-study/" . $image;
                if (!file_exists($image_path) || empty($image)) {
                    $image_path = "images/default-image.png";  // Default fallback image
                }

                // Validate PDF link
                $pdf_link = !empty($pdf_url) ? "case_docs/" . urlencode($pdf_url) : "#";

                // Output the industry listing securely
                echo '<div class="col-md-3 mb-4 p-1">
                    <div class="customer-story-card card m-1 card-shadow" style="min-height: 450px; max-height: 450px;">
                        <img src="' . $image_path . '" class="d-block img-fluid lazy-img" alt="Industry Image">
                        <div class="p-3">
                            <strong>
                                <b id="' . $id . '" class="default-color h6">Industry: ' . $category . '</b>
                            </strong>
                            <p>' . $body . '</p>
                            <div class="mt-1">
                                <strong>
                                    <a class="default-color h6" target="_blank" href="' . $pdf_link . '" id="' . $id . '">
                                        Read More <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>
                                    </a>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "<span class='text-center col-md-12 text-danger p-5'>No records found!</span>";
        }

        // Close the statement and connection
       
    } catch (Exception $e) {
        // Log the error for debugging and display a friendly message
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load industry listings at this time. Please try again later.</p>";
    }
}


function displayWhitePaperListings() {
    include 'config.php';

    try {
        // Use a prepared statement to query the database
        $stmt = $conn->prepare("SELECT id, title, body, images, pdf FROM white_paper ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $id = htmlspecialchars($row['id']);
                $title = htmlspecialchars($row['title']);
                $body = htmlspecialchars(substr($row['body'], 0, 120)) . '...';
                $image = htmlspecialchars($row['images']);
                $pdf = htmlspecialchars($row['pdf']);

                // Validate image path and use a default if necessary
                $image_path = "images/white-papers/" . $image;
                if (!file_exists($image_path) || empty($image)) {
                    $image_path = "images/default-image.png";  // Use a fallback image
                }

                // Validate PDF link and set a fallback if necessary
                $pdf_link = !empty($pdf) ? "white_paper_docs/" . urlencode($pdf) : "#";

                // Output the white paper listing securely
                echo '<div class="col-md-3 shadow mb-4 p-1">
                    <div class="customer-story-card card card-shadow m-1" style="min-height: 400px; max-height: 400px;">
                        <img src="' . $image_path . '" class="d-block img-fluid lazy-img" alt="White Paper Image">
                        <div class="p-3">
                            <strong>
                                <b class="default-color h6">' . $title . '</b>
                            </strong>
                            <p>' . $body . '</p>
                            <div class="mt-1">
                                <strong>
                                    <a class="default-color h6" target="_blank" href="' . $pdf_link . '" id="' . $id . '">
                                        Read More <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>
                                    </a>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "<span class='text-center col-md-12 text-danger p-5'>No records found!</span>";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log the error for debugging and display a user-friendly message
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load white paper listings at this time. Please try again later.</p>";
    }
}


function displayPartnersLogo() {
    include 'config.php';

    try {
        // Use a prepared statement to query the partners logo data
        $stmt = $conn->prepare("SELECT site_url, logo_url FROM partners_logo");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize the output to prevent XSS attacks
                $site_url = htmlspecialchars($row['site_url']);
                $logo_url = htmlspecialchars($row['logo_url']);

                // Validate image path and set default if needed
                $logo_path = !empty($logo_url) ? $logo_url : "images/default-logo.png";

                // Validate site URL and provide a fallback
                $safe_site_url = !empty($site_url) ? $site_url : "#";

                // Output the partner logo securely
                echo '<div class="m-4">
                        <a href="' . $safe_site_url . '" target="_blank" rel="noopener noreferrer">
                            <img src="' . $logo_path . '" alt="Partner Logo" class="img-fluid lazy-img">
                        </a>
                      </div>';
            }
        } else {
            echo "<span class='text-center col-md-12 text-danger p-5'>No records found!</span>";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log the error and display a user-friendly message
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load partner logos at this time. Please try again later.</p>";
    }
}


#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Beginning of submit consultation form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''


function submitConsultationForm() {
	require 'config.php';
    // Load .env
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    global $conn;

    function dateFormatFour() {
        return date("j M Y", strtotime(date('y-m-d')));
    }

    $date_now = dateFormatFour();

    // Sanitize inputs
    $name         = trim(htmlspecialchars($_POST['name'] ?? ''));
    $email        = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $organization = trim(htmlspecialchars($_POST['organization'] ?? ''));
    $phone        = trim(htmlspecialchars($_POST['phone'] ?? ''));
    $message      = trim(htmlspecialchars($_POST['message'] ?? ''));
    $service_type = trim(htmlspecialchars($_POST['service_type'] ?? ''));

   if ($phone && !preg_match('/^\+\d{10,15}$/', $phone)) {
    return "Invalid phone format. Use international format like: +254712345678";
}



    if (!$name || !$email || !$organization || !$phone || !$message || !$service_type) {
        return "Please fill in all the required fields.";
    }

    try {
        // Insert into database
        $stmt = $conn->prepare(
            "INSERT INTO consultation (name, email, organization, phone, message, service_type, date_now) 
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssssss", $name, $email, $organization, $phone, $message, $service_type, $date_now);

        if (!$stmt->execute()) {
            error_log("Database Error: " . $stmt->error);
            return "Failed to submit the form. Please try again later.";
        }

        $stmt->close();

        // Email logic
        $client = new Client();
        $tenantId     = $_ENV['AZURE_TENANT_ID'];
        $clientId     = $_ENV['AZURE_CLIENT_ID'];
        $clientSecret = $_ENV['AZURE_CLIENT_SECRET'];
        $fromEmail    = $_ENV['FROM_EMAIL'];

        $tokenResponse = $client->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
            'form_params' => [
                'client_id'     => $clientId,
                'scope'         => 'https://graph.microsoft.com/.default',
                'client_secret' => $clientSecret,
                'grant_type'    => 'client_credentials',
            ],
        ]);

        $accessToken = json_decode($tokenResponse->getBody(), true)['access_token'];

        // Admin email payload
        $adminPayload = [
            'message' => [
                'subject' => "New Consultation Request from $name",
                'body' => [
                    'contentType' => 'HTML',
                    'content' => "
                        <p><strong>New Consultation Request:</strong></p>
                        <ul>
                            <li><b>Name:</b> $name</li>
                            <li><b>Email:</b> $email</li>
                            <li><b>Organization:</b> $organization</li>
                            <li><b>Phone:</b> $phone</li>
                            <li><b>Service Type:</b> $service_type</li>
                            <li><b>Message:</b><br>$message</li>
                            <li><b>Date:</b> $date_now</li>
                        </ul>"
                ],
                'toRecipients' => [
                    ['emailAddress' => ['address' => $fromEmail]]
                ]
            ],
            'saveToSentItems' => true,
        ];

        // User confirmation email payload
        $userPayload = [
            'message' => [
                'subject' => "Consultation Request Received – Armely",
                'body' => [
                    'contentType' => 'HTML',
                    'content' => "
                        <p>Dear $name,</p>
                        <p>Thank you for your interest in our <strong>$service_type</strong> services.</p>
                        <p>We’ve received your consultation request and will get back to you shortly.</p>
                        <p>Best regards,<br>The Armely Team</p>"
                ],
                'toRecipients' => [
                    ['emailAddress' => ['address' => $email]]
                ]
            ],
            'saveToSentItems' => true,
        ];

        // Send both emails
        $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type'  => 'application/json',
            ],
            'body' => json_encode($adminPayload),
        ]);

        $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type'  => 'application/json',
            ],
            'body' => json_encode($userPayload),
        ]);

       
        return "19";

    } catch (Exception $e) {
        error_log("Exception: " . $e->getMessage());
        return "An error occurred. Please try again later.";
    }
}
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['organization'])&& isset($_POST['phone']) && isset($_POST['message']) && isset($_POST['service_type'])) {
   echo submitConsultationForm();
}
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#End of submit consultation form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''


#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Beginning of submit contact form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

function submitContactForm() {
   
	
	// Load environment variables once
	$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
	$dotenv->load();
    global $conn;
    $tenantId     = $_ENV['AZURE_TENANT_ID'];
    $clientId     = $_ENV['AZURE_CLIENT_ID'];
    $clientSecret = $_ENV['AZURE_CLIENT_SECRET'];
    $fromEmail    = $_ENV['FROM_EMAIL'];
    $adminEmail   = $fromEmail;

    // Sanitize input
    $name         = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email        = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $organization = trim(filter_input(INPUT_POST, 'organization', FILTER_SANITIZE_STRING));
    $phone        = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
    $message      = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

    // Basic validation

    if (!empty($_POST['website'])) {
    // Bot filled hidden field, ignore submission
    exit("Spam detected. Submission ignored.");
	}
	
	$blocked_domains = ['registry.godaddy'];

	$email = strtolower(trim($_POST['email']));
	if (preg_match('/@(' . implode('|', $blocked_domains) . ')$/', $email)) {
	    exit("Blocked domain.");
	}


    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all required fields.";
        return;
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        return;
    }

    // Store in database
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, organization, phone, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $organization, $phone, $message);

    if ($stmt->execute()) {
        try {
            $client = new Client();

            // Step 1: Get Microsoft Graph Access Token
            $response = $client->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
                'form_params' => [
                    'client_id'     => $clientId,
                    'scope'         => 'https://graph.microsoft.com/.default',
                    'client_secret' => $clientSecret,
                    'grant_type'    => 'client_credentials',
                ],
            ]);

            $accessToken = json_decode($response->getBody(), true)['access_token'];

            // Step 2: Email payloads
            $userEmailPayload = [
                'message' => [
                    'subject' => 'Thanks for Contacting Armely',
                    'body' => [
                        'contentType' => 'HTML',
                        'content'     => "<p>Dear $name,</p><p>We’ve received your message and will get back to you soon.</p><p>Best regards,<br>Team Armely</p>",
                    ],
                    'toRecipients' => [
                        ['emailAddress' => ['address' => $email]]
                    ],
                ],
                'saveToSentItems' => true,
            ];

            $adminEmailPayload = [
                'message' => [
                    'subject' => "New Contact Form Submission from $name",
                    'body' => [
                        'contentType' => 'HTML',
                        'content'     => "<p><b>New contact form submission:</b></p>
                            <ul>
                                <li><b>Name:</b> $name</li>
                                <li><b>Email:</b> $email</li>
                                <li><b>Organization:</b> $organization</li>
                                <li><b>Phone:</b> $phone</li>
                                <li><b>Message:</b><br>$message</li>
                            </ul>",
                    ],
                    'toRecipients' => [
                        ['emailAddress' => ['address' => $adminEmail]]
                    ],
                ],
                'saveToSentItems' => true,
            ];

            // Step 3: Send Emails
            $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                    'Content-Type'  => 'application/json',
                ],
                'body' => json_encode($userEmailPayload),
            ]);

            $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                    'Content-Type'  => 'application/json',
                ],
                'body' => json_encode($adminEmailPayload),
            ]);

            echo "80";

        } catch (Exception $e) {
            error_log("Email sending failed: " . $e->getMessage());
            echo "'Message saved, but email sending failed.')</script>";
        }

    } else {
        error_log("Database Error: " . $stmt->error);
        echo "Failed to send the message. Please try again.";
    }

    
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['organization'])&& isset($_POST['phone']) && isset($_POST['message'])) {
    echo submitContactForm();
}
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#End of submit contact form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Start of job description display
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
function displayJobDescriptions() {
    if (isset($_GET['job-details'])) {
        require 'config.php';

        // Sanitize the input to prevent SQL injection
        $id = filter_var($_GET['job-details'], FILTER_SANITIZE_STRING);

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM career WHERE job_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $job_id = htmlspecialchars($row['job_id']);
                $job_title = htmlspecialchars($row['job_title']);
                $job_location = htmlspecialchars($row['job_location']);
                $job_description = $row['job_description'];
                $job_type = htmlspecialchars($row['job_type']);

                // Output the job description
                echo "
                    <div class='section-title mt-5'>
                        <h3>
                            <span class='default-color'>{$job_title}, </span>{$job_location}
                            <center><hr class='default-background hr'></center>
                        </h3>
                    </div>
                    <div>{$job_description}</div>
                    <div class='m-5'>
                        <center><a href='applications?job-details={$job_id}&application=true&title=" . urlencode($job_title) . "' 
                           class='btn btn-primary col-lg-2 col-sm-6 ml-5'>
                            Apply Now
                        </a></center>
                    </div>";
            }
        } else {
            echo "<p class='text-center text-danger'>Nothing was found!</p>";
        }

        // Close the statement and connection
       
    }
}

// Helper function to format job listing numbers
function joblistingNumbering($length) {
    return (strlen($length) === 1) ? "0" . $length : $length;
}


#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#End of job description display
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Start of display services details 
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
function displayServicesDetails() {
    include 'config.php';

    if (isset($_GET['title'])) {
        // Sanitize and validate the input to prevent SQL injection and XSS
        $title = filter_var(trim($_GET['title']), FILTER_SANITIZE_STRING);

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT intro_content, other_contents FROM services_lists WHERE title = ?");
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS
                $sanitized_title = $title;
                $intro_content = $row['intro_content'];
                $other_contents = $row['other_contents'];

                // Display the service details
                echo "<h2 class='mb-3 default-color'>{$sanitized_title}</h2>";
                echo "<div>{$intro_content}</div>";
                echo "<div>{$other_contents}</div>";
            }
        } else {
            echo "<p class='text-center text-danger'>Service details not found!</p>";
        }

        // Close the statement and connection
        
    } else {
        echo "<p class='text-center text-warning'>No service selected.</p>";
    }
}


#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Start of submit job app form
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
function submitJobAppForm() {
    

    global $conn;

    if ($_FILES["cv"]["error"] == UPLOAD_ERR_OK) {
    	// Load environment variables once
		$dotenv = Dotenv::createImmutable(__DIR__ . '/../');

		$dotenv->load();
	    global $conn;
        // Sanitize and validate user input
        $name = htmlspecialchars($_POST['name'] ?? '');
        $email = strtolower(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $city = htmlspecialchars($_POST['city'] ?? '');
        $phone = htmlspecialchars($_POST['phone'] ?? '');
        $address = htmlspecialchars($_POST['address'] ?? '');
        $state = htmlspecialchars($_POST['state'] ?? '');
        $zip = htmlspecialchars($_POST['zip'] ?? '');
        $role = strtolower(htmlspecialchars($_POST['role'] ?? ''));
        $position = htmlspecialchars($_POST['position'] ?? '');
        $application_date = date("d-m-y h:i:sa");

        $random_name = rand(100000, 3000000);
        $new_file_name = $random_name . ".pdf";
        $target_path = "../pdf/" . $new_file_name;
        $cv_url = "https://armely.com/pdf/" . $new_file_name; // 🔁 Update with your actual domain

        // Check for duplicate
        $check = $conn->query("SELECT * FROM job_applications WHERE LOWER(email)='$email' AND LOWER(role)='$role'");

        if ($check->num_rows > 0) {
            echo "You have already made an application";
            return;
        }

        if (!move_uploaded_file($_FILES['cv']['tmp_name'], $target_path)) {
            echo "Failed to upload CV. Try again.";
            return;
        }

        // Save to DB
        $stmt = $conn->prepare("INSERT INTO job_applications (name, email, city, phone, address, state, zip, role, position, cv, application_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $name, $email, $city, $phone, $address, $state, $zip, $role, $position, $new_file_name, $application_date);

        if (!$stmt->execute()) {
            error_log("DB error: " . $stmt->error);
            echo "Failed to save application.";
            return;
        }

        // EMAIL SETUP
        $client = new Client();
        $tenantId = $_ENV['AZURE_TENANT_ID'];
        $clientId = $_ENV['AZURE_CLIENT_ID'];
        $clientSecret = $_ENV['AZURE_CLIENT_SECRET'];
        $fromEmail = $_ENV['FROM_EMAIL'];

        // Get Microsoft Graph token
        $tokenResponse = $client->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
            'form_params' => [
                'client_id' => $clientId,
                'scope' => 'https://graph.microsoft.com/.default',
                'client_secret' => $clientSecret,
                'grant_type' => 'client_credentials',
            ],
        ]);
        $accessToken = json_decode($tokenResponse->getBody(), true)['access_token'];

        // Build Email to Admin
        $adminPayload = [
            'message' => [
                'subject' => "New Job Application from $name",
                'body' => [
                    'contentType' => 'HTML',
                    'content' => "
                        <p><b>New Application Submitted:</b></p>
                        <ul>
                            <li><b>Name:</b> $name</li>
                            <li><b>Email:</b> $email</li>
                            <li><b>Phone:</b> $phone</li>
                            <li><b>City:</b> $city</li>
                            <li><b>Role:</b> $role</li>
                            <li><b>Position:</b> $position</li>
                            <li><b>CV:</b> <a href='$cv_url' target='_blank'>Download CV</a></li>
                        </ul>
                    "
                ],
                'toRecipients' => [
                    ['emailAddress' => ['address' => $fromEmail]]
                ]
            ],
            'saveToSentItems' => true,
        ];

        // Build confirmation email to applicant
        $userPayload = [
            'message' => [
                'subject' => "Your Job Application at Armely",
                'body' => [
                    'contentType' => 'HTML',
                    'content' => "
                        <p>Dear $name,</p>
                        <p>Thank you for applying to Armely. We have received your job application for <strong>$position</strong>.</p>
                        <p>Our team will review your CV and contact you if you’re shortlisted.</p>
                        <p>Best regards,<br>HR Team</p>"
                ],
                'toRecipients' => [
                    ['emailAddress' => ['address' => $email]]
                ]
            ],
            'saveToSentItems' => true,
        ];

        try {
            // Send admin and user emails
            $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($adminPayload),
            ]);

            $client->post("https://graph.microsoft.com/v1.0/users/$fromEmail/sendMail", [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($userPayload),
            ]);

            echo 1;

        } catch (Exception $e) {
            error_log("Email send error: " . $e->getMessage());
            echo "Application saved, but email sending failed.";
        }

        $stmt->close();
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

    // Sanitize the input to prevent SQL injection
    $id = filter_var($_GET['blogId'], FILTER_SANITIZE_STRING);

    // Default expiration time for the cookie (30 days)
    $expiration_days = 30;
    $clicks = []; // Initialize clicks array

    // Check if the 'clicks' cookie exists and decode it
    if (isset($_COOKIE['clicks'])) {
        $clicks = json_decode($_COOKIE['clicks'], true);

        // Reset to an empty array if decoding fails or result isn't an array
        if (!is_array($clicks)) {
            $clicks = [];
        }
    }

    try {
        // Use a prepared statement to fetch the blog data securely
        $stmt = $conn->prepare("SELECT clicks FROM blogs WHERE blog_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $row_count = $row['clicks'] + 1;

            // If the blogId is not in the clicks array, update the clicks
            if (!isset($clicks[$id])) {
                $update_stmt = $conn->prepare("UPDATE blogs SET clicks = ? WHERE blog_id = ?");
                $update_stmt->bind_param("is", $row_count, $id);

                if ($update_stmt->execute()) {
                    // Add the blogId to the clicks array and update the cookie
                    $clicks[$id] = $id;
                    setcookie('clicks', json_encode($clicks), time() + ($expiration_days * 86400), "/");
                } else {
                    error_log("Failed to update clicks for blog ID: $id");
                }

                $update_stmt->close();
            }
        } else {
            echo "<p>Blog post not found!</p>";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log any exceptions and display a friendly message
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to load the blog post. Please try again later.</p>";
    }
}


#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
#Start of display youtube videos details 
#''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
function getYouTubeId($url) {
    $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
    preg_match($pattern, $url, $matches);
    return $matches[1] ?? '';
}

function displayYoutubeVideos() {
    include 'config.php';

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





function displayNewSocialImpact() {
    include 'config.php';

    try {
        // Use a prepared statement to fetch the recent 14 blogs, selecting only the needed columns
        $stmt = $conn->prepare("SELECT body, title, image_url, posted_date, category,id,secure_id,snippet FROM social_impact WHERE category='new' ORDER BY id DESC LIMIT 3");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $body = substr($row['snippet'],0,200);
                $title = htmlspecialchars($row['title']);
                $image_url = htmlspecialchars($row['image_url']);
                $posted_date = htmlspecialchars($row['posted_date']);
                $category = htmlspecialchars($row['category']);

                // Display the blog post
                echo ' <a href="social-impact-details?social_id='.$row['secure_id'].'"><div class="blog-post">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="images/social-impact/'.$image_url.'" class="img-fluid blog-image" alt="Blog Image">
                        </div>
                        <div class="col-md-8">
                            <span class="date">'.$posted_date.'</span>
                            <h3 class="blog-title">'.$title.'</h3>
                            <p class="blog-desc">4 min read - '.$body.'...</p>
                        </div>
                    </div>
                </div></a>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log the error for debugging without exposing it to users
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to retrieve blogs at this time. Please try again later.</p>";
    }
}

function displayNewSocialImpactSingle($secure_id) {
    include 'config.php';

    try {
        // Prepare the statement with a placeholder
        $stmt = $conn->prepare("SELECT body, title, image_url, posted_date, category, id, secure_id FROM social_impact WHERE secure_id = ? LIMIT 1");

        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
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

        // Bind the parameter (assumes secure_id is a string)
        $stmt->bind_param("s", $secure_id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $body = $row['body'];
                $title = htmlspecialchars($row['title']);
                $image_url = htmlspecialchars($row['image_url']);
                $posted_date = htmlspecialchars($row['posted_date']);
                $category = htmlspecialchars($row['category']);

                echo '<a><div class="blog-post">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="images/social-impact/'.$image_url.'" class="img-fluid blog-image" alt="Blog Image">
                        </div>
                        <div class="col-md-12">
                            <span class="date">'.$posted_date.' | '.estimateReadingTime($body).' min read -</span>
                            <h3 class="blog-title">'.$title.'</h3>
                            <p class="blog-desc"> '.$body.'</p>
                        </div>
                    </div>
                </div></a>';
            }
        } else {
            echo "No records found!";
        }

        
    } catch (Exception $e) {
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to retrieve blogs at this time. Please try again later.</p>";
    }
}


function displayFutureSocialImpact() {
    include 'config.php';

    try {
        // Use a prepared statement to fetch the recent 14 blogs, selecting only the needed columns
        $stmt = $conn->prepare("SELECT body, title, image_url, posted_date, category,secure_id,author_name,author_title,snippet FROM social_impact  ORDER BY id DESC ");
        $stmt->execute();
        $result = $stmt->get_result();
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

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $body = substr($row['snippet'],0,150);
                $title = htmlspecialchars($row['title']);
                $image_url = htmlspecialchars($row['image_url']);
                $posted_date = htmlspecialchars($row['posted_date']);
                $category = htmlspecialchars($row['category']);

                // Display the blog post
                echo ' <!-- Blog Card 1 -->
               
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                 <a href="social-impact-details?social_id='.$row['secure_id'].'">
                    <img src="images/social-impact/'.$image_url.'" class="img-fluid blog-card-image  " alt="Blog Image">
                    <div class="blog-content">
                        <span class="date">'.$posted_date.'</span>
                        <h3 class="blog-title">'.substr($title,0,45).'...</h3>
                        <p class="blog-desc">'.estimateReadingTime($row['body']).' min read - '.$body.'...</p>
                    </div>
                    </a>
                </div>
            </div>
           
             ';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
       
    } catch (Exception $e) {
        // Log the error for debugging without exposing it to users
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to retrieve blogs at this time. Please try again later.</p>";
    }
}


function displayGallery() {
    include 'config.php';

    try {
        // Use a prepared statement to fetch the recent 14 blogs, selecting only the needed columns
        $stmt = $conn->prepare("SELECT * FROM gallery ORDER BY id DESC ");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
               
                $image_url = htmlspecialchars($row['image_url']);
               

                // Display the blog post
                echo '
            <!-- Blog Card 5 -->
            <a class=" " href="images/gallery/'.$image_url.'" target="_blank">
            <div class="blog-card card-shadow p-2">
                <img style="max-height: 300px; height: 250px;" src="images/gallery/'.$image_url.'" alt="Blog Image" class="img-fluid">
               
            </div></a>
             ';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
        
    } catch (Exception $e) {
        // Log the error for debugging without exposing it to users
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to retrieve blogs at this time. Please try again later.</p>";
    }
}



function displayAllSocialImpact() {
    include 'config.php';


    try {
        // Use a prepared statement to fetch the recent 14 blogs, selecting only the needed columns
        $stmt = $conn->prepare("SELECT body, title, image_url, posted_date, category,id,secure_id,snippet FROM social_impact WHERE category='future'");
        $stmt->execute();
        $result = $stmt->get_result();
        

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $body = substr($row['snippet'],0,200);
                $title = htmlspecialchars($row['title']);
                $image_url = htmlspecialchars($row['image_url']);
                $posted_date = htmlspecialchars($row['posted_date']);
                $category = htmlspecialchars($row['category']);

                // Display the blog post
                echo ' <a ><div class="blog-post">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="images/social-impact/'.$image_url.'" class="img-fluid" alt="Blog Image">
                        </div>
                        <div class="col-md-8">
                            <span class="date">'.$posted_date.'</span>
                            <h3 class="blog-title">'.$title.'</h3>
                            <p class="blog-desc">'.estimateReadingTime($row['body']).' min read - '.$body.'</p>
                        </div>
                    </div>
                </div></a>';
            }
        } else {
            echo "No records found!";
        }

        // Close the statement and connection
       
    } catch (Exception $e) {
        // Log the error for debugging without exposing it to users
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to retrieve blogs at this time. Please try again later.</p>";
    }
}



session_start(); // Start session for better security

// Redirect function
function redirect($url) {
    header("Location: $url");
    exit;
}
function moreDetailsForSocialImpactPosts(){


// Check if 'social_id' is provided
if (!isset($_GET['social_id']) || empty($_GET['social_id'])) {
    redirect("social-impact");
}

include 'config.php';

// Secure input using type validation
$social_id = filter_input(INPUT_GET, 'social_id', FILTER_SANITIZE_STRING);

if (!$social_id) {
    redirect("social-impact");
}

try {
    // Use Prepared Statements to Prevent SQL Injection
    $stmt = $conn->prepare("SELECT secure_id, title, body, category, posted_date, image_url,author_name,author_title 
                            FROM social_impact 
                            WHERE secure_id = ?");
    $stmt->bind_param("s", $social_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Sanitize Output
         return [
                'body' => htmlspecialchars($row['body'], ENT_QUOTES, 'UTF-8'),
                'title' => htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'),
                'image_url' => htmlspecialchars($row['image_url'], ENT_QUOTES, 'UTF-8'),
                'posted_date' => htmlspecialchars($row['posted_date'], ENT_QUOTES, 'UTF-8'),
                'category' => htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8'),
                'author_name' => htmlspecialchars($row['author_name'], ENT_QUOTES, 'UTF-8'),
                'author_title' => htmlspecialchars($row['author_title'], ENT_QUOTES, 'UTF-8')
            ];
       

    } else {
        redirect("social-impact");
    }

    

} catch (Exception $e) {
    error_log("Database error: " . $e->getMessage());
    redirect("social-impact");
}

// Set secure headers
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: no-referrer");
header("Content-Security-Policy: default-src 'self'; img-src 'self' data:; script-src 'self'; style-src 'self';");

}

function relatedArticles() {
	include 'config.php';
    if (!isset($_GET['social_id']) || empty($_GET['social_id'])) {
        echo "Invalid request!";
        return;
    }

    // Secure input using type validation
    $social_id = filter_input(INPUT_GET, 'social_id', FILTER_SANITIZE_STRING);

    if (!$social_id) {
        echo "Invalid request!";
        return;
    }

    try {
        // Get category of the current article using Prepared Statement
        $stmt1 = $conn->prepare("SELECT category FROM social_impact WHERE secure_id = ?");
        $stmt1->bind_param("s", $social_id);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        if ($result1->num_rows === 0) {
            echo "No related articles found!";
            return;
        }

        $row = $result1->fetch_assoc();
        $category1 = $row['category'];
        $stmt1->close();

        // Fetch related articles from the same category (excluding the current article)
        $stmt = $conn->prepare("SELECT body, title, image_url, posted_date, category, secure_id 
                                FROM social_impact 
                                WHERE category = ? AND secure_id != ? 
                                ORDER BY posted_date DESC 
                                LIMIT 5");
        $stmt->bind_param("ss", $category1, $social_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS attacks
                $body = htmlspecialchars($row['body'], ENT_QUOTES, 'UTF-8');
                $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                $image_url = htmlspecialchars($row['image_url'], ENT_QUOTES, 'UTF-8');
                $posted_date = htmlspecialchars($row['posted_date'], ENT_QUOTES, 'UTF-8');

                // Display related article
               echo '
                <div class="related-article">
                        <img src="img/social-impact/'.$image_url.'" class="img-fluid lazy-img" alt="Related Article">
                       <a href="social-impact-details?social_id='.$row['secure_id'].'" class="related-title text-primary">
                            '.substr($title, 0,70).'
                        </a>
                    </div>
                   ';
            }
           
        } else {
            echo "No related articles found!";
        }

        $stmt->close();
    } catch (Exception $e) {
        error_log("Database Error: " . $e->getMessage());
        echo "<p>Unable to retrieve related articles at this time. Please try again later.</p>";
    }
}


function displayFreemiums(){
	require 'config.php';
	$numbering = 1;
	$select = $conn->query("SELECT title,body,image_url,url_get_name,snippet FROM freemium ORDER BY id DESC");
	if ($select->num_rows>0) {
		while ($row=$select->fetch_assoc()) {
			echo '<div class="col-lg-4 col-md-12 col-12 shadow">
		<div class="single-table card-shadow">
			<!-- Table Head -->
			<div class="table-head" style="height:auto">
				<div class="icon">
				<a href="'.$row['image_url'].'" target="_blank"><img src="'.$row['image_url'].'" style="height: 120px;"></a>
				</div>
				<h5 class="title">'.$row['title'].'</h5>
				<p>'.substr($row['snippet'],0,100).'...</p>
					<a href="service-details?name='.$row['title'].'" class="btn btn-primary">Get now</a>
			</div>
			
		</div>
</div>';
		}
	}else{
		echo "Nothing found!";
	}
	}

function displayTeams(){
	require 'config.php';
	$numbering = 1;
	$select = $conn->query("SELECT team_title,team_body,team_image,team_name,facebook,x,linkedin,instagram FROM team ORDER BY id DESC");
	if ($select->num_rows>0) {
		while ($row=$select->fetch_assoc()) {
			echo ' <!-- column  -->
		      <div class="col-lg-4 mb-4">
		        <!-- Row -->
		        <div class="row card card-shadow m-1" style="min-height: 400px;">
		          <div class="col-md-12">
		           <center> <a target="_blank" href="images/team/'.$row['team_image'].'"><img style="width: 150px; height: 150px;" src="images/team/'.$row['team_image'].'" alt="wrapkit" class="img-fluid rounded-circle" /></a></center>
		          </div>
		          <div class="col-md-12 text-center">
		            <div class="pt-2">
		              <h5 class="mt-2 font-weight-medium mb-0 default-color">'.ucwords(strtolower($row['team_name'])).'</h5>
		              <h6 class="subtitle mb-3">'.$row['team_title'].'</h6>
		              <p class="shorten-content" style="min-height: 110px;">'.$row['team_body'].'</p>
                      <a class="read-more-btn btn btn-link text-light default-background m-1">Read More <i class="fa fa-long-arrow-right"></i></a>
                      <hr class="default-background">
		              <ul class="list-inline default-color">
		                <li class="list-inline-item"><a href="'.$row['facebook'].'" class="text-decoration-none d-block px-1"><i class="icon-social-facebook"></i></a></li>
		                <li class="list-inline-item"><a href="'.$row['x'].'" class="text-decoration-none d-block px-1"><i class="fab fa-x-twitter"></i></a></li>
		                <li class="list-inline-item"><a href="'.$row['instagram'].'" class="text-decoration-none d-block px-1"><i class="icon-social-instagram"></i></a></li>
		                <li class="list-inline-item"><a href="'.$row['linkedin'].'" class="text-decoration-none d-block px-1"><i class="icon-social-linkedin"></i></a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
		        <!-- Row -->
		      </div>
		      <!-- column  -->';
		}
	}else{
		echo "Nothing found!";
	}
	}

// Add meta tags for showing blog previews for social media links
function generateBlogMetaTags($blogId) {
	require 'config.php';
    // Secure query using blogId
    $stmt = $conn->prepare("SELECT title, body, image_path, blog_id FROM blogs WHERE blog_id = ?");
    $stmt->bind_param("i", $blogId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Default metadata
    $title = "Trusted source for digital excellence";
    $description = "Beyond Imagination!";
    $image = "https://armely.com/images/logo/logo1.png";
    $url = "https://armely.com";

    // If a blog is found, override metadata
    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['body'];
        $image = "https://armely.com/".$row['image_path'];
        $url = 'https://armely.com/blog.php?blogId=' . urlencode($row['blog_id']);
    }

    // Return meta tags
    return '
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="' . htmlspecialchars($url) . '" />
    <meta property="og:title" content="' . htmlspecialchars($title) . '" />
    <meta property="og:description" content="' .htmlspecialchars(strip_tags($description)) . '" />
    <meta property="og:image" content="' . htmlspecialchars($image) . '" />

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="' . htmlspecialchars($title) . '">
    <meta name="twitter:description" content="' . htmlspecialchars($description) . '">
    <meta name="twitter:image" content="' . htmlspecialchars($image) . '">
    ';
}

// ✅ Close connection once — at the bottom, after all work is done
$conn->close();


?>
