<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("company"); ?>
<!-- End Header Area -->
<style>
  h3 {
      color: #2c3e50;
    }
    .section {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 30px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    ul {
      list-style-type: "" !;
      margin-left: 20px;
    }
    .coffee ul {
      list-style-type: "";
    }
    .icon {
      font-size: 1.5rem;
      margin-right: 10px;
    }
  </style>
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
   
    <div class="col-md-3">
      <img width="250" height="250"  class="img-fluid" src="images/affiliation/mbe.svg">
    </div>
    <div class="col-md-3">
      <img width="250" height="250" class="img-fluid" src="images/affiliation/smb.svg">
    </div>
    <div class="col-md-3 ">
      <img width="200" height="200"  class="img-fluid mt-5" src="images/affiliation/affliation1.png">
    </div>
    <div class="col-md-3 ">
      <img width="200" height="200"  class="img-fluid mt-5" src="images/affiliation/fid.png">
    </div>
     <div class="col-md-3">
      <img   class="img-fluid mt-4" src="images/affiliation/partner.png">
    </div>
   
</center>
</div>
</div>
</div>
</section>
<!--/ End portfolio -->
<!-- strat of  -->
<section class="pricing-table p-5">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
  <h2>Our Demo Entities</h2>
    <center><hr class="default-background hr" ></center>
   
</div>
 <div class="container py-5">
  <div class="row g-4">

    <!-- Mela Card -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <img src="images/logo/mela-logo.jpg" alt="Mela Logo" width="60" class="me-3 rounded p-1" />
            <h5 class="card-title mb-0">Mela – Your AI CoPilot</h5>
          </div>
          <p><strong>Mela</strong> is a fictitious representative of an Artificial Intelligence organization used by <strong>Armely</strong> to demonstrate technical examples.</p>
          <p>It showcases how organizations embed AI in workflows—from building copilots with <strong>Copilot Studio</strong> to deploying machine learning and generative AI solutions.</p>
          <h6 class="mt-3">Use Cases Demonstrated:</h6>
          <ul class="list-unstyled">
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> Copilot Studio development</li>
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> Retrieval-Augmented Generation (RAG)</li>
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> Natural Language Processing (NLP)</li>
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> AI governance and security</li>
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> Azure OpenAI integration</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Step & Sip Card -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <img src="images/logo/logo-step.png" alt="Step & Sip Logo" width="50" class="me-3 rounded m-1" />
            <h5 class="card-title mb-0">Step & Sip – The Data-Driven Coffee Company</h5>
          </div>
          <p><strong>Step & Sip</strong> is a fictitious brand used by <strong>Armely</strong> to showcase modern data practices through a retail lens.</p>
          <p>We demonstrate how coffee and data blend through real-time insights, automation, and intelligence—powered by <strong>Microsoft Fabric</strong> and <strong>Power Platform</strong>.</p>
          <h6 class="mt-3">Use Cases Demonstrated:</h6>
          <ul class="list-unstyled">
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> Microsoft Fabric Lakehouse architecture</li>
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> Power BI dashboards and insights</li>
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> Customer segmentation and behavior</li>
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> Inventory and sales forecasting</li>
            <li><i class="default-color fa-solid fa-circle-check text-success me-2"></i> Workflow automation with Power Automate</li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>

<style>
  img.rounded {
    border-radius: 8px;
    object-fit: contain;
  }
  h5.card-title {
    font-weight: 600;
  }
  .card-body ul li {
    margin-bottom: 8px;
    font-size: 0.95rem;

  }
</style>




</div>
</div>

</div>
<div class="d-flex justify-content-center ">
    <!-- <button type="button" class="btn default-button col-md-1 col-sm-6">View More</button> -->
</div>  
</section>

<!-- Start service -->
<section class="services">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title p-3">
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