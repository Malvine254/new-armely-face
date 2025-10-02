<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("campaign"); ?>
<!-- End Header Area -->
	
<!-- Breadcrumbs -->
<div class="breadcrumbs-contact overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>AI Campaign</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Campaign</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
				
<!-- Start Campaign Form -->
<section class="contact-us section">
	<div class="container col-12 col-lg-10 col-md-11 col-sm-12">
		<div class="inner">
			<div class="row">
	<div class="col-lg-12 col-md-6 col-12 d-flex default-background mb-5">
        
		<form class="form p-5" id="campaign-form" method="post">
             <h2 class="text-light pt-3 pb-3">AI Campaign Form</h2>
			<div class="row">
               
				<!-- Full Name -->
				<div class="col-lg-6 col-md-6 col-12">
					<label class="text-start text-light">Full Name *</label>
					<div class="form-group input-with-background">
						<input required class="remove-input-background" name="full_name" type="text" placeholder="Enter Full Name">
					</div>
				</div>

				<!-- Business Email -->
				<div class="col-lg-6 col-md-6 col-12">
					<label class="text-start text-light">Business Email *</label>
					<div class="form-group input-with-background">
						<input required class="remove-input-background" name="business_email" type="email" placeholder="Enter Business Email">
					</div>
				</div>

				<!-- Company Name -->
				<div class="col-lg-6 col-md-6 col-12">
					<label class="text-start text-light">Company Name *</label>
					<div class="form-group input-with-background">
						<input required class="remove-input-background" name="company_name" type="text" placeholder="Enter Company Name">
					</div>
				</div>

				<!-- Job Title -->
				<div class="col-lg-6 col-md-6 col-12">
					<label class="text-start text-light">Job Title *</label>
					<div class="form-group input-with-background">
						<input required class="remove-input-background" name="job_title" type="text" placeholder="Enter Job Title">
					</div>
				</div>

				<!-- Industry -->
				<div class="col-lg-6 col-md-6 col-12">
					<label class="text-start text-light">Industry *</label>
					<div class="form-group input-with-background">
                        <input required class="remove-input-background" name="industry" type="text" placeholder="Enter Industry">
						
					</div>
				</div>

				<!-- No. of Employees -->
				<div class="col-lg-6 col-md-6 col-12">
					<label class="text-start text-light">No. of Employees *</label>
					
                    <div class="form-group input-with-background">
                        <input required class="remove-input-background" name="no_of_employees" type="number" placeholder="Enter No. of Employees">
					</div>
				</div>

				<!-- Business Problem -->
				<div class="col-lg-12 col-md-12 col-12">
					<label class="text-start text-light">What specific business problem are you hoping to solve? *</label>
					<div class="form-group input-with-background">
						<textarea required class="remove-input-background" name="business_problem" placeholder="Describe your business challenge..."></textarea>
					</div>
				</div>

				<!-- Desired AI Outcome -->
				<div class="col-lg-12 col-md-12 col-12">
					<label class="text-start text-light">Desired AI Outcome *</label>
					<div class="form-group input-with-background">
						<textarea required class="remove-input-background" name="ai_outcome" placeholder="What outcomes would success look like?"></textarea>
					</div>
				</div>

				<!-- AI/ML Solution Today -->
				
                <div class="col-lg-6 col-md-6 col-12">
                    <label class="text-start text-light d-block mb-2">Does your company use any AI/ML solution today? *</label>
                    <div class=" d-flex align-items-center gap-4">
                        <div class="row">
                           <div class="col-md-6">
                            <input style="background-color: transparent !important; width: 20px; height: 20px;" class="form-control" type="radio" name="ai_usage" id="ai_yes" value="Yes" required>
                            <label class="text-light" for="ai_yes">Yes</label>
                           </div> 
                            <div class="col-md-6">
                            <input style="background-color: transparent !important; width: 20px; height: 20px;" class="form-control" type="radio" name="ai_usage" id="ai_no" value="No" required>
                            <label class="text-light" for="ai_no">No</label>
                           </div> 
                        </div>
                        
                    </div>
                </div>

				<!-- Honeypot field -->
				<input style="display: none;" type="text" name="website" class="honeypot">

				<!-- Recaptcha -->
				<div class="col-lg-12">
					<div class="form-group">
						<label class="text-start text-light">Confirm you are not a robot *</label>
						<div class="g-recaptcha" data-sitekey="6Ld0Z0krAAAAAFCwIDiunmU9l68kT4Vm2cB7U7px"></div>
					</div>
				</div>

				<!-- Submit -->
				<div class="form-group ml-3">
					<div class="button">
						<button type="submit" class="btn btn-light" name="submit_form">Submit Form</button>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-5 col-md-4 col-12"></div>
			</div>
		</form>
	</div>
</div>

		</div>
	</div>
</section>
<!--/ End Campaign Form -->

<?php echo getFooter(); ?>
