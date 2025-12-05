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
	<div class="career-badge-tag">
		<i class="icofont-briefcase"></i> Join Our Team
	</div>
	<h2 class="career-main-title">Find Your Future Here!</h2>
	<div class="title-divider"></div>
	<p class="lead">We're hiring across disciplines. Competitive pay, great benefits, and a collaborative environment. Full-time roles include paid holidays, vacations, performance bonuses, and project-driven incentives.</p>
	<div class="career-stats">
		<div class="stat-item">
			<div class="stat-icon"><i class="icofont-users-alt-4"></i></div>
			<div class="stat-number">500+</div>
			<div class="stat-label">Team Members</div>
		</div>
		<div class="stat-item">
			<div class="stat-icon"><i class="icofont-location-pin"></i></div>
			<div class="stat-number">10+</div>
			<div class="stat-label">Office Locations</div>
		</div>
		<div class="stat-item">
			<div class="stat-icon"><i class="icofont-award"></i></div>
			<div class="stat-number">50+</div>
			<div class="stat-label">Awards Won</div>
		</div>
	</div>
</div>
</div>
</div>

</div>	

</div>
<div class="careers-listing-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="careers-header-wrap">
					<h3 class="openings-title">
						<i class="icofont-folder-open"></i> Current Openings
					</h3>
					<div class="filter-controls">
						<button class="filter-btn active" data-filter="all">
							<i class="icofont-ui-office"></i> All Positions
						</button>
						<button class="filter-btn" data-filter="full-time">
							<i class="icofont-clock-time"></i> Full Time
						</button>
						<button class="filter-btn" data-filter="part-time">
							<i class="icofont-clock-time"></i> Part Time
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="row careers-grid">
<!-- Single Table -->
<?php displayCareerListings(); ?>



<!-- End Single Table-->
				</div>
			</div>
		</div>
	</div>
</div>
</section>	
<!--/ End Pricing Table -->

<script>
// Career filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const careerItems = document.querySelectorAll('.career-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            careerItems.forEach(item => {
                if (filterValue === 'all') {
                    item.style.display = 'block';
                } else {
                    const itemType = item.getAttribute('data-type');
                    if (itemType === filterValue) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        });
    });
});
</script>

<?php echo getFooter(); ?>