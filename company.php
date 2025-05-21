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
<!-- strat of  -->
<section class="pricing-table p-5">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
  <h2>Our Demo Entities</h2>
    <center><hr class="default-background hr" ></center>
   
</div>
  <div class="section ai">
    <h3>Mela – Your AI Co-Pilot</h3>
    <p>
      <strong>Mela</strong> is a fictitious representative of an Artificial Intelligence organization used by <strong>Armely</strong> to demonstrate technical examples.
    </p>
    <p>
      From intelligent assistants to AI-powered automation, Mela helps us explore how organizations can embed artificial intelligence across operations.
      Whether it's building custom copilots in <strong>Microsoft Copilot Studio</strong> or deploying advanced machine learning models, Mela is our playground for all things AI innovation.
    </p>
    <h4>Use Cases Demonstrated:</h4>
    <ul>
      <li>Copilot Studio development</li>
      <li>Retrieval-Augmented Generation (RAG)</li>
      <li>Natural Language Processing (NLP)</li>
      <li>AI governance and security</li>
      <li>Azure OpenAI integration</li>
    </ul>
  </div>

  <div class="section coffee">
    <h3>Step & Sip – The Data-Driven Coffee Company</h3>
    <p>
      <strong>Step & Sip</strong> is a fictitious company representing a modern, data-driven coffee brand used by <strong>Armely</strong> to demonstrate technical examples.
    </p>
    <p>
      Step & Sip is where caffeine meets cloud. From inventory tracking to customer analytics and personalized offers, we use Step & Sip to demonstrate how data flows from raw form to actionable insight using <strong>Microsoft Fabric</strong>, <strong>Power Platform</strong>, and advanced reporting tools.
    </p>
    <h4>Use Cases Demonstrated:</h4>
    <ul>
      <li>Microsoft Fabric Lakehouse architecture</li>
      <li>Real-time analytics with Power BI</li>
      <li>Customer segmentation and trend forecasting</li>
      <li>Sales and inventory dashboards</li>
      <li>Workflow automation with Power Automate</li>
    </ul>
  </div>

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