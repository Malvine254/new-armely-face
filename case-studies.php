<?php include 'php/actions.php'; include 'php/header_footer.php';?>
<link rel="stylesheet" href="css/case-studies-modern.css">

<!-- Start of Header Area -->
<?php  echo getHeader("case studies"); ?>
<!-- End Header Area -->
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Case Studies & Resources</h2>
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



<!-- Case Studies Section -->
<section class="case-studies-section">
<div class="container">
	<!-- <div class="row">
		<div class="col-lg-12">
			<div class="section-header">
				<div class="section-badge">
					<i class="icofont-briefcase"></i> Case Studies
				</div>
				<h2 class="section-title">Success Stories</h2>
				<p class="section-subtitle">See how our solutions have delivered measurable impact</p>
			</div>
		</div>
	</div> -->
</div>
<div class="container">
	<div class="row">
		<?php displayRecentIndustryListingsAll(); ?>
	</div>
</div>
</section>

<!-- White Papers Section -->
<section class="white-papers-section">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="section-header">
				<div class="section-badge">
					<i class="icofont-document-multiple"></i> Resources
				</div>
				<h2 class="section-title">White Papers</h2>
				<p class="section-subtitle">In-depth insights and strategic guidance for digital transformation</p>
				<div class="section-divider"></div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<?php displayWhitePaperListings(); ?>
	</div>
</div>
</section>

<?php echo getFooter(); ?>