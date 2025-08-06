<?php include 'php/actions.php';?>

<!-- Start of Header Area -->
<?php  include 'php/header_footer.php';echo getHeader("Home"); ?>
<!-- End Header Area -->
<!-- Slider Area -->
<section class="slider">
<div class="hero-slider">
<!-- Start Single Slider -->
<div class="single-slider" style="background-image:url('images/sliders/slider-1.webp')">
<div class="container">
<div class="row">
	<div class="col-lg-7">
		<div class="text">
			<h1><span class="text-light">Your Trusted Source For Digital Excellence</span>  </h1>
			<p class="text-light">Beyond Imagination </p>
			<div class="button">
				<a href="services#consultation-form" class="btn">Get Appointment</a>
				<a href="company" class="btn primary">Learn More</a>
			</div>
		</div>
	</div>
</div>
</div> 
</div>
<!-- End Single Slider -->
<!-- Start Single Slider -->
<div class="single-slider lazy-bg" data-bg="images/sliders/slider-2.webp">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="text">
                    <h1><span class="text-light"> We Provide AI Services That You Can Trust!</span></h1>
                    <p class="text-light">Beyond Imagination</p>
                    <div class="button">
                        <a href="services#consultation-form" class="btn">Get Appointment</a>
                        <a href="company" class="btn primary">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Single Slider -->

<!-- Start Single Slider --> 
<div class="single-slider lazy-bg" data-bg="images/sliders/slider-3.webp">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="text">
                    <h1><span class="text-light">We Provide Data Services That You Can Trust!</span></h1>
                    <p class="text-light">Beyond Imagination</p>
                    <div class="button">
                        <a href="services#consultation-form" class="btn">Get Appointment</a>
                        <a href="contact" class="btn primary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Single Slider -->

</div>
</section>
<!--/ End Slider Area -->

<!-- Start Schedule Area -->
<section class="schedule">
<div class="container">
<div class="schedule-inner">
<div class="row">

<?php displayCustomerStoriesTestimonialsShort(); ?>
</div>
</div>
</div>
</section>
<!--/End Start schedule Area -->
<!-- start of our brand -->
 <section id="clients" class="wow fadeInUp mt-4 mb-4 blog">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title"><b>Our Trusted Brand Partners</b><center><hr class="default-background hr" ></center></h2>

         	<p class="text-center">We’re proud to work alongside some truly trusted brands. Together, we’re focused on delivering real value, innovation, and quality. A huge thank you to our partners for their ongoing support and commitment to excellence./p>
        </div> 


        <div class="owl-carousel clients-carousel partner-carousel">
          <div class="m-4">
            <a href="images/brand-partners/university_of_nebrask.png" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/university_of_nebrask.png" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
           <div class="m-4">
            <a href="images/brand-partners/swope_health.png" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/swope_health.png" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
          <div class="m-4">
            <a href="images/brand-partners/esse_health.jpg" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/esse_health.jpg" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
           <div class="m-4">
            <a href="images/brand-partners/sage_bute.webp" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/sage_bute.webp" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
          <div class="m-4">
            <a href="images/brand-partners/qb_energy.jpg" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/qb_energy.jpg" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
           <div class="m-4">
            <a href="images/brand-partners/frisco.jpeg" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/frisco.jpeg" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
           <div class="m-4">
            <a href="images/brand-partners/dallas_county.jpg" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/dallas_county.jpg" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
           <div class="m-4">
            <a href="images/brand-partners/lambda.png" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/lambda.png" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
          <div class="m-4">
            <a href="images/brand-partners/homeward_bound.png" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/homeward_bound.png" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
          <div class="m-4">
            <a href="images/brand-partners/mhc.png" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/mhc.png" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
           <div class="m-4">
            <a href="images/brand-partners/bnsf.png" target="_blank" rel="noopener noreferrer">
                <img src="images/brand-partners/bnsf.png" alt="Partner Logo" class="img-fluid lazy-img">
            </a>
          </div>
        </div>
      </div>
      

    </section>
<!-- Start case studies -->
<section class="portfolio" >
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title mt-5">
	<h2>Case Studies</h2>
	<center><hr class="default-background hr" ></center>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-12">
<div class="owl-carousel portfolio-slider ">
	
	<?php displayRecentIndustryListings() ?>
	
</div>
</div>
</div>
<div class="default-color h4 p-2">
		<a class="animated-text" href="case-studies"><strong>Explore all Case Studies >>></strong></a>
	</div>
