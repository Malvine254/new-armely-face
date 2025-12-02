<?php include 'php/actions.php'; include 'php/header_footer.php'; if (isset($_GET['job-details'])) {}else{header('location:career');}
?>
<link rel="stylesheet" href="css/job-board-modern.css">

<!-- Start of Header Area -->
<?php  echo getHeader("job board"); ?>
<!-- End Header Area -->

<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Job Board</h2>
							<ul class="bread-list">
								<li><a href="/">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Job Board</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

<section>   
<!-- Floating Action Button -->
   <div class="floating-btn">
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

<!-- Job Details Section -->
<section class="job-details-section mt-5 pb-5 pt-5">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                    <div class="card job-details-card">
                        <div class="card-body p-4">
                            <?php displayJobDescriptions(); ?>
                        </div>
                    </div>
            </div>
            

       <!-- Floating Action Button -->
       <div class="floating-btn">
        <button id="myBtn"  style="border-radius: 50%; height: 70px; width: 70px; background-color: rgb(47,85,151);"  type="button" class="btn btn-primary btn-lg">
          <i class="fas fa-comments"></i>
        </button>
      </div>
     
            </div>
        </div>
</div>	
</section>	
<!--/ End Pricing Table -->


<!-- Start Appointment -->
<section class="appointment">
<div class="container">
<div class="row">
<div class="col-lg-12">

<div class="section-title modern-section-title">
	<div class="title-head">
		<h2 class="mt-3" id="consultation">Schedule a consultation today</h2>
	</div>
	<center><hr class="hr default-background"></center>
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
				<input required class="remove-input-background" name="organization" type="text" placeholder="Organization Name">
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-12">
			<label class="text-start text-light">Message *</label>
			<div class="form-group">
				<textarea required class="remove-input-background" name="message" placeholder="Write Your Message Here....."></textarea>
			</div>
		</div>
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
<!-- End Appointment -->

</section>
<!--/ End Pricing Table -->

<?php echo getFooter(); ?>