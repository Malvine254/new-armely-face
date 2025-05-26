<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("contact"); ?>
<!-- End Header Area -->
	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs-contact overlay">
			<div class="container">
				<div class="bread-inner" >
					<div class="row">
						<div class="col-12">
							<h2>Contact Us</h2>
							<ul class="bread-list">
								<li><a href="/">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Contact Us</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
<!-- Start Contact Us -->
<section class="contact-us section ">
<div class="container col-12 col-lg-8 col-md-11">
	<div class="inner">
		<div class="row"> 
			<div class="col-lg-12">
				<div class="contact-us-form">
					<h2>Contact With Us</h2>
					<p>If you have any questions please feel free to contact with us.</p>
					<!-- Form -->
					<form class="form" id="contact-form" method="post">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" name="name" placeholder="Name" required="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="email" name="email" placeholder="Email" required="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" name="phone" placeholder="Phone" required="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" name="subject" placeholder="Subject" required="">
								</div>
							</div>
								<div class="col-lg-12">
								<div class="form-group">
									<input type="text" name="organization" placeholder="Organization" required="">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<textarea name="message" placeholder="Your Message" required=""></textarea>
								</div>
							</div>
							 <!-- Honeypot field (hidden from humans) -->
 							 <input style="display: none;" type="text" name="website" class="honeypot">
 							 
							<div class="col-md-2 col-sm-6">
								<div class="form-group login-btn">
									<button name="submit_form" class="btn default-background" type="submit">Send</button>
								</div>
							</div>
						</div>
					</form>
					<!--/ End Form -->
				</div>
			</div>
		</div>
	</div>
	<div class="contact-info">
		<div class="row">
			<!-- single-info -->
			<div class="col-lg-4 col-12 ">
				<div class="single-info">
					<i class="icofont icofont-ui-call"></i>
					<div class="content">
						<h3>+(1)  972 460 0643</h3>
						<p>info@armely.com</p>
					</div>
				</div>
			</div>
			<!--/End single-info -->
			<!-- single-info -->
			<div class="col-lg-4 col-12 ">
				<div class="single-info">
					<i class="icofont-google-map"></i>
					<div class="content">
						<h3>17400 Dallas Pkwy</h3>
						<p>Suite 111 Dallas, TX 75287</p>
					</div>
				</div>
			</div>
			<!--/End single-info -->
			<!-- single-info -->
			<div class="col-lg-4 col-12 ">
				<div class="single-info">
					<i class="icofont icofont-google-map"></i>
					<div class="content">
						<h3>Nairobi, Kenya</h3>
						<p>Highpoint</p>
					</div>
				</div>
			</div>
			<!--/End single-info -->
		</div>
	</div>
</div>
</section>
<!--/ End Contact Us -->

<?php echo getFooter(); ?>