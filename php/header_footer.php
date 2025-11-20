<?php

function getUrl(...$urls) {
    $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = explode("/", rtrim(parse_url($currentUrl, PHP_URL_PATH), "/"));
    $lastSegment = end($parts);

    // Check if the last segment matches any of the provided URLs
    return in_array($lastSegment, $urls) ? "active" : "";
}

//getUrl();

function getHeader($pageName) {
 
    return '
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name="copyright" >
		'.

		generateBlogMetaTags($_GET['blogId'] ?? 0)

		. 

	  	'
			
		<!-- Title -->
        <title>'.$pageName.'</title>
		
		<!-- Favicon -->
       <link rel="icon" href="images/logo/logo1.png">
       <link rel="preload" as="image" href="images/sliders/slider-1.webp">
	   <link rel="preload" as="image" href="images/sliders/slider-2.webp">
	   <link rel="preload" as="image" href="images/sliders/slider-3.webp">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>

		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize_2.css"> 
        <link rel="stylesheet" href="style5.css">
        <link rel="stylesheet" href="css/responsive.css">
		 <link rel="stylesheet" href="css/custome.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
		
    </head>
    <body>
    <!-- <div class="announcement-banner default-background" id="announcementBanner">
	    📢 <b>Estimate your Fabric capacity needs!</b> Check out Microsoft Fabric SKU Estimator. <a href="service-details?name=fabric_capacity">Learn More</a>
		    <b>Do you need AI Proof of Concept (PoC) Starter Pack ?</b> Request your AI Proof of Concept Starter Pack Today. <a href="service-details?name=pocstarter-ai">Learn More</a>
		    <span class="close-btn" onclick="closeBanner()">&times;</span>
	</div> -->
	
		<section>	
		<!-- Floating Action Button -->
		   <div class="floating-btn">
		    <button id="myBtn"  style="border-radius: 50%; height: 60px; width: 60px; background-color: rgb(47,85,151);"  type="button" class="btn btn-primary btn-lg h1">
		      <i class="fa fa-comments "></i>
		    </button>
		  </div>
		<div id="myModal" class="modal-chat">

		  <!-- Modal content -->
		  <div class="modal-content-chat col-lg-4">
		    <span class="close">&times;</span>
		    <iframe src="https://copilotstudio.preview.microsoft.com/environments/Default-b783208a-8014-4829-9589-5324f76470c8/bots/cr44c_agent/webchat?__version__=2%22"
		    frameborder="0" style="width: 100%; height: 80%;"></iframe>  
		  </div>

		</div>
		</section>
	
		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-12">
							
						</div>
						<div class="col-lg-9 col-md-8 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">
								<li>
									<i class="fa fa-phone"></i>
									<a href="tel:+19724600643" class="text-decoration-none text-dark">+1 972 460 0643</a>
								</li>

								<li><i class="fa fa-envelope"></i><a href="mailto:info@armely.com">info@armely.com</a></li>
								<li><i class="fa fa-user"></i><a href="https://armely.powerappsportals.com/">Customer support</a></li>
						        <li> <span  data-toggle="modal" data-target="#exampleModal"><i  class="fa fa-search"></i> <a >Search</a> </span>
						           
						          </li>
							</ul>

							<!-- End Top Contact -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
			<div class="container">
			<div class="inner">
			<div class="row">
				<div class="col-lg-3 col-md-23 col-12">
					<!-- Start Logo -->
					<div class="logo">
						<a href="/"><span class="logo-font">armely</span></a>
					</div>
					<!-- End Logo -->
					<!-- Mobile Nav -->
					<div class="mobile-nav"></div>
					<!-- End Mobile Nav -->
				</div>
				<div class="col-lg-9 col-md-9 col-12">
					<!-- Main Menu -->
					<div class="main-menu">
					 <nav class="navigation">
			        <ul class="nav menu">
			          <li class="'. getUrl("company","career","job-board","applications","social-impact","social-impact-details").'"><a >Who We Are <i class="icofont-rounded-down"></i></a>
			            <ul class="dropdown">
			              <li><a href="company">Company Overview</a></li>
			              <li><a href="career">Career Opportunities</a></li>
			              <li><a href="team">Our Team</a></li>
						   
			            </ul>
			          </li>
			          <li class="'. getUrl("services","service-details").'"><a>What We Do <i class="icofont-rounded-down"></i></a>
			              <ul class="dropdown">
			                 <li><a href="services">All Services</a></li>
			                  <li>
			                    <a >AI Services <i class="icofont-rounded-right"></i></a>
			                    <ul class="dropdown">
			                          <li><a href="service-details?name=ai-consulting">AI Consulting</a></li>
			                          <li><a href="service-details?name=ai-advisory">AI Advisory</a></li>
			                          <li><a href="service-details?name=generative-ai">Generative AI</a></li>
			                          <li><a href="service-details?name=pocstarter-ai">AI PoC Starter</a></li>
			                      </ul>

			                  </li>
			                   
			                   <li >
			                      <a >Data Services <i class="icofont-rounded-right"></i></a>
			                      <ul class="dropdown">
			                      	  <li><a href="service-details?name=fabric_capacity">Estimate your Fabric Capacity</a></li>
			                          <li><a href="service-details?name=fabric">Microsoft Fabric</a></li>
			                          <li><a href="service-details?name=data-science">Data Science and Analytics</a></li>
			                          <li><a href="service-details?name=data-strategy">Data Strategy</a></li>
			                          <li><a href="service-details?name=databricks">Databricks</a></li>
			                          <li><a href="service-details?name=snowflake">Snowflake</a></li>
			                          <li><a href="service-details?name=sql-data-warehousing">SQL & Data Warehousing</a></li>
			                      </ul>
			                  </li>
			                   <li>
			                    <a>Digital Transformation <i class="icofont-rounded-right"></i></a>
			                    <ul class="dropdown">
			                    	 <li><a href="service-details?name=apidataaccess">API Data Access</a></li>
			                        <li><a href="service-details?name=powerapps">Microsoft Powerapps</a></li>
			                        <li><a href="service-details?name=powerautomate">Microsoft Power Automate</a></li>
			                         <li><a href="service-details?name=virtualagents">Microsoft Power Virtual Agents</a></li>
			                          <li><a href="service-details?name=powerplatform">Microsoft Power Pages</a></li>
			                           <li><a href="service-details?name=dynamics365">Microsoft Dynamics 365</a></li>
			                         <li><a href="service-details?name=roboticprocessing">Robotic Processing Automation</a></li>
			                         <li><a href="service-details?name=sharepointonline">Sharepoint Online</a></li>

			                    </ul>
			                  </li>
			                   <li><a href="service-details?name=freemiums">Freemiums</a></li>
			                   <li>
			                    <a>Managed Services <i class="icofont-rounded-right"></i></a>
			                    <ul class="dropdown">
			                        <li><a href="service-details?name=sqlsupport">SQL Server Support</a></li>
			                        <li><a href="service-details?name=appsupport">Applications Support</a></li>
			                    </ul>

			                  </li>   

			                 
			                  
			                   

			              </ul>
			            </li>

			          <li class="'. getUrl("blog","customer-stories","case-studies").'"><a >Knowledge Hub <i class="icofont-rounded-down"></i></a>
			            <ul class="dropdown">
			              <li><a href="blog">Blog Articles</a></li>
			              <li><a href="customer-stories">Customer Stories</a></li>
			              <li><a href="case-studies">Case Studies</a></li>
						  <li><a href="industries">Industries</a></li>
			              <li><a href="case-studies#white-papers">White Papers</a></li>
						  <li><a href="social-impact">Social Impact</a></li>
						   
			            </ul>
			          </li>
					  <li class="'.getUrl("events").'"><a href="events">Events</a></li>
					  <li class="'.getUrl("industries").'"><a href="industries">Who We Serve</a></li>
					 
					 <li class="'.getUrl("partner","partner").'"><a href="partner">Partners</a></li>
					  <li class="'.getUrl("contact").'"><a  href="contact">Let\'s Talk</a></li>
			          
			        </ul>
			      </nav>
					</div>
					<!--/ End Main Menu -->
				</div>
				<div class="col-lg-2 col-12">
					<div class="get-quote">
						
					</div>
				</div>
			</div>
			</div>
			</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
<body>

';
}

