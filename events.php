<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("events"); ?>
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
<section class="services mt-5">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
  <h2>Our Events</h2>
    <center><hr class="default-background hr" ></center>
</div>
</div>
</div>
<div class="row">
    
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
            const countdownElements = document.querySelectorAll("[id^='countdown-']");
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

                    el.textContent = `${diffDays}d : ${diffHours}h : ${diffMinutes}m : ${diffSeconds}s`;
                } else {
                    el.textContent = "00d : 00h : 00m : 00s";
                }
            });
        };

        updateCountdown(); // Initial call
        setInterval(updateCountdown, 1000); // Update every second
    });
</script>
<?php echo getFooter(); ?>
