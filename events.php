<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("events"); ?>
<link rel="stylesheet" href="css/events-modern.css">
<!-- End Header Area -->
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Events</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Events</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
 
<!-- Start service -->
<section class="services events-section-modern">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title modern-section-title">
  <h2 class="section-heading-modern">Discover Our Events</h2>
  <div class="title-divider"></div>
  <p class="section-description-modern">Stay updated with our latest events, webinars, and workshops designed to empower your business</p>
</div>
</div>
</div>
<div class="row g-4">
    
<!-- Start Single Service -->
<?php displayEvents(); ?>
<!-- End Single Service -->

</div>
</div>
</section>
<!--/ End service -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const updateCountdown = () => {
            const countdownElements = document.querySelectorAll(".countdown-timer");
            const now = new Date();

            countdownElements.forEach(el => {
                const timestamp = parseInt(el.id.split('-')[1]) * 1000; // Convert to milliseconds
                const eventDate = new Date(timestamp);
                const diffTime = eventDate - now;

                if (diffTime > 0) {
                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                    const diffHours = Math.floor((diffTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const diffMinutes = Math.floor((diffTime % (1000 * 60 * 60)) / (1000 * 60));
                    const diffSeconds = Math.floor((diffTime % (1000 * 60)) / 1000);

                    // Update individual time blocks
                    const timeBlocks = el.querySelectorAll('.time-value');
                    if (timeBlocks.length >= 4) {
                        timeBlocks[0].textContent = String(diffDays).padStart(2, '0');
                        timeBlocks[1].textContent = String(diffHours).padStart(2, '0');
                        timeBlocks[2].textContent = String(diffMinutes).padStart(2, '0');
                        timeBlocks[3].textContent = String(diffSeconds).padStart(2, '0');
                    }
                } else {
                    // Event has passed
                    const timeBlocks = el.querySelectorAll('.time-value');
                    timeBlocks.forEach(block => {
                        block.textContent = '00';
                    });
                }
            });
        };

        updateCountdown(); // Initial call
        setInterval(updateCountdown, 1000); // Update every second
    });
</script>
<?php echo getFooter(); ?>
