<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("career"); ?>
<!-- End Header Area -->

<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Career Opportunities</h2>
							<ul class="bread-list">
								<li><a href="/">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Career</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->


<!-- Pricing Table -->
<section class="pricing-table section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
	<h2>Find Your Future Here!</h2>
		<center><hr class="default-background hr" ></center>
		<p>We are always looking forward to having the right resources join our growing team. We offer competitive pay and benefits along with a great working environment. Our full-time positions offer employment benefits including paid holidays, paid vacations, annual performance bonuses, and project-driven bonuses.</p>
</div>
</div>
</div>

</div>	

</div>
<div class="d-flex justify-content-center ">
    <!-- <button type="button" class="btn default-button col-md-1 col-sm-6">View More</button> -->
    <div class="row col-md-10">
<!-- Single Table -->
<?php displayCareerListings(); ?>



<!-- End Single Table-->

</div>	
</div>	
</section>	
<!--/ End Pricing Table -->

<?php echo getFooter(); ?>