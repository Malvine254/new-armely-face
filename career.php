<?php include 'php/actions.php'; include 'php/header_footer.php';?>
<link rel="stylesheet" href="css/career-modern.css">

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
<div class="section-title modern-section-title">
	<div class="title-head">
		<h2 class="mt-3">Find Your Future Here!</h2>
	</div>
	<center><hr class="default-background hr" ></center>
	<p class="lead">We’re hiring across disciplines. Competitive pay, great benefits, and a collaborative environment. Full-time roles include paid holidays, vacations, performance bonuses, and project-driven incentives.</p>
</div>
</div>
</div>

</div>	

</div>
<div class="d-flex justify-content-center careers-listing-wrap">
	<div class="row col-md-10 col-lg-9">
<!-- Single Table -->
<?php displayCareerListings(); ?>



<!-- End Single Table-->

</div>
</div>
</section>	
<!--/ End Pricing Table -->

<?php echo getFooter(); ?>