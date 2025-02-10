<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("404"); ?>
<!-- End Header Area -->
		
<!-- Error Page -->
<section class="error-page section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-12">
				<!-- Error Inner -->
				<div class="error-inner">
					<h1>404<span>Oop's  sorry we can't find that page!</span></h1>
					<p><a href="index" class="btn btn-primary text-light">Back to Home Page</a></p>
					
				</div>
				<!--/ End Error Inner -->
			</div>
		</div>
	</div>
</section>	
<!--/ End Error Page -->
<?php echo getFooter(); ?>