function getFooter() {
$year =  date("Y");
return <<<HTML
<!-- start of searchbar modal -->
<div class="container mt-5">

<!-- The Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header default-background">
            <div class="serach-container col-md-12 col-lg-12">
            	<i style="font-size: 15px!important;" class="fa fa-search icon"></i>
            	<input id="searchInput"  name="name" type="text" placeholder="Search here..."> 
            </div>
             
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body search-results-section">
              <div id="searchResults">
              	 <p>Search results will appear here....</p>
              </div>
            </div>
            
        </div>
    </div>
</div>
</div>

<!-- end of search bar modal -->

<!-- start of cookies section -->
<div id="snackbar" class="snackbar container shadow bg-light">
    <button class="btn-close" aria-label="Close">&times;</button>
    <div class="text-start row">
      <div class="col-md-8">
      <div class="ml-4">
        <h4>We Value Your Privacy</h5>
        <p>We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic. By clicking "Accept All", you consent to our use of cookies, <a class="default-color" href="privacy-policy">see our privacy policy</a>. You can manage your preferences by clicking "customize".</p>
      </div>
       
      </div>
      <div class="col-md-4">
         <div class="modal-buttons mt-3" >
          <button id="acceptAll" class="btn btn-light "> Accept All</button>
          <button data-toggle="modal" data-target="#cookieModal" class="btn btn-outline-secondary bg-dark">Customize</button>
        </div>
      </div>
      
    </div>
</div>
<!-- end of cookies section -->
<!-- Cookies Preferences-->
<div class="modal fade" id="cookieModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cookie Preferences</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="cookie-option">
								    <label class="h5">Essential Cookies</label>
								    <label class="switch">
								        <input type="checkbox" checked disabled>
								        <span class="slider-two round"></span>
								    </label>
								</div>
                <p class="text-muted">These cookies are necessary for the website to function and cannot be switched off.</p>
                
                <div class="cookie-option">
                    <label  class="h5">Performance Cookies</label>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider-two round"></span>
                    </label>
                </div>
                <p class="text-muted">These cookies collect information about how you use the website to help improve its performance.</p>

                <div class="cookie-option">
                    <label  class="h5">Functionality Cookies</label>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider-two round"></span>
                    </label>
                </div>
                <p class="text-muted">These cookies remember your preferences and provide enhanced, personalized features.</p>

                <div class="cookie-option">
                    <label  class="h5">Targeting/Advertising Cookies</label>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider-two round"></span>
                    </label>
                </div>
                <p class="text-muted">These cookies are used to deliver ads more relevant to you and your interests.</p>

                <div class="cookie-option">
                    <label  class="h5">Analytics Cookies</label>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider-two round"></span>
                    </label>
                </div>
                <p class="text-muted">These cookies help website owners understand how visitors interact with the site.</p>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveAllPreferences">Save Preferences</button>
            </div>

        </div>
    </div>
</div>

  <div class="linkedin-follow-float">
    <!-- LinkedIn Follow Company Plugin -->
    <script src="https://platform.linkedin.com/in.js" type="text/javascript">
      lang: en_US
    </script>
    <script type="IN/FollowCompany" data-id="22310926" data-counter="bottom"></script>
  </div>

 



<!-- End Cookies Preferences -->
<!-- Footer Area -->
<footer id="footer" class="footer ">
<!-- Footer Top -->
<div class="footer-top">
<div class="container">
<div class="row">
<div class="col-lg-2 col-md-6 col-12">
	<div class="single-footer">
		<h2 class="footer-logo-font">armely</h2>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<ul class="text-light">
					<li><a href="privacy-policy"><i class="fa fa-caret-right" aria-hidden="true"></i> Privacy Policy</a></li>
					<li><a href="customer-stories"><i class="fa fa-caret-right mt-2" aria-hidden="true"></i> Customer Stories</a></li>
					<li><a href="blog"><i class="fa fa-caret-right mt-2" aria-hidden="true"></i> Blog Articles</a></li>
					<li><a href="industries"><i class="fa fa-caret-right mt-2" aria-hidden="true"></i> Industries</a></li>
				</ul>
			</div>
		</div>
		
	</div>
</div>
<div class="col-lg-2 col-md-6 col-12">
	<div class="single-footer f-link">
		<h2>About</h2>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<ul>
					<li><a href="case-studies"><i class="fa fa-caret-right" aria-hidden="true"></i>Case Studies</a></li>
					<li><a href="career"><i class="fa fa-caret-right" aria-hidden="true"></i>Job Board</a></li>
					<li><a href="company"><i class="fa fa-caret-right" aria-hidden="true"></i>Company Overview</a></li>
					<li><a href="blog"><i class="fa fa-caret-right" aria-hidden="true"></i>Blog Articles </a></li>	
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-2 col-md-6 col-12">
	<div class="single-footer f-link">
		<h2>Services</h2>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<ul>
					<li><a href="services"><i class="fa fa-caret-right" aria-hidden="true"></i>Data Services</a></li>
					<li><a href="services"><i class="fa fa-caret-right" aria-hidden="true"></i>Advisory Services</a></li>
					<li><a href="services"><i class="fa fa-caret-right" aria-hidden="true"></i>Managed Services</a></li>
					<li><a href="services"><i class="fa fa-caret-right" aria-hidden="true"></i>Artificial intelligence</a></li>	
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-3 col-md-6 col-12">
	<div class="single-footer f-link">
		<h2>Contact Us</h2>
		<ul>
			<li><a href="tel: +1 972 460 0643" target="_blank"><i class="fa fa-phone" aria-hidden="true" ></i> +1 972 460 0643</a></li>
			<li><a href="https://maps.app.goo.gl/YaMkStLJ6eKwAQ2c7" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i>17400 Dallas Pkwy, Suite 111 Dallas, TX 75287</a></li>
			<li><a href="mailto:info@armely.com" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i><span class="lowercase">info@armely.com</span></a></li>
		</ul>
	</div>
</div>
<div class="col-lg-3 col-md-6 col-12">
	<div class="single-footer">
		<h2>Follow Us</h2>
		<ul class="social">
			<li><a href="https://www.linkedin.com/company/armely/mycompany/" target="_blank"><i class="icofont-linkedin"></i></a></li>
			<li><a href="https://github.com/armely" target="_blank"><i class="icofont-github"></i></a></li>
			<li><a href="https://twitter.com/armelyData" target="_blank"><i class="icofont-twitter"></i></a></li>
			<li><a href="https://www.youtube.com/@armelyarmely" target="_blank"><i class="icofont-youtube"></i></a></li>
			<li><a href="https://www.instagram.com/armelyconsulting/" target="_blank"><i class="icofont-instagram"></i></a></li>
		</ul>
	</div>
</div>
</div>
</div>
</div>
<!--/ End Footer Top -->
<!-- Copyright -->
<div class="copyright">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-12">
	<div class="copyright-content">
		<p>&copy;  $year  ARMELY LLC., ALL RIGHTS RESERVED</p>

	</div>
</div>
</div>
</div>
</div>
<!--/ End Copyright -->
</footer>
<!--/ End Footer Area -->



<!-- jquery Min JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- jquery Migrate JS -->
<script src="js/jquery-migrate-3.0.0.js"></script>
<!-- jquery Ui JS -->
<script src="js/jquery-ui.min.js"></script>
<!-- Easing JS -->
<script src="js/easing.js"></script>
<!-- Color JS -->
<script src="js/colors.js"></script>
<!-- Popper JS -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap Datepicker JS -->
<script src="js/bootstrap-datepicker.js"></script>
<!-- Jquery Nav JS -->
<script src="js/jquery.nav.js"></script>
<!-- Slicknav JS -->
<script src="js/slicknav.min.js"></script>
<!-- ScrollUp JS -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- Niceselect JS -->
<script src="js/niceselect.js"></script>
<!-- Tilt Jquery JS -->
<script src="js/tilt.jquery.min.js"></script>
<!-- Owl Carousel JS -->
<script src="js/owl-carousel.js"></script>
<!-- counterup JS -->
<script src="js/jquery.counterup.min.js"></script>
<!-- Steller JS -->
<script src="js/steller.js"></script>
<!-- Wow JS -->
<script src="js/wow.min.js"></script>
<!-- Magnific Popup JS -->
<script src="js/jquery.magnific-popup.min.js"></script>
<!-- Counter Up CDN JS -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4301EZWQ4C"></script>
<!-- Bootstrap JS -->

<!-- Main JS -->
<script src="js/main.js"></script>
<!-- sweet alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
<!-- JavaScript Libraries -->
<!-- Recommended -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.10/js/hoverIntent.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.10/js/superfish.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- more settings  -->

<script src="js/more-options9.js"></script>


</body>
</html>
HTML;
}

?>
