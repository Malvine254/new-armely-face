<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("company"); ?>
<!-- End Header Area -->

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Company</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Company</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<section class="pricing-table p-5">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
  <h2>Our Story</h2>
    <center><hr class="default-background hr" ></center>
   
</div>
 <p style="font-size: 16px; ">What started as a small operation serving a single client has blossomed into a thriving enterprise delivering a wide range of cutting-edge solutions. Our company began humbly in January 2017, providing specialized data management services to local businesses. However, it wasn't long before word of our expertise and personalized approach spread, leading to rapid growth. 
 </p><br>
 <p style="font-size: 16px;">Today, we proudly serve over 50 clients across multiple industries, offering innovative capabilities in data analytics, artificial intelligence, digital collaboration tools, and large-scale digital transformation projects. This remarkable expansion has been fueled by strategic partnerships with leading technology providers, allowing us to integrate best-in-class solutions and stay at the forefront of the ever-evolving business landscape.</p><br>
 <p style="font-size: 16px;"> Our goal is to become an extension of your team, striving to be a trusted strategic partner that helps you navigate complex challenges and unlock new opportunities. Through our collaborative approach and commitment to delivering measurable results, we've become a trusted advisor to organizations seeking to harness the power of data, automation, and digital enablement. Our story is one of humble beginnings, tireless innovation, and a relentless pursuit of client success.</p>
</div>
</div>

</div>
<div class="d-flex justify-content-center ">
    <!-- <button type="button" class="btn default-button col-md-1 col-sm-6">View More</button> -->
</div>  
</section>  

<!-- Start portfolio -->
<section class="portfolio" >
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
  <h2 class="mt-5">Our Affiliations</h2>
  <center><hr class="default-background hr" ></center>
</div>
</div>
</div>
</div>
<div class="container-fluid col-lg-10">
<div class=" ">
<center>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3">
      <img width="250" height="250"  class="img-fluid" src="images/affiliation/mbe.svg">
    </div>
    <div class="col-md-3">
      <img width="250" height="250" class="img-fluid" src="images/affiliation/smb.svg">
    </div>
    <div class="col-md-3 ">
      <img width="200" height="200"  class="img-fluid mt-5" src="images/affiliation/affliation1.png">
    </div>
    <div class="col-md-2"></div>
</center>
</div>
</div>
</div>
</section>
<!--/ End portfolio -->
<!-- Start service -->
<section class="services">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
  <h2>Our Values</h2>
    <center><hr class="default-background hr" ></center>
</div>
</div>
</div>
<div class="row">
    
<!-- Start Single Service -->
<?php displayCoreValues(); ?>
<!-- End Single Service -->

</div>
</div>
</section>
<!--/ End service -->

<?php echo getFooter(); ?>