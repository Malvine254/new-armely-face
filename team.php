<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("team"); ?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">
<!-- End Header Area -->
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Team</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Team</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
 

<!-- Start service -->
<section class="services mt-5">

<div class="py-5 team4">
  <div class="container">
  	<div class="section-title">
		  <h2>Experienced & Professional Team</h2>
		    <center><hr class="default-background hr" ></center>
		</div>
    <div class="row justify-content-center mb-4">
      <div class="col-md-7 text-center">
        <h6 class="subtitle">You can rely on our amazing features list and also our customer services will be great experience for you without doubt and in no-time</h6>
      </div>
    </div>
    <div class="row">
      <!-- column  -->
      <?php displayTeams(); ?>
      <!-- column  -->
      
     
     
    </div>
  </div>
</div>
</section>
<!--/ End service -->

<?php echo getFooter(); ?>