</div>
</section>
<!--/ End portfolio -->


   <section id="clients" class="wow fadeInUp blog">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title"><b>Our Partners</b><center><hr class="default-background hr" ></center></h2>

         	<p class="text-center">Your Reliable Hub for Digital Excellence, Committed to Caring, Building Relationships, Backed by Industry Expertise and Recognized for Award-Winning Achievements.</p>
        </div> 


        <div class="owl-carousel clients-carousel partner-carousel">
          <?php echo displayPartnersLogo(); ?>
        </div>
      </div>
      

    </section>

<!--/Ens clients -->
<!-- Start Fun-facts -->
<div  id="fun-facts" class="fun-facts default-background section overlay">
<div class="container default-background">
<div class="row">
<div class="col-lg-4 col-md-6 col-12">
<!-- Start Single Fun -->
<div class="single-fun">
	<i class="icofont icofont-ui-user-group"></i>
	<div class="content">
		<span class="counter plus">72</span>
		<p>Customer Retention Rate</p>
	</div>
</div>
<!-- End Single Fun -->
</div>
<div class="col-lg-4 col-md-6 col-12">
<!-- Start Single Fun -->
<div class="single-fun">
	<i class="icofont icofont-users-social"></i>
	<div class="content">
		<span class="counter percent">82</span>
		<p>Customer Satisfaction</p>
	</div>
</div>
<!-- End Single Fun -->
</div>
<div class="col-lg-4 col-md-6 col-12">
<!-- Start Single Fun -->
<div class="single-fun">
	<i class="icofont-simple-smile"></i>
	<div class="content">
		<span>Very Easy</span>
		<p>Customer Effort Score</p>
	</div>
</div>
<!-- End Single Fun -->
</div>
<div class="col-lg-4 col-md-6 col-12">

</div>
</div>
</div>
</div>
<!--/ End Fun-facts -->
<!-- Start Blog Area -->
<section class="blog section" id="blog">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
	<h2>Our Most Recent Blog Articles.</h2>
		<center><hr class="default-background hr" ></center>
</div>
</div>
</div>
<div class="row " >

<!-- Single Blog -->
<?php displayRecentBlogs(); ?>

<!-- End Single Blog -->

</div>
	<div class="default-color h4 p-2">
		<a class="animated-text" href="blog"><strong>Explore all Blogs >>></strong></a>
	</div>
</div>
</section>
<!-- End Blog Area -->


<!-- Pricing Table -->
<section class="">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
	<h2	>See Our Most Recent Videos</h2>
		<center><hr class="default-background hr" ></center>
</div>
</div>
</div>
<div class="row">
<!-- Single Table -->

<?php displayYoutubeVideos(); ?>
</div>	
<div class="default-color h4 p-2">
		<a class="animated-text" href="https://www.youtube.com/@armelyarmely"><strong>Explore all Videos >>></strong></a>
	</div>
</div>	
</section>	
<!--/ End Pricing Table -->

<!-- Start Appointment -->
<section class="appointment">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
	<h2>Contact Us</h2>
	<center><hr class="default-background hr" ></center>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-6 col-12 d-flex default-background mb-5">
<form class="form p-5" id="contact-form" method="post">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-12">
			<label class="text-start text-light">Name *</label>
			<div class="form-group input-with-background">
				<input required class="remove-input-background" name="name" type="text" placeholder="Name">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-12">
			<label class="text-start text-light">Email *</label>
			<div class="form-group">
				<input required class="remove-input-background" name="email" type="email" placeholder="Email">
			</div> 
		</div>
		<div class="col-lg-6 col-md-6 col-12">
			<label class="text-start text-light">Phone Number *</label>
			<div class="form-group">
				<input required class="remove-input-background" name="phone" type="text" placeholder="Phone">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-12">
			<label class="text-start text-light">Orginazation Name *</label>
			<div class="form-group">
				<input required class="remove-input-background" name="organization" type="text" placeholder="Orginazation Name">
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-12">
			<label class="text-start text-light">Message *</label>
			<div class="form-group">
				<textarea required class="remove-input-background" name="message" placeholder="Write Your Message Here....."></textarea>
			</div>
		</div>
		 <!-- Honeypot field (hidden from humans) -->
		 <input style="display: none;" type="text" name="website" class="honeypot">
		 <div class="col-lg-12">
			<div class="form-group">
				<label class="text-start text-light">Confirm you are not a robot *</label>
				<div class="g-recaptcha" data-sitekey="6Ld0Z0krAAAAAFCwIDiunmU9l68kT4Vm2cB7U7px"></div>
			</div>
		</div>
		<div class="form-group ml-3">
			<div class="button">
				<button type="submit" class="btn send-message-btn" name="submit_form">Send Message</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5 col-md-4 col-12">
			
		</div>
	</div>
</form>
</div>
</div>

</div>
</section>
<!-- End Appointment -->
<?php echo getFooter(); ?>
