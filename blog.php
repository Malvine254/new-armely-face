<?php include 'php/actions.php'; ?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>blog</title>
		
		<!-- Favicon -->
       <link rel="icon" href="img/logo/logo1.png">
		
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
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
    </head>
    <body>
	
		<!-- Preloader -->
        <!-- <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div> -->
        <!-- End Preloader -->
		
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
		    <iframe src="https://copilotstudio.microsoft.com/environments/Default-588cadf4-9902-4465-86c0-8bcf04f4f102/bots/crc65_armelyCom/webchat?__version__=2"
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
						<div class="col-lg-6 col-md-5 col-12">
							<!-- Contact -->
							<!-- <ul class="top-link">
								<li><a href="#">About</a></li>
								<li><a href="#">Doctors</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">FAQ</a></li>
							</ul> -->
							<!-- End Contact -->
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">
								<li><i class="fa fa-phone"></i>+1 972 460 0643</li>
								<li><i class="fa fa-envelope"></i><a href="mailto:info@armely.com">info@armely.com</a></li>
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
	<div class="col-lg-3 col-md-3 col-12">
		<!-- Start Logo -->
		<div class="logo">
			<a href="index"><img style="max-height: 60px; height: auto;" src="img/logo/logo.svg" class="pb-2" alt="#"></a>
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
					<li class=""><a >Why Us <i class="icofont-rounded-down"></i></a>
						<ul class="dropdown">
							<li><a href="company">Company Overview</a></li>
							<li><a href="career">Career Opportunities</a></li>
						</ul>
					</li>
					<li><a>Services <i class="icofont-rounded-down"></i></a>
					    <ul class="dropdown">
					        <li><a href="services">All Services</a></li>
					        <li>
					            <a >Data Services <i class="icofont-rounded-right"></i></a>
					            <ul class="dropdown">
					                <li><a href="service-details?name=fabric">Fabric</a></li>
					                <li><a href="service-details?name=data-science">Data Science and Analytics</a></li>
					                <li><a href="service-details?name=data-strategy">Data Strategy</a></li>
					            </ul>
					        </li>
					        <li>
					        	<a >AI Services <i class="icofont-rounded-right"></i></a>
					        	<ul class="dropdown">
					                <li><a href="service-details?name=ai-consulting">AI Consulting</a></li>
					                <li><a href="service-details?name=ai-advisory">AI Advisory</a></li>
					                <li><a href="service-details?name=generative-ai">Generative AI</a></li>
					            </ul>

					        </li>
					        <li>
					        	<a>Freemiums <i class="icofont-rounded-right"></i></a>
					        	<ul class="dropdown">
					                <li><a href="service-details?name=sql">SQL Health Check</a></li>
					                <li><a href="service-details?name=coe">Power Platform COE</a></li>
					            </ul>

					        </li>
					    </ul>
					</li>
					<li><a >Insights <i class="icofont-rounded-down"></i></a>
						<ul class="dropdown">
							<li><a href="blog">Blog Articles</a></li>
							<li><a href="customer-stories">Customer Stories</a></li>
							<li><a href="case-studies">Case Studies</a></li>
						</ul>
					</li>
					<li><a href="industries">Industries</a></li>
					<li><a href="contact">Contact Us</a></li>
					<li><a  >
						<i data-toggle="modal" data-target="#exampleModal" style="display: block !important;" class="fa fa-search p-1"></i>	
					 </a>
					</li>
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
		
		<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Blogs</h2>
							<ul class="bread-list">
								<li><a href="index">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Blogs</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Single News -->
		<section class="news-single section">
			<div class="container col-lg-11">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="row">
							<div class="col-12">

							<div >
								<?php if (isset($_GET['blogId'])) {
								displayBlogFullDetals();
							} else{
								selectblogByDefault();
							}

							?>
							</div>



							</div>

						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
							<div class="single-widget search">
								<div class="form">
									<input id="searchBar" type="email" placeholder="Search Here...">
									<a class="button default-background" href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>
							<!--/ End Single Widget -->
							
							<!-- Single Widget -->
							<div class="single-widget recent-post">
								<h3 class="title">Recent post</h3>
								<!-- Single Post -->
								<p style="display: none;" class="alert alert-danger" id="noResults">No results found!!</p>
								<?php displayRecentBlogsOthers() ?>
								<!-- End Single Post -->
								
								
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget side-tags">
								<h3 class="title">Tags</h3>
								<ul class="tag">
									<li><a href="#">business</a></li>
									<li><a href="#">wordpress</a></li>
									<li><a href="#">html</a></li>
									<li><a href="#">multipurpose</a></li>
									<li><a href="#">education</a></li>
									<li><a href="#">template</a></li>
									<li><a href="#">Ecommerce</a></li>
								</ul>
							</div>
							<!--/ End Single Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Single News -->
		<!-- start of searchbar modal -->
