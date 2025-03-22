<?php include 'php/actions.php'; include 'php/header_footer.php'; if (isset($_GET['job-details'])) {}else{header('location:career');}
?>

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

<!-- Pricing Table -->
<section class="pricing-table mt-5 pb-5 pt-5">
<div class="container col-lg-11 col-sm-12">

<div class="container">
        <div class="row">
            <div class="col-md-12" data-aos="fade-fade ">
                    <div class="card p-3 col-sm-12">

                    <?php displayJobDescriptions(); ?> 
                  
                </div> 

            </div>
            

       <!-- Floating Action Button -->
       <div class="floating-btn">
        <button id="myBtn"  style="border-radius: 50%; height: 70px; width: 70px; background-color: rgb(47,85,151);"  type="button" class="btn btn-primary btn-lg">
          <i class="fas fa-comments"></i>
        </button>
      </div>
      <!-- scroll bar -->
      <button  id="scrollToTopBtn" class="btn btn-primary rounded-circle" style="display:none; background: rgb(47,85,151);">
        <i style="font-size: 2em;" class="fa-solid fa-arrow-up"></i>
    </button>  
            </div>
        </div>
</div>	
</section>	
<!--/ End Pricing Table -->


<!-- Start Appointment -->
<section class="appointment mt-0">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
	<h2>Schedule a Consultation Today</h2>
	<center><hr class="default-background hr" ></center>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-6 col-12 d-flex text-center default-background mb-5">
<form class="form p-5" id="consultation-form" method="post">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-12">
			<div class="form-group input-with-background">
				<input required class="remove-input-background" name="name" type="text" placeholder="Name">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-12">
			<div class="form-group">
				<input required class="remove-input-background" name="email" type="email" placeholder="Email">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<div class="form-group">
				<input required class="remove-input-background" name="phone" type="text" placeholder="Phone">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<div class="form-group">
				<input required class="remove-input-background" name="organization" type="text" placeholder="Organization Name">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<div class="form-group">
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