<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("customer-stories"); ?>
<!-- End Header Area -->
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12 ">
					<h2 class=" mt-5">Customer Stories</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Customer Stories</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Schedule Area -->
<section class="mt-5">
<div class="container">
	<div class="row">
<div class="col-lg-12">
<div class="section-title">
  <h2>Testimonials </h2>
    <center><hr class="default-background hr" ></center>
     <p>Here, you'll find the voices of our satisfied customers sharing their experiences with our products/services. Dive into these authentic reviews to get a glimpse of the quality, reliability, and exceptional service we strive to deliver. Discover why our customers trust us and why you should too</p>
</div>
</div>
</div>
<div class="schedule-inner">
<div class="row">

<?php displayCustomerStoriesTestimonials(); ?>
</div>
</div>
</div>
</section>
<!--/End Start schedule Area -->

<?php echo getFooter(); ?>