<div class="container mt-5">

<!-- The Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header default-background">
            <div class="serach-container col-md-12 col-lg-12">
            	<i class="fa fa-search icon"></i>
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
		<!-- Footer Area -->
<footer id="footer" class="footer ">
<!-- Footer Top -->
<div class="footer-top">
<div class="container">
<div class="row">
<div class="col-lg-2 col-md-6 col-12">
	<div class="single-footer">
		<h2>armely</h2>
		
	</div>
</div>
<div class="col-lg-2 col-md-6 col-12">
	<div class="single-footer f-link">
		<h2>About</h2>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<ul>
					<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Case Studies</a></li>
					<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Job Board</a></li>
					<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Company Overview</a></li>
					<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Blog Articles </a></li>	
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
					<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Data Services</a></li>
					<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Advisory Services</a></li>
					<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Managed Services</a></li>
					<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Artificial intelligence</a></li>	
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-3 col-md-6 col-12">
	<div class="single-footer f-link">
		<h2>Contact Us</h2>
		<ul>
			<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> +1 972 460 0643</a></li>
			<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>2831 Eldorado Pkwy Suite 103-128 Frisco TX 75033</a></li>
			<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span class="lowercase">info@armely.com</span></a></li>
		</ul>
	</div>
</div>
<div class="col-lg-3 col-md-6 col-12">
	<div class="single-footer">
		<h2>Follow Us</h2>
		<ul class="social">
			<li><a href="#"><i class="icofont-linkedin"></i></a></li>
			<li><a href="#"><i class="icofont-github"></i></a></li>
			<li><a href="#"><i class="icofont-twitter"></i></a></li>
			<li><a href="#"><i class="icofont-youtube"></i></a></li>
			<li><a href="#"><i class="icofont-instagram"></i></a></li>
		</ul>
	</div>
</div>
</div>
</div>
</div>
<!--/ End Footer Top -->
		
<!-- jquery Min JS -->
<script src="js/jquery.min.js"></script>
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
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- Main JS -->
<script src="js/main.js"></script>
<!-- more settings  -->
<script src="js/more-options.js"></script>
<script type="text/javascript">
	 $(document).ready(function() {
    var characterLimit = 2500; // Set your character limit here
    var blogContent = $('#blog-content').html();
    var pages = [];
    var currentPage = 1;

    function splitContent() {
        var start = 0;
        while (start < blogContent.length) {
            pages.push(blogContent.slice(start, start + characterLimit));
            start += characterLimit;
        }
    }

    function showPage(page) {
        $('#blog-content').html(pages[page - 1]);
        $('#current-page').text(page);
        $('#total-pages').text(pages.length);

        $('#prev-page').prop('disabled', page === 1);
        $('#next-page').prop('disabled', page === pages.length);
    }

    $('#prev-page').click(function() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    $('#next-page').click(function() {
        if (currentPage < pages.length) {
            currentPage++;
            showPage(currentPage);
        }
    });

    // Split content and show initial page
    splitContent();
    showPage(currentPage);
});	
</script>
</body>
</html>