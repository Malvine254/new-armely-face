<?php include 'php/actions.php'; include 'php/header_footer.php';if (isset($_GET['job-details'])) {}else{header('location:career');}?>

<!-- Start of Header Area -->
<?php  echo getHeader("applications"); ?>
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

<!-- Start Appointment -->
<section class="appointment mt-0">
<div class="container">
    <?php if (isset($_GET['job-details']) && $_GET['application']=='true' && $_GET['application']!="" && $_GET['title']!="" && isset($_GET['title'])): ?>
        <div class="row">
<div class="col-lg-12 col-md-8 col-12 d-flex text-center default-background mb-5">
<form class="form p-4" id="job-form" method="post" enctype="multipart/form-data">
    <h2 class="text-light mt-2 mb-3">Complete the following form</h2>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group input-with-background">
                <input id="name" required class="remove-input-background" name="name" type="text" placeholder="Name">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <input id="email" required class="remove-input-background" name="email" type="email" placeholder="Email">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <input id="phone" required class="remove-input-background" name="phone" type="text" placeholder="Phone">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <input id="address" required class="remove-input-background" name="address" type="text" placeholder="Address">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <input id="city" required class="remove-input-background" name="city" type="text" placeholder="City">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <input id="zip" required class="remove-input-background" name="zip" type="text" placeholder="Zip Code">
            </div>
        </div>
         <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <input id="state" required class="remove-input-background" name="state" type="text" placeholder="State">
            </div>
        </div>
         <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <input id="cv" required class="remove-input-background p-2" name="cv" type="file" accept=".pdf" placeholder="Zip Code">
            </div>
            
        </div>
        <div class="col-lg-6 col-md-4 col-12">
            <div class="form-group">
                <select required name="type"   class="form-control remove-input-background" id="type" placeholder="Organization Name">
          <option value="Data Services">Full Time</option>
          <option value="Web Development">Part Time</option>
         
      </select>
            </div>
        </div>
        
                     
    <div class="col-lg-6 col-md-4 col-12">
        <div class="form-group">
            <select disabled required name="position"  class="form-control remove-input-background" id="position">
                <option selected ><?php echo addslashes($_GET['title']);
 ?></option> 
              
             
            </select>
            </div>
    </div>
        <div class="form-group ml-3">
            <div class="button">
                <button type="submit" name="submit_consultation_form" class="btn btn-light text-light">Complete Application</button>
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
<?php endif ?>



</div>
</section>
<!-- End Appointment -->

<?php echo getFooter(); ?>
</body>
</html>