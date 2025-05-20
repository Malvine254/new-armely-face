<?php include 'php/actions.php';?>
<?php include 'php/header_footer.php';  echo getHeader("services");?>
<!-- Start of Header Area -->
<!-- End Header Area -->

<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Services</h2>
							<ul class="bread-list">
								<li><a href="/">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Services</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->


<!-- Pricing Table -->
<section class="pricing-table mt-5">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title"> 
	<h2>Empowering Your Tech Journey</h2>
		<center><hr class="default-background hr" ></center>
		<p>Our experts provide tailored guidance in areas such as business planning, product development, marketing, financial management, and risk management, ensuring your company's competitiveness and sustainable growth.</p>
</div>
</div>
</div>
<div class="row">
<!-- Single Table -->
<?php displayServicesList(); ?>
<!-- End Single Table-->

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
	<h2 id="consultation-form">Schedule a Consultation Today</h2>
	<center><hr class="default-background hr" ></center>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-6 col-12 d-flex  default-background mb-5">
<form class="form p-5" id="consultation-form-action" method="post">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-12">
			<div class="form-group input-with-background">
				<label class="text-start text-light">Full Name *</label>
				<input required class="remove-input-background" name="name" type="text" placeholder="Name">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-12">
			<div class="form-group">
				<label class="text-start text-light">Email Address *</label>
				<input required class="remove-input-background" name="email" type="email" placeholder="Email">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<div class="form-group">
				<label class="text-start text-light">Phone Number *</label>
				<input required class="remove-input-background" name="phone" type="text" placeholder="Phone">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<div class="form-group">
				<label class="text-start text-light">Organization Name *</label>
				<input required class="remove-input-background" name="organization" type="text" placeholder="Organization Name">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<div class="form-group">
				<label class="text-start text-light">Service of Interest *</label>
				<select required name="service_type"  class="form-control remove-input-background" id="validationServer03" placeholder="Organization Name">
          <option value="" disabled selected>Select Service of Interest</option> 
          <option value="Data Services">Data Services</option>
          <option value="Web Development">Web Development</option>
          <option value="Business Intelligence">Business Intelligence</option>
          <option value="Managed Services">Managed Services</option>
          <option value="Advisory Services">Advisory Services</option>
      </select>
			</div>
		</div>
		
                     
		<div class="col-lg-12 col-md-12 col-12">
			<div class="form-group">
				<label class="text-start text-light">Message  *</label>
				<textarea required class="remove-input-background" name="message" placeholder="Write Your Message Here....."></textarea>
			</div>
		</div>
		<div class="form-group ml-3">
			<div class="button">
				<button type="submit" name="submit_consultation_form" class="btn send-message-btn">Send Message</button>
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