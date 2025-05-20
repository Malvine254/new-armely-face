<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("case studies"); ?>
<!-- End Header Area -->
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Case Studies</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Case Studies</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<!-- Start portfolio -->
<section class="portfolio section" >
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
	<h2>Case Studies</h2>
	<center><hr class="default-background hr" ></center>
</div>
</div>
</div>
</div>
<div class="container-fluid col-lg-9">
<div class=" ">
<div class="row">
<?php displayRecentIndustryListingsAll(); ?>
</div>
</div>
</div>
</section>
<!--/ End portfolio -->

<!-- Start white paper -->
<section class="portfolio bg-light" >
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
	<h2 id="white-papers" class="mt-5">White Papers</h2>
	<center><hr class="default-background hr" ></center>
</div>
</div>
</div>
</div>
<div class="container-fluid col-lg-9">
<div class=" ">
<div class="row">
<?php displayWhitePaperListings(); ?>
</div>
</div>
</div>
</section>
<!--/ End of white paper -->

<?php echo getFooter(); ?>