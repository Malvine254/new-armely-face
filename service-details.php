<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("service details"); ?>
<!-- End Header Area -->
	
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Service Details</h2>
					<ul class="bread-list">
						<li><a href="index">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">
						Service Details		
					</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
<?php if (isset($_GET['name']) && $_GET['name']==="freemiums"): ?>

<!-- Pricing Table -->
<section class="pricing-table">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title mt-5"> 
	<h2><?php if (isset($_GET['name'])): echo $_GET['name'];?><?php else: echo "Service Details";?>	<?php endif ?></h2>
		<center><hr class="default-background hr" ></center>
</div>
</div>
</div>
<div class="row">
<!-- Single Table -->
<div class="col-lg-4 col-md-12 col-12">
		<div class="single-table">
			<!-- Table Head -->
			
			<div class="table-head" style="min-height:500px">
				<div class="icon">
				<a href="images/offers/sqloffer.png" target="_blank"><img src="images/offers/sqloffer.png" style="height: 150px;"></a>
				</div>
				<h4 class="title">SQL Health Check</h4>
				<p>Get a free SQL health check for optimized performance. Identify issues, improve stability, and reduce downtime with tailored insights for peak database efficiency.</p>
				<br>
				<br>
				<br>
				<br>
				<a href="service-details?name=sql" class="btn btn-primary">Get now</a>
			</div>
		</div>
</div>

<div class="col-lg-4 col-md-12 col-12">
		<div class="single-table">
			<!-- Table Head -->
			<div class="table-head" style="min-height:500px">
				<div class="icon">
					<a href="images/white-papers/coewhitepaper.png" target="_blank">
						<img src="images/white-papers/coewhitepaper.png" style="height: 150px;"></a>
				</div>
				<h4 class="title">Power Platform-COE</h4>
				<p>Get free Power BI integration for real-time insights, streamlined processes, and better decisions. Enhance business performance and boost productivity with tailored dashboards.</p>
				<br>
				<br>
				<br>
				<br>
				<a href="service-details?name=coe" class="btn btn-primary">Get now</a>
			</div>
		</div>
</div>
<div class="col-lg-4 col-md-12 col-12">
		<div class="single-table">
			<!-- Table Head -->
			<div class="table-head" style="min-height:500px">
				<div class="icon">
				<a href="images/freemiums/sql-check.png" target="_blank"><img src="images/freemiums/sql-check.png" style="height: 150px;"></a>
				</div>
				<h4 class="title">PowerBI Inventory</h4>
				<p>Get a free inventory assessment of your Power BI environment to identify usage patterns and optimize performance. This evaluation helps uncover insights into report engagement and data accessibility. Leverage built-in tools and community resources to enhance your Power BI strategy effectively.</p>
					<a href="service-details?name=powerbi" class="btn btn-primary">Get now</a>
			</div>
			
		</div>
</div>
<!-- End Single Table-->

</div>	
</div>	
</section>	
<!--/ End Pricing Table -->





<?php endif ?>
<!-- Start Portfolio Details Area -->
<?php if (isset($_GET['name'])): ?>
	
<section class="pf-details mt-5">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<!-- <div class="date">
						<ul>
							<li><span></span> </li>
							<li><span>AI Advisory</span> </li>
							<li><span>Generative AI</span></li>
						</ul>
					</div> -->
				<div class="inner-content " >
					
					<div class="body-text">
					<?php if ($_GET['name']=="powerbi"): ?>
						<section class="container">
							<h3 class="default-color">PowerBI Activity </h3>
							
							<p> The Power BI Activity Dashboard is designed to give a comprehensive view of user interactions within the Power BI environment. This dashboard helps stakeholders monitor usage, identify trends, and make informed decisions regarding report distribution and access management. Here’s what it covers:</p>
						 <div class="container mt-3 row">
					        <div class="col-md-7">
					        	<!-- Section 1 -->
					        <div class="mb-4">
					            <h4><strong>1. User Activity Tracking</strong></h4>
					            <p><strong>What it Monitors:</strong> Track who is accessing reports, when, and how frequently.</p>
					            <p><strong>Insights Gained:</strong> Identify key users, spot unusual access patterns, and understand report consumption trends.</p>
					        </div>

					        <!-- Section 2 -->
					        <div class="mb-4">
					            <h4><strong>2. Report Usage Patterns</strong></h4>
					            <p><strong>What it Monitors:</strong> Detailed breakdown of report views, edits, and shares.</p>
					            <p><strong>Insights Gained:</strong> Determine which reports are driving engagement and which may need updates or further promotion.</p>
					        </div>

					        <!-- Section 3 -->
					        <div class="mb-4">
					            <h4><strong>3. Access and Sharing Analytics</strong></h4>
					            <p><strong>What it Monitors:</strong> Activities like sharing reports, publishing content, and granting access.</p>
					            <p><strong>Insights Gained:</strong> Understand collaboration levels within teams and identify potential data governance issues.</p>
					        </div>

					       
					        </div>
					        <div class="col-md-5">
					        	<h5 class="mb-5">Get the download link</h5>
					        	<form class="form-group" method="post" id="offers-form" >
					        		<input id="fname" required class="form-control p-3" type="text" name="fname"  placeholder="First Name"><br>
					        		<input required class="form-control p-3" type="text" name="lname" placeholder="Last Name"><br>
					        		<input required class="form-control p-3" type="email" name="email2" placeholder="Company Email"><br>
					        		<input required  class="form-control p-3   " type="tel" name="phone2" placeholder="Phone Number"><br>
					        		<input required  class="form-control p-3   " type="text" name="country" placeholder="Country"><br>
					        	
					        		<button type="submit" name="submit_offers_form" class="btn btn-primary col-lg-12">Download Now</button>
					        	</form>
					        </div>
					    </div>
						</section>
						<?php endif ?>
					
						<?php if ($_GET['name']=="ai-advisory"): ?>
						<h3>AI Service: AI Advisory</h3>
						<p>Artificial Intelligence (AI) has emerged as a game-changing technology, empowering organizations to drive innovation, enhance efficiency, and gain a competitive edge. However, navigating the complexities of AI can be a daunting challenge. That's where our AI advisory services come in.</p>
						<p>As your trusted AI advisory partner, we're committed to empowering your organization with the knowledge, tools, and strategies necessary to harness the transformative power of artificial intelligence. Together, we'll embark on a journey of innovation and growth, unlocking new possibilities and driving sustainable success.</p>
						<p>Explore our AI advisory services and take the first step towards an AI-powered future. Contact us today to schedule a consultation and discover how we can help your organization thrive in the age of artificial intelligence.</p>
						<?php endif ?>



						<?php if ($_GET['name']=="ai-consulting"): ?>
						<h3>AI Services: AI Consulting</h3>
						<p>Uncertain how Artificial Intelligence (AI) can transform your business? You're not alone. AI holds immense potential for innovation and growth, but navigating its complexities can be daunting. That's where we come in.</p>
						<p>We offer a comprehensive AI consulting service designed to empower your business to leverage the transformative power of AI. Our team of experts will guide you through every step of the AI adoption journey, ensuring a smooth and successful integration that delivers real results.</p>
						<!-- Pricing Table -->
						<section class="pricing-table mt-5">
						<div class="container">
						<div class="row">
						<div class="col-lg-12">
						<div class="section-title mt-4">
							<h2>Here is how we do it</h2>
								<center><hr class="default-background hr" ></center>
						</div>
						</div>
						</div>
						<div class="row">
						<!-- End Single Table-->
						<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head" style="min-height: 300px; max-height: 300px;">
								<h4 class="title"><i class="icofont-hand-drag2"></i> Assessment</h4>	
								<p>We begin by collaborating with your team to understand your unique business goals, challenges and data landscape. We collaborate with all the stakeholders to identify use case and priorities considering cost, time, and revenue impact. We are developing a customized AI Strategy that aligns with your business objectives.</p>
							</div>
							<!-- Table List -->
							
							
						</div>
						</div>
						<!-- End Single Table-->		
						<!-- Single Table -->
						<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head" style="min-height: 300px; max-height: 300px;">
								<h4 class="title"><i class="icofont-brainstorming"></i> Define Technology</h4>	
								<p>Following the assessment, we gain a deep understanding of your business which helps our vendor agnostic approach recommendation of the best AI technology.</p>
							</div>
							<!-- Table List -->
							
							
						</div>
						</div>
						<!-- End Single Table-->
						<!-- Start Single Table-->
						<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head" style="min-height: 300px; max-height: 300px;">
								<h4 class="title"><i class="icofont-computer"></i> Data Management</h4>	
								<p>AI thrives on data, our team assists with identifying the right, clean, formatted, complete and ready to use data for effective model development.</p>
							</div>
							<!-- Table List -->
						
							
						</div>
						</div>
						<!-- End Single Table-->	
						<!-- Start Single Table-->
						<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head" style="min-height: 300px; max-height: 300px;">
								<h4 class="title"><i class="icofont-upload"></i> Model Deployment</h4>	
								<p>Our team in collaboration with your organization develops and trains custom AI models or guides in selection of pre-trained AI models that can easily be customized to meet your needs.</p>
							</div>
							<!-- Table List -->
						
							
						</div>
						</div>
						<!-- End Single Table-->	
						<!-- Start Single Table-->
						<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head" style="min-height: 300px; max-height: 300px;">
								<h4 class="title"><i class="icofont-cloud-upload"></i> Deployment</h4>	
								<p>After development, we deploy the models into your production environment ensuring smooth integration with your existing workflows.</p>
							</div>
							<!-- Table List -->
						
							
						</div>
						</div>
						<!-- End Single Table-->	
						<!-- Start Single Table-->
						<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head" style="min-height: 300px;  max-height: 300px;">
								<h4 class="title"><i class="icofont-handshake-deal"></i> Ongoing Support</h4>	
								<p>After deployment, we provide ongoing support and training to your team empowering them to confidently deep dive into AI tools and maximize benefits.</p>
							</div>
							<!-- Table List -->
						
							
						</div>
						</div>
						<!-- End Single Table-->

						<!-- Start Single Table-->
						<div class="col">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head" style="min-height: 300px; max-height: 300px;">
								<h4 class="title"><i class="fa fa-lock"></i> Monitoring & Optimization</h4>	
								<p>Our support does not stop there, we continue working with you and your team to optimize the models, re-train them to accommodate new datasets and integrate with other sources as data grows.</p>
							</div>
							<!-- Table List -->
						
							
						</div>
						</div>
						<!-- End Single Table-->	
						<blockquote>
							Partner with us and unlock the potential of AI for your business. <u><a class="" href="contact">Contact us </a></u>today for a free consultation and discover how AI can revolutionize your future!
						</blockquote>	
						</div>	
						</div>	

						<?php endif ?>
						</section>	




						<?php if ($_GET['name']=="generative-ai"): ?>
						<section class="container">
							<h3>Generative AI</h3>
							<h5 class="mt-2">Unleash Creativity: The Power of Generative AI</h5>
							<p>A transformative field of artificial intelligence that can create entirely new content, from text and images to music and even code. Using the power of GPT-4, LLAMA, PaLM-2 Generative AI transforms how you do business. We help you unlock the potential of your data.</p>
							<h3>Use Cases</h3>
							<p>How we do it:</p>
							<table class="table table-bordered">
								<tr class="default-color">
									<th>#</th>
									<th>Title</th>
									<th>Procedure</th>
								</tr>
								<tr>
									<td>1</td>
									<td>We consult</td>
									<td>Every business has unique needs and goals. Our Generative AI team consults with all the key stakeholders across your organization to gain a deep understanding of business challenges and inspirations. We analyze the data landscape, identify areas where Gen AI brings value and assesses technical readiness.</td>
								</tr>
								<tr>
									<td>2</td>
									<td>We Strategize</td>
									<td><p>Strategy goes beyond deploying a technology, we work with your team to develop a roadmap ensuring a smooth implementation for a maximum ROI. Roadmap includes</p>
										<ul>
											<li>Discovery & Planning</li>
											<li>Design & Development</li>
											<li>Deployment</li>
											<li>Monitoring</li>
											<li>Scalability</li>
											<li>Fine tunning</li>
										</ul>

									</td>
								</tr>
								<tr>
									<td>3</td>
									<td>We Implement</td>
									<td><p>We develop a customized Gen AI applications tailored to your business and solving challenges identified in consultation phase. The implementation adheres to the roadmap while also focusing on optimization, integration and ongoing support & maintenance.</p>
								</tr>
								<tr>
									<td>4</td>
									<td>We Refine</td>
									<td><p>As your business thrives and data landscapes evolve, we don't let your Gen AI models stagnate. Our partnership extends beyond initial implementation. We ensure your Gen AI models grows with you. We develop strategies to integrate new data streams into your Gen AI, we retrain and optimize the models.</p>
								
									</td>
								</tr>
							</table>
						</section>
						<?php endif ?>



						<style type="text/css">
							*{
								 font-size: 16px;
							}
							 blockquote {
					            position: relative;
					            padding: 1em;
					            margin: 1em 0;
					            color: #fff;
					            border-left: 10px solid maroon;
					            background: #2f5597;
					        }
					        
					        blockquote p {
					            display: inline;
					            color: #fff;
					            margin-top: 10px !important;
					        }
					        .vertical-line{
					            border-left: 4px solid #2f5597;
					        }
						</style>

						<!-- start of data services -->

						<section  id="dataServices">
							<?php if ($_GET['name']=="data-strategy"): ?>
							<div class="container">
							<h3>Data Services: Data Strategy</h3>
							<p>A well-crafted data strategy is the foundation for unlocking transformative business value. Whether you're looking to improve decision-making, enhance customer experiences, or drive operational efficiency, a strategic approach to data is the key to your success. Our holistic Data Strategy Service sets your organization on a winning path by guiding you through every step of the process, from defining your data vision to driving tangible business outcomes.</p>

							<blockquote>
								<p> 
								<h5 class="text-light"><i class="icofont-quote-left"></i><strong> Following the industry standards, we establish the following key components to your data strategy.</strong></h5> 
							</p>
							<p class="mt-5"><strong>Data Governance and Management</strong></p>
							<ol class="ml-5">
								<li>Establish a robust data governance framework to ensure the quality, security, and accessibility of your data assets. We'll help you define data policies, roles, and responsibilities to support your data-driven initiatives.</li>
							</ol>	
							<p><strong>Data Architecture and Integration</strong></p>
							<ol class="ml-5">
								<li>Design a scalable, resilient, and integrated data architecture that connects disparate data sources and enables seamless data flows. We'll help you leverage the right technologies and tools to power your data-driven initiatives.</li>
							</ol>		
							<p><strong>Data Analytics and Insights</strong></p>
							<ol class="ml-5">
								<li>Unlock the full potential of your data with advanced analytics and visualization capabilities. We'll help you design and deploy impactful dashboards, reports, and predictive models to drive informed decision-making.</li>
							</ol>

	
							<p><strong>Data-Driven Culture and Capabilities</strong>
							<ol class="ml-5">
								<li>Foster a data-driven culture within your organization by upskilling your workforce and empowering them to make data-informed decisions. We'll help you develop robust data literacy programs and champion data-driven mindsets.</li>
							</ol>
							</p>
														
							</blockquote>
							
							<div class="row">
								<div class="col-md-6">
									<p><strong>How we do it, using state of the art tools and services we define a well layout Roadmap with the following business objectives.</strong></p>
									<ol class="ml-5">
										<li class="mt-2">Assess your current data landscape.</li>
										<li>Define your data vision and Objectives.</li>
										<li>Data-Driven Culture and Capabilities</li>
										<li>Develop a Data Governance Framework</li>
										<li>Design a Future-Ready Data Architecture</li>
										<li>Implement Advanced Analytics Capabilities</li>
										<li>Cultivate a Data Driven Culture</li>
										<li>Measure and Optimize</li>
									</ol>
								</div>
								<div class="col-md-6">
									<p><strong>Partner with Us to Elevate Your Data Strategy</strong></p>
									<p>As your trusted data strategy partner, we'll work closely with you to create a tailored data strategy that aligns with your business objectives and delivers tangible results. Our holistic approach, combined with our deep industry expertise, will enable you to unlock the full potential of your data and drive sustainable growth. Explore our data strategy services and take the first step towards a data-driven future. Contact us today to schedule a consultation and discover how we can help your organization thrive in the age of data.</p>
								</div>
								<?php endif ?>

								<?php if ($_GET['name']=="data-science"): ?>
								<div class="container">
										
									<h3>Data Services: Data Science & Analytics</h3>
									<p>In today's data-driven world organizations that leverage the power of data science and analytics gain a significant competitive edge. From improving decision-making to driving operational efficiency, our comprehensive data science and analytics solutions can help you transform your business.</p>
									<p>Our team of data scientists and analytics experts are dedicated to helping you uncover the hidden insights within your data. We'll work closely with you to design and deploy customized solutions that address your unique business challenges.</p>
								
								<blockquote>
									<p> 
									<h5 class="text-light"><i class="icofont-quote-left"></i><strong> Discover Our Suite of Data Science & Analytics Services:</strong></h5> 
								</p>
								<p class="mt-5"><strong>Predictive Modeling</strong></p>
								<ol class="ml-5">
									<li>Leverage advanced machine learning techniques to build predictive models that forecast future trends, identify risks, and support strategic decision-making.</li>
								</ol>	
								<p><strong>Prescriptive Analytics</strong></p>
								<ol class="ml-5">
									<li>Combine data-driven insights with optimization algorithms to generate actionable recommendations that can enhance your business processes and drive better outcomes.</li>
								</ol>		
								<p><strong>Data Visualization & Reporting</strong></p>
								<ol class="ml-5">
									<li>Bring your data to life with stunning, interactive dashboards and reports that enable data-driven decision-making across your organization.</li>
								</ol>			
								<p><strong>Natural Language Processing</strong>
								<ol class="ml-5">
									<li>Unlock the value of unstructured data, such as customer feedback and market intelligence, using state-of-the-art NLP techniques to extract meaningful insights.</li>
								</ol>
								</p>
								<p><strong>Computer Vision</strong>
								<ol class="ml-5">
									<li>Leverage the power of computer vision to automate visual inspections, enhance product quality, and improve operational efficiency in your organization.</li>
								</ol>
								</p>
								<p><strong>Intelligent Automation</strong>
								<ol class="ml-5">
									<li>Integrate data science and analytics into your business workflows to streamline processes, reduce errors, and boost productivity.</li>
								</ol>
								</p>
								<p><strong>Accelerate Your Data-Driven Transformation</strong>
								<ol class="ml-5">
									<li>Our data science and analytics solutions are designed to help you navigate the complexities of the data landscape and unlock tangible business value. By partnering with our team of experts, you'll gain the insights, tools, and strategies needed to drive sustainable growth and stay ahead of the competition.</li>
								</ol>
								</p>	

								</blockquote>
								<p>Explore our data science and analytics services and take the first step towards a data-driven future. Contact us today to schedule a consultation and discover how we can help your organization thrive in the age of data.</p>	
								</div>
								<?php endif ?>
								
								
							<!-- start of snowflake for SQL and Data Engineering 	 -->
							<?php if ($_GET['name']=="fabric"): ?>
							<div class="container">	
							<h3 class="text-center">Data Transformation Services: Microsoft Fabric  	<center><hr class="default-background hr" ></center></h3>
								
							<div class="container-fluid solutions-section text-white py-5 mt-5">
						    <div class="row align-items-center">
						        <!-- Text Column -->
						        <div class="col-md-6  text-center text-md-left">
						           <div class="m-5">
							            <h2 class="text-light">Microsoft Fabric </h2>
							            <p class="text-light">Microsoft Fabric is an end-to-end analytics platform that provides a single, integrated environment for data professionals and businesses to collaborate on data projects. Fabric provides a set of integrated services that enable you to ingest, store, process, and analyze data in a single environment. </p>
							            <p class="text-light">DMicrosoft Fabric provides tools for both citizen and professional data practitioners and integrates with tools the business needs to make decisions. Fabric includes the following services:Data engineering Data integration, Data warehousing, Real-time intelligence, Data science and Business intelligence  </p>
							            <a  href="#consultation" class="btn btn-outline-light mt-3 text-light">Request A Microsoft Fabric Solution</a>
						          	</div>
						        </div>
						        
						        <!-- Image Column -->
						        <div class="col-md-6 text-center">
						            <img src="images/services/fabric_main_header.webp" alt="Team collaboration" class="img-fluid rounded p-4">
						        </div>
						    </div>
						</div>

							

						<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div style="background: teal; " class=" p-5">
							          <div  class="video-" >
				        		<img style="max-height: 480px; min-width: 100%;" src="images/services/fabric_main_header.png"><br><br>
				        	</div>
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">1. Complete Data Platform</h2><br>
							            	<p class="text-light">Give your data teams all the tools they need in a unified experience that helps reduce the cost and effort of data integration, governance, and security.</p><br>
							                
							                <li><span class="checkmark ">✓</span><b>Single experience </b>- Help data engineers, data scientists, analysts, and business users achieve shared goals with software as a service built for collaboration.</li>
							                <li><span class="checkmark">✓</span><b> Governance and Security</b>- AGain end-to-end visibility, usage and adoption insights, and industry-leading governance and compliance capabilities. </li>
							                <li><span class="checkmark">✓</span><b>Unified Capacity</b>- Simplify billing and help reduce costs with a single pool of capacity and storage that can be used for every workload.</li>
							               
							            </ul>
  
							        </div>

							       
							    </div>
							</div>
								<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div s class="bg-warning p-5">
							          <div  class="video-" >
				        		<img style="max-height: 480px; min-width: 100%;" src="images/services/fabric_two.png"><br><br>
				        	</div>
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">2. Lake Centric Open </h2><br>
							            	<p class="text-light">Simplify data integration from nearly any source into a single, multi-cloud data lake for your entire organization, and work from the same copy of data across analytics engines and languages.</p><br>
							                <li><span class="checkmark ">✓</span><b>No Data Movement </b>- Create shortcuts between data items across clouds like Azure and AWS without duplication, movement, or ownership change. </li>
							                <li><span class="checkmark">✓</span><b> One Copy Across Engines</b>- Reduce data duplication by using a single copy of data to power all your workloads.</li>
							                <li><span class="checkmark">✓</span><b>OneLake data hub</b>-  Bring your data together in an intuitive hub that’s automatically indexed for discovery, sharing, governance, and compliance.</li>
							                <li><span class="checkmark">✓</span><b>Lake Centric Open </b>-  Empower everyone to uncover insights with relevant data, easy-to-use tools, and stunning visuals embedded in Microsoft 365 apps they use every day. </li>
							               
							            </ul>
  
							        </div>

							       
							    </div>
							</div>
							<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div s class="bg-dark p-5">
							          <div  class="video-" >
				        		<img style="max-height: 480px; min-width: 100%;" src="images/services/fabric_three.png"><br><br>
				        	</div>
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">3. Real-Time Analytics </h2><br>
							            	<p class="text-light">Empower everyone to uncover insights with relevant data, easy-to-use tools, and stunning visuals embedded in Microsoft 365 apps they use every day.</p><br>
							                <li><span class="checkmark">✓</span> <b>Direct Lake Mode  </b>- Save time for analysts and provide up-to-date insights with a fast, real-time connection to your data in OneLake. </li>
							                <li><span class="checkmark ">✓</span><b>Built into Microsoft 365</b>- Foster a data-driven culture by seamlessly and securely flowing insights into Microsoft 365 apps, including Teams, Excel, PowerPoint, and Outlook. </li>
							                <li><span class="checkmark">✓</span><b> Data Driven Actions</b>- Easily set up an end-to-end solution so teams can act quickly in response to time-sensitive events.</li>
							               
							               
							            </ul>
  
							        </div>

							       
							    </div>
							</div>

						<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div s class="bg-success p-5">
							          <div  class="video-" >
				        		<img style="max-height: 480px; min-width: 100%;" src="images/services/fabric_four.png"><br><br>
				        	</div>
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">4. AI-Driven Insights  </h2><br>
							            	<p class="text-light">Adopt a data platform that’s infused with AI at every layer to help you get more done, faster.</p><br>
							                <li><span class="checkmark">✓</span> <b>Create Impactful Reports Faster  </b>- Simply describe what you need—including reports, summaries, and calculations—or ask a question, and Copilot does the rest.</li>
							                <li><span class="checkmark ">✓</span><b>Do more with Copilot in Fabric</b>- Simply describe what you need including reports, summaries, and calculations—or ask a question, and Copilot does the rest. </li>
							                <li><span class="checkmark">✓</span><b> Build Custom Ai Models</b>- Fuel your own tailor-made generative AI experiences in Azure AI Studio with curated data seamlessly flowing from Fabric.</li>
							               
							               
							            </ul>
  
							        </div>

							       
							    </div>
							</div>

							
							</div>
							<?php endif ?>



							<!-- start of snowflake for SQL and Data Engineering 	 -->
							<?php if ($_GET['name']=="sqlsupport"): ?>
							<div class="container">	
							<h3 class="text-center">Managed Services: SQL Server Support  	<center><hr class="default-background hr" ></center></h3>
								
							<div class="container-fluid solutions-section text-white py-5 mt-5">
						    <div class="row align-items-center">
						        <!-- Text Column -->
						        <div class="col-md-6  text-center text-md-left">
						           <div class="m-5">
							            <h2 class="text-light">SQL Server Support </h2>
							            <p class="text-light">SQL support provides businesses and organizations with technical assistance and expertise in managing and optimizing their SQL-based databases. From query optimization to troubleshooting and maintenance, SQL support ensures that your database operations run smoothly, securely, and efficiently.  </p>
							            
							            <a  href="#consultation" class="btn btn-outline-light mt-3 text-light">Request A  SQL Server Support Solution</a>
						          	</div>
						        </div>
						        
						        <!-- Image Column -->
						        <div class="col-md-6 text-center">
						            <img src="images/services/fabric_main_header.webp" alt="Team collaboration" class="img-fluid rounded p-4">
						        </div>
						    </div>
						</div>

							

						<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div style="background: teal; " class=" p-5">
							        
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">Why Do You Need SQL Support?</h2><br>
							            	<p class="text-light">Databases are at the core of modern businesses, powering applications, analytics, and decision-making. However, managing SQL databases can be complex and resource-intensive. SQL support helps organizations by:</p><br>
							                
							                <li><span class="checkmark ">✓</span><b>Optimizing Performance </b>- Enhance database performance through efficient indexing, optimized queries, and resource management.</li>
							                <li><span class="checkmark">✓</span><b> Troubleshooting Issues</b>- Quickly identify and resolve database errors, slow queries, and connectivity problems.</li>
							                <li><span class="checkmark">✓</span><b>Ensuring Data Security</b>- Implement robust security measures to protect sensitive data from breaches and unauthorized access.</li>
							                <li><span class="checkmark">✓</span><b>Supporting Scalability</b>- Design and implement scalable database architectures that grow with your business needs.</li>
							                <li><span class="checkmark">✓</span><b>Streamlining Maintenance</b>- Automate routine tasks like backups, updates, and performance monitoring.</li>
							               
							            </ul>
  
							        </div>

							       
							    </div>
							</div>
								<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div s class="bg-success p-5">
							          
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">Key Services Offered in SQL Support</h2><br>
							            	<p class="text-light">Simplify data integration from nearly any source into a single, multi-cloud data lake for your entire organization, and work from the same copy of data across analytics engines and languages.</p><br>
							                <li><span class="checkmark ">✓</span><b>Database Administration</b>- Monitoring and managing database health, Configuring and maintaining database servers and performing regular backups and recovery tests. </li>
							                <li><span class="checkmark">✓</span><b>Performance Tuning</b>- Analyzing and improving SQL queries for faster performance, identifying bottlenecks in query execution.</li>
							                <li><span class="checkmark">✓</span><b>Query Optimization</b>-  Enhancing indexing strategies and optimizing resource allocation, Resolving slow-loading queries and processes.</li>
							                <li><span class="checkmark">✓</span><b>Data Security and Compliance </b>-  Migrating data between databases or systems with minimal downtime, connecting your database to external APIs or data sources. </li>
							                <li><span class="checkmark">✓</span><b>Disaster Recovery Planning</b>-  Creating and implementing recovery strategies for unexpected data loss, setting up high-availability systems for business continuity.</li>
							               <li><span class="checkmark">✓</span><b>Training and Documentation</b>-  Training your team in SQL best practices, providing detailed documentation for database systems and workflows.</li>
							            </ul>
  
							        </div>

							       
							    </div>
							</div>
							<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div s class="bg-primary p-5 col-12">
							          
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">Common Platforms We Support</h2><br>
							            	<br>
							                <li><span class="checkmark ">✓</span><b>MySQL</b> </li>
							               <li><span class="checkmark ">✓</span><b>Microsoft SQL Server</b> </li>
							               <li><span class="checkmark ">✓</span><b>Oracle Database</b> </li>
							               <li><span class="checkmark ">✓</span><b>Snowflake</b> </li>
							               <li><span class="checkmark ">✓</span><b>Azure SQL Database</b> </li>
							               <li><span class="checkmark ">✓</span><b>AWS RDS and Aurora</b> </li>
							               <li><span class="checkmark ">✓</span><b>Google BigQuery</b> </li>

							            </ul>
  
							        </div>

							       
							    </div>
							</div>
						

							
							</div>
							<?php endif ?>


							<!-- start of app support	 -->
							<?php if ($_GET['name']=="appsupport"): ?>
							<div class="container">	
							<h3 class="text-center">Managed Services: Application Support  	<center><hr class="default-background hr" ></center></h3>
								
							<div class="container-fluid solutions-section text-white py-5 mt-5">
						    <div class="row align-items-center">
						        <!-- Text Column -->
						        <div class="col-md-6  text-center text-md-left">
						           <div class="m-5">
							            <h2 class="text-light">Application Support </h2>
							            <p class="text-light">Application support is a specialized service that ensures your business-critical applications operate efficiently, securely, and without interruptions. From troubleshooting issues to enhancing performance and providing regular updates, application support helps businesses leverage the full potential of their software systems.</p>
							            
							            <a  href="#consultation" class="btn btn-outline-light mt-3 text-light">Request an  Application Support</a>
						          	</div>
						        </div>
						        
						        <!-- Image Column -->
						        <div class="col-md-6 text-center">
						            <img src="images/services/fabric_main_header.webp" alt="Team collaboration" class="img-fluid rounded p-4">
						        </div>
						    </div>
						</div>

							

						<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div style="background: teal; " class=" p-5">
							        
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">Why Your Business Needs Application Support</h2><br>
							            	<p class="text-light">DApplications are at the heart of modern businesses, powering everything from customer relationship management to inventory tracking and analytics. Here’s why reliable application support is essential:</p><br>
							                
							                <li><span class="checkmark ">✓</span><b>Minimized Downtime </b>- Proactive monitoring and quick resolution ensure your business operations are never disrupted.</li>
							                <li><span class="checkmark">✓</span><b> Improved Performance</b>- Regular updates and patches safeguard against vulnerabilities and protect sensitive data.</li>
							                <li><span class="checkmark">✓</span><b>Enhanced Security</b>- Implement robust security measures to protect sensitive data from breaches and unauthorized access.</li>
							                <li><span class="checkmark">✓</span><b>Scalability</b>- Adapt applications to meet growing business demands or integrate with new tools and platforms.</li>
							                <li><span class="checkmark">✓</span><b>User Satisfaction</b>- Provide seamless experiences to both employees and customers, improving productivity and loyalty.</li>
							               
							            </ul>
  
							        </div>

							       
							    </div>
							</div>
								<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div s class="bg-success p-5">
							          
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">Core Services in Application Support</h2><br>
							            	
							                <li><span class="checkmark ">✓</span><b>Monitoring and Maintenance</b>- Proactive monitoring to detect and resolve issues before they impact users, routine maintenance to keep applications updated and efficient. </li>
							                <li><span class="checkmark">✓</span><b>Troubleshooting and Bug Fixing</b>- Rapid resolution of application errors, crashes, or slowdowns, addressing software bugs and deploying patches.</li>
</li>
							                <li><span class="checkmark">✓</span><b>Performance Optimization</b>-  Streamlining workflows and optimizing application speed, identifying and eliminating bottlenecks in performance.</li>
							                <li><span class="checkmark">✓</span><b>Upgrades and Enhancements </b>-  Installing new application versions and updates, adding new features and functionality based on business needs. </li>
							                <li><span class="checkmark">✓</span><b>Integration and Compatibility Support</b>-  Ensuring applications work seamlessly with other systems and tools, resolving compatibility issues with hardware or software upgrades.</li>
							               <li><span class="checkmark">✓</span><b>Security and Compliance</b>-  Protecting applications from cyber threats with regular updates and audits, ensuring compliance with industry standards and regulations.</li>
							            </ul>
  
							        </div>

							       
							    </div>
							</div>
							<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div s class="bg-primary p-5 col-12">
							          
							            <ul class="benefits-list text-light">
							            	<h2 class="text-light">Applications We Support</h2><br>
							            	<br>
							                <li><span class="checkmark ">✓</span><b>Enterprise Applications- ERP Systems: SAP, Microsoft Dynamics, Oracle ERP</b> </li>
							               <li><span class="checkmark ">✓</span><b>Cloud-Based Applications- Microsoft 365, Google Workspace, AWS Applications</b> </li>
							               <li><span class="checkmark ">✓</span><b>Custom Applications- Tailored software solutions developed specifically for your business.</b> </li>
							               <li><span class="checkmark ">✓</span><b>Data and Analytics Tools- Power BI, Tableau, QlikView</b> </li>
							               <li><span class="checkmark ">✓</span><b>Industry-Specific Applications- Healthcare, Retail, Manufacturing, Finance, and Education software</b> </li>
							               

							            </ul>
  
							        </div>

							       
							    </div>
							</div>
						

							
							</div>
							<?php endif ?>
							</div>


						</section>
						<!-- end of data services -->

						<section  class="container">

							<?php if ($_GET['name']=="sql"): ?>


							<h3>Fremiums: SQL Server Health Checks</h3>
							<h5 class="mt-3">Ensuring the Health of Your SQL Server</h5>
							<p>In today's data-driven world, the reliability and performance of your SQL Server infrastructure is crucial to the success of your business. Regular SQL Server health checks are essential to identify potential issues, optimize performance, and ensure the long-term stability of your mission-critical database systems.</p>
							<div class="row">
							 
					        <div class="col-md-6">
					        	<blockquote>
										<p> 
										<h5 class="text-light"><i class="icofont-quote-left"></i><strong> Why Perform a SQL Server Health Check?</strong></h5> 
										</p>
										<p class="mt-5">A comprehensive SQL Server health check can provide valuable insights into the overall health and configuration of your SQL Server environment. By identifying and addressing potential problems early, you can:</p>
										<ol class="ml-5">
											<li>Improve database performance and responsiveness</li>
											<li>Prevent unplanned downtime and ensure high availability</li>
											<li>Identify and resolve security vulnerabilities</li>
											<li>Optimize resource utilization and reduce operational costs</li>
											<li>Ensure compliance with industry regulations and best practices</li>
										</ol>	
										<p><strong>Data Architecture and Integration</strong></p>
										<ol class="ml-5">
											<li>Design a scalable, resilient, and integrated data architecture that connects disparate data sources and enables seamless data flows. We'll help you leverage the right technologies and tools to power your data-driven initiatives.</li>
										</ol>		
										<!-- <p><strong>Data Analytics and Insights</strong></p>
										<ol class="ml-5">
											<li>Unlock the full potential of your data with advanced analytics and visualization capabilities. We'll help you design and deploy impactful dashboards, reports, and predictive models to drive informed decision-making.</li>
										</ol>			
										<p><strong>Data-Driven Culture and Capabilities</strong>
										<ol class="ml-5">
											<li>Foster a data-driven culture within your organization by upskilling your workforce and empowering them to make data-informed decisions. We'll help you develop robust data literacy programs and champion data-driven mindsets.</li>
										</ol>
										
										</p> -->
														
							</blockquote>
					   </div>
					   <div class="col-md-6">
					        	<h5 class="mb-5">Request for SQL Server Health Check for Free</h5>
					        	<form class="form-group" method="post" id="sql-offer-form" >
					        		<input id="fname" required class="form-control p-3" type="text" name="fname1"  placeholder="First Name"><br>
					        		<input required class="form-control p-3" type="text" name="lname1" placeholder="Last Name"><br>
					        		<input required class="form-control p-3" type="email" name="email1" placeholder="Company Email"><br>
					        		<input required  class="form-control p-3   " type="tel" name="phone1" placeholder="Phone Number"><br>
					        		<input required  class="form-control p-3   " type="text" name="country1" placeholder="Country"><br>
					        	
					        		<button type="submit" name="submit_sql_offers_form" class="btn btn-primary col-lg-12">Request Now</button>
					        	</form>
					        </div>
					 </div>
							
							<table class="table table-bordered mt-5">
								<tr class="default-color">
									
									<th>Server Configuration</th>
									<th>Database Health Assessment</th>
								</tr>
								<tr>
									
									<td>Poor server configuration leaves your system vulnerable to security breaches, performance issues, and unexpected outages. We'll examine the hardware, operating system, and SQL Server settings to ensure optimal configuration and compliance with industry best practices.</td>
									<td>Unidentified or ignored database issues can lead to slowdowns, crashes, and even data loss. We'll analyze the overall health and integrity of your databases, including growth trends, fragmentation, and potential data corruption issues.</td>
								</tr>
								
								<tr class="default-color">
									
									<th> Performance Optimization</th>
									<th>Security and Compliance Audit</th>
								</tr>
								<tr>
									
									<td>Unmaintained/Untuned SQL Server leads to system degradation leading to data loss and unanticipated downtime. We'll identify performance bottlenecks and provide recommendations for optimizing query execution, indexing, and resource utilization.</td>
									<td><p>Unsecure data environment can lead to loss of business and revenue. We'll review your SQL Server security settings, user permissions, and backup/recovery procedures to ensure your data is protected and your infrastructure is compliant with relevant regulations.</p>
								</tr>
								<tr class="default-color">
									
									<th>Availability & Scalability</th>
									<th>Disaster Recovery Planning</th>
								</tr>
								<tr>
									
									<td>Uninterrupted access to data and services is critical for a data platform. We review and recommend HA configuration for a SQL Environment. We'll evaluate your SQL Server's high availability and disaster recovery capabilities, as well as its ability to scale to meet future demands</td>
									<td><p>Unpredicted systems disruptions are inevitable, without a solid DR plan, there can be significant operation and financial losses. We'll evaluate your backup and recovery strategies and provide guidance on improving your disaster recovery capabilities.</p>
								
									</td>
								</tr>
							</table>
							<h3>Benefit from Our SQL Server Expertise</h3>
							<p>Our team of experienced SQL Server professionals has the depth of knowledge and expertise to thoroughly evaluate the health of your SQL Server environment and provide tailored recommendations to address any issues or areas for improvement. Contact us today to schedule your SQL Server health check and take the first step towards ensuring the long-term reliability, performance, and scalability of your critical data infrastructure.</p>
							<h3>FAQ</h3>
							<p>For optimal performance and reliability, we recommend conducting a comprehensive SQL Server health check on a regular basis, typically once a year or more frequently depending on the size and complexity of your SQL Server environment.</p>
							<h3>Frequency of SQL Server Health Checks</h3>
							<ol  class="ml-5">
								<li>Annual Review: At a minimum, we suggest performing a full SQL Server health check once a year. This allows you to proactively identify and address any issues that may have arisen over the past year, as well as plan for future growth and changes in your infrastructure.</li>
								<li>Bi-Annual Review: For organizations with large, complex, or mission-critical SQL Server environments, we recommend performing a health check twice a year. This more frequent review helps ensure your SQL Servers are operating at peak performance and reliability, especially during periods of high demand or system changes.</li>
								<li>Event-Driven Reviews: In addition to the scheduled annual or bi-annual reviews, it's also advisable to conduct a SQL Server health check in the following scenarios:</li>
								<li>After major system upgrades or migrations</li>
								<li>Prior to the launch of new applications or services</li>
								<li>When you experience unexplained performance degradation or availability issues</li>
								<li>Before and after important business events (e.g., fiscal year-end, holiday seasons)</li>
							</ol>
							<blockquote>
								<p> 
								<h5 class="text-light"><i class="icofont-quote-left"></i><strong> Empower Your Power Platform with a CoE-Led Health Check</strong></h5> 
							</p>
							<p class="mt-5">A well-designed Center of Excellence serves as the strategic hub for your Power Platform initiatives, providing governance, best practices, and subject matter expertise to drive successful deployments. By incorporating a comprehensive health check into your CoE's responsibilities, you can:</p>
							<ol class="ml-5">
								<li>Align with Organizational Objectives: Ensure your Power Platform investments are closely aligned with your organization's strategic goals and deliver measurable business value.</li>
								<li>Establish Governance and Security: Assess your Power Platform governance model, security controls, and compliance measures to mitigate risks and maintain data integrity.</li>
								<li>Optimize Application Performance: Evaluate the usability, accessibility, and performance of your Power Platform apps and solutions to improve the end-user experience.</li>
								<li>Enhance Data and Analytics: Analyze the quality, connectivity, and utilization of your data sources, as well as the effectiveness of your Power BI dashboards and reports.</li>
								<li>Foster Continuous Improvement: Receive recommendations for scaling your Power Platform ecosystem to accommodate evolving business requirements and changing user needs</li>
							</ol>	
							
														
							</blockquote>

							<?php endif ?>

							<?php if ($_GET['name']=="coe"): ?>
							<div class="container card">	
							<div class="p-3">
								<div class="row">
									<div class="col-md-6">
								<h3>Fremiums: Power Platform CoE</h3>
								<h5 class="mt-2">Optimize Your Power Platform Investment with a Comprehensive a Center of Excellence-Driven Health Check</h5>
								<p>As organizations increasingly rely on the Microsoft Power Platform to drive digital transformation, establishing a Center of Excellence (CoE) is crucial for ensuring the health and optimal performance of your Power Platform environment. A Power Platform health check, guided by your CoE, can help you identify areas for improvement, unlock greater value, and maximize your return on investment.</p>
								<h5 class="mt-2">Get the Full Potential of Your Power Platform with Your CoE</h5>
								<p>By leveraging your Center of Excellence to conduct a comprehensive Power Platform health check, you can elevate your Microsoft 365 and Power Platform ecosystem to new heights. Our team of CoE experts will provide you with actionable insights and a roadmap to optimize your Power Platform investment and unlock greater business value.</p>
							</div>

							<div class="col-md-6">
					        	<h5 class="mb-5">Request for COE Integration for Free</h5>
					        	<form class="form-group" method="post" id="coe-offer-form" >
					        		<input id="fname" required class="form-control p-3" type="text" name="fname3"  placeholder="First Name"><br>
					        		<input required class="form-control p-3" type="text" name="lname3" placeholder="Last Name"><br>
					        		<input required class="form-control p-3" type="email" name="email3" placeholder="Company Email"><br>
					        		<input required  class="form-control p-3   " type="tel" name="phone3" placeholder="Phone Number"><br>
					        		<input required  class="form-control p-3   " type="text" name="country3" placeholder="Country"><br>
					        	
					        		<button type="submit" name="submit_coe_offers_form" class="btn btn-primary col-lg-12">Request Now</button>
					        	</form>
					        </div>
								</div>
							</div>
							
							</div>
							<?php endif ?>

							<!-- start of power apps for digital services -->
								<?php if ($_GET['name']=="powerapps"): ?>
							<div class="container">	
							<h3 class="">Digital Services: Power Apps - Build Apps Without Coding 	<center><hr class="default-background hr" ></center></h3>
							
							</div>


							<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div class=" left-column text-light p-5">
							        	 <h2 class="text-light">Microsoft Power Apps</h2>
							            <p class="text-light">Power Apps empowers you to build custom applications tailored to your business needs without writing a single line of code. Whether you're automating a workflow or creating a complex business application, Power Apps enables you to do it all with a drag-and-drop interface and pre-built templates.</p>
							            <h4 class="font-weight-bold text-light mt-2 mb-2">Key Benefits</h4>
							            <ul class="benefits-list">
							                <li><span class="checkmark">✓</span> No Coding Required: Develop apps quickly with an intuitive drag-and-drop interface.</li>
							                <li><span class="checkmark">✓</span> Seamless Integration: Connect with Microsoft 365, Dynamics 365, and other services.</li>
							                <li><span class="checkmark">✓</span>Mobile Ready: Build responsive apps that work on any device, anywhere.</li>
							                <li><span class="checkmark">✓</span> Call to Action: Start Building with Power Apps.</li>
							                <li><span class="checkmark">✓</span>Ensure compliance with industry regulations and best practices.</li>
							            </ul>
							           
							        </div>

							       
							    </div>
							</div>

							
							<div class="container-fluid solutions-section text-white py-5 mt-5">
						    <div class="row align-items-center">
						        <!-- Text Column -->
						        <div class="col-md-6  text-center text-md-left">
						           <div class="m-5">
							            <h2 class="text-light">Microsoft Power Apps Solutions</h2>
							            <p class="text-light">Here are a variety of Power Apps solutions, each tailored to meet your specific needs. Every solution includes comprehensive visualizations, data and security protocols, integration options, and more.</p>
							            <a  href="#consultation" class="btn btn-outline-light mt-3 text-light">Request A Power Apps Solution</a>
						          	</div>
						        </div>
						        
						        <!-- Image Column -->
						        <div class="col-md-6 text-center">
						            <img src="images/services/powerap.png" alt="Team collaboration" class="img-fluid rounded p-4">
						        </div>
						    </div>
						</div>
						<div class="container my-5">
						    <div class="row align-items-center">
						    	  <!-- Image Section -->
						        <div class="col-md-6 text-center">
						        	<div class="video-container">
						        		<img src="images/services/timesheet.png">
						        	</div>
						           
									  </div>
						    	
						        <!-- Text Section -->
						        <div class="col-md-6">
						            <h2 class="font-weight-bold">Timesheets app</h2><br>
						            <p>Efficiently manage your work hours and track project progress with our Power Apps Timesheets! Log daily hours, describe tasks performed, and assign projects or clients all in one intuitive app. With a clean, organized layout, you can easily keep a record of your week, update your entries, and submit them for approval. Streamline time tracking and improve productivity by ensuring all work hours are accurately documented and accessible whenever you need.</p><br>
						          
						        </div>
						        
						        
						      
						    </div>
						</div>

						<div class="container my-5">
						    <div class="row align-items-center">
						        <!-- Text Section -->
						        <div class="col-md-6">
						            <h2 class="font-weight-bold">Inventory management app</h2><br>
						            <p>Take control of your store’s inventory with ease using Power Apps.  With our custom inventory management app, you can quickly view stock levels across all your products, browse through an organized inventory list, and stay on top of items that need refilling. </p><br>
						            <p>Set email alerts to notify yourself when stock runs low, ensuring you’re always prepared. With intuitive features and real-time updates, managing your inventory has never been more efficient or user-friendly. Explore streamlined, smart inventory management today!</p>
						        </div>
						        
						        <!-- Image Section -->
						        <div class="col-md-6 text-center">
						        	<div class="video-container">
						        		<video width="640" height="360" controls>
										        <source src="videos/inventory.mp4" type="video/mp4">
										        <source src="your-video.webm" type="video/webm">
										        <source src="your-video.ogv" type="video/ogg">
										        Your browser does not support the video tag.
										    </video>
						        	</div>
						           
									  </div>
						    </div>
						</div>


						<div class="container my-5">
						    <div class="row align-items-center">
						    	<!-- Image Section -->
						        <div class="col-md-6 text-center">
						        	<div class="video-container">
						        		<video width="640" height="360" controls>
										        <source src="videos/leave.mp4" type="video/mp4">
										        <source src="your-video.webm" type="video/webm">
										        <source src="your-video.ogv" type="video/ogg">
										        Your browser does not support the video tag.
										    </video>
						        	</div>
						           
									  </div>
						        <!-- Text Section -->
						        <div class="col-md-6">
						            <h2 class="font-weight-bold">Leave request app</h2><br>
						            <p>Effortlessly submit vacation requests and streamline your time-off management with Power Apps! Choose your desired date ranges, add personalized notes for your manager, and keep track of your time off—all in one easy-to-use platform. Gain better control over your vacation planning and stay updated on request approvals, making time-off management simpler and more transparent than ever. Managers get an easy time with approvals.</p><br>
						           
						        </div>
						        
						        
						    </div>
						</div>

							<div class="container my-5">
						    <div class="row align-items-center">
						        <!-- Text Section -->
						        <div class="col-md-6">
						            <h2 class="font-weight-bold">Onboarding </h2><br>
						            <p>Enhance your onboarding process with our Power Apps Onboarding App! New team members can seamlessly update their Office 365 user profiles, access a personalized onboarding checklist, and get an overview of their team. With quick links to essential team content, resources, and contacts, new hires will have everything they need to integrate smoothly and start contributing from day one. Simplify onboarding, foster connection, and empower your team with a streamlined experience. </p><br>
						          
						        </div>
						        
						        <!-- Image Section -->
						        <div class="col-md-6 text-center">
						        	<div class="video-container">
						        		<video width="640" height="360" controls>
										        <source src="videos/onboarding.mp4" type="video/mp4">
										        <source src="your-video.webm" type="video/webm">
										        <source src="your-video.ogv" type="video/ogg">
										        Your browser does not support the video tag.
										    </video>
						        	</div>
						           
									  </div>
						    </div>
						</div>


						<div class="container my-5">
						    <div class="row align-items-center">
						    	  <!-- Image Section -->
						        <div class="col-md-6 text-center">
						        	<div class="video-container">
						        		<video width="640" height="360" controls>
										        <source src="videos/service.mp4" type="video/mp4">
										        <source src="your-video.webm" type="video/webm">
										        <source src="your-video.ogv" type="video/ogg">
										        Your browser does not support the video tag.
										    </video>
						        	</div>
						           
									  </div>
						        <!-- Text Section -->
						        <div class="col-md-6">
						            <h2 class="font-weight-bold">Service Desk app</h2><br>
						            <p>Stay on top of service requests with the Power Apps Service Desk! Track assignments, monitor job statuses, and manage tasks across your team—all from anywhere, no desk required. Quickly prioritize jobs, add real-time notes, and view tasks by technician for efficient follow-up. The app opens with sample data, making it easy to explore its capabilities before going live. Streamline your service management for better productivity and team coordination today! </p><br>
						          
						        </div>
						        
						      
						    </div>
						</div>

						<div class="container my-5">
						    <div class="row align-items-center">
						    	
						        <!-- Text Section -->
						        <div class="col-md-6">
						            <h2 class="font-weight-bold">Property Management app</h2><br>
						            <p>Simplify property management with our Power Apps solution! Property managers can easily track available and occupied units, reserve units for prospective tenants, and manage tenant information in real time. With intuitive features to streamline reservations and occupancy updates, this app makes managing properties efficient and hassle-free. Effortlessly stay on top of unit availability, streamline tenant onboarding, and keep your properties running smoothly.</p><br>
						          
						        </div>
						          <!-- Image Section -->
						        <div class="col-md-6 text-center">
						        	<div class="video-container">
						        		<video width="640" height="360" controls>
										        <source src="videos/project.mp4" type="video/mp4">
										        <source src="your-video.webm" type="video/webm">
										        <source src="your-video.ogv" type="video/ogg">
										        Your browser does not support the video tag.
										    </video>
						        	</div>
						           
									  </div>
						        
						      
						    </div>
						</div>


							

							<?php endif ?>


							<!-- start of power automate for digital services -->
							<?php if ($_GET['name']=="powerautomate"): ?>
							<div class="container">	
							<h3 class="">Digital Services: Power Automate - Automate Workflows and Boost Productivity  	<center><hr class="default-background hr" ></center></h3>

							<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div style="background: teal;" class=" p-5">
							        	 <h2 class="mb-1 text-light">Work Smarter, Not Harder with Power Automate</h2>
							            <p class="text-light">Power Automate allows you to automate repetitive tasks and workflows, saving time and increasing efficiency across your organization. From simple automations to complex business processes, Power Automate makes it easy to streamline your operations and focus on what matters most.</p>
							            <h4 class="font-weight-bold text-light mt-2 mb-2">Key Benefits</h4>
							            <ul class="benefits-list text-light">
							                <li><span class="checkmark">✓</span> No Coding Required: Automate workflows easily with a user-friendly drag-and-drop interface.</li>
							                <li><span class="checkmark ">✓</span> Seamless Integration: Connect effortlessly with Microsoft 365, Dynamics 365, and other external services.</li>
							                <li><span class="checkmark">✓</span> Mobile Ready: Create workflows accessible on any device, enabling productivity on the go.</li>
							                <li><span class="checkmark">✓</span> Action-Oriented: Begin automating your processes with Power Automate today.</li>
							                <li><span class="checkmark">✓</span>ECompliance Support: Ensure workflows align with industry standards and regulatory requirements.</li>
							            </ul>


							            <h4 class="font-weight-bold text-light mt-2 mb-2">Key Capabilities</h4>
							            <ul class="benefits-list text-light">
							                <li><span class="checkmark">✓</span> Automate Repetitive Tasks: Save time by automating routine tasks and processes.</li>
							                <li><span class="checkmark">✓</span>AI-Powered Workflows: Leverage AI to enhance decision-making and optimize workflows.</li>
							                <li><span class="checkmark">✓</span> Integrations: Connect with hundreds of apps and services to create powerful automation.</li>
							                <li><span class="checkmark">✓</span> Call to Action: Automate Your Workflows with Power Automate to align with industry standards and regulatory requirements.</li>
							            </ul>
							           
							        </div>

							       
							    </div>
							</div>


								<div class="container-fluid solutions-section text-white py-5 mt-5">
						    <div class="row align-items-center">
						        <!-- Text Column -->
						        <div class="col-md-6  text-center text-md-left">
						           <div class="m-5">
							            <h2 class="text-light">Microsoft Power Automate Solutions</h2>
							            <p class="text-light">Here are a variety of Power Automate solutions, each tailored to meet your specific needs. Every solution includes comprehensive visualizations, data and security protocols, integration options, and more.</p>
							            <a  href="#consultation" class="btn btn-outline-light mt-3 text-light">Request A Power Automate Solution</a>
						          	</div>
						        </div>
						        
						        <!-- Image Column -->
						        <div class="col-md-6 text-center">
						            <img src="images/services/powerap.png" alt="Team collaboration" class="img-fluid rounded p-4">
						        </div>
						    </div>
						</div>

						<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	  <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/email_gateway.png">
				        	</div>
				           
							  </div>
				    	
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Saving email attachments locally using gateway</h2><br>
				            <p>The flow monitors incoming emails and automatically saves attachments from specific messages to a designated local folder. This eliminates the need for manual downloads, ensuring that all attachments are captured consistently and organized in one place.</p><br>
				          
				        </div>
				        
				        
				      
				    </div>
						</div>

						<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Transforming CSV data into Excel format</h2><br>
				            <p>This Power Automate flow streamlines the process of transforming CSV data into Excel format, allowing data to be organized and analyzed with ease. By automatically converting and transferring CSV content into a structured Excel file, the flow eliminates the need for manual data handling, which is often repetitive and time-consuming.</p><br>
				          
				        </div>
				         <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/ml.webp">
				        	</div>
				           
							  </div>
				        
				      
				    </div>
						</div>

							
							</div>
							<?php endif ?>

						<!-- start of snowflake for digital services -->
							<?php if ($_GET['name']=="snowflake"): ?>
							<div class="container">	
							<h3 class="text-center">Digital Services: Snowflake 	<center><hr class="default-background hr" ></center></h3>
								
							<div class="container-fluid solutions-section text-white py-5 mt-5">
						    <div class="row align-items-center">
						        <!-- Text Column -->
						        <div class="col-md-6  text-center text-md-left">
						           <div class="m-5">
							            <h2 class="text-light">Snowflake Solutions</h2>
							            <p class="text-light">Snowflake is a cloud-based data platform that revolutionizes how businesses manage and analyze their data. With its multi-cloud architecture and unique features, Snowflake offers a scalable, secure, and efficient way to store, process, and analyze vast amounts of structured and semi-structured data. From data warehousing to data lakes and real-time analytics, Snowflake empowers organizations to make data-driven decisions with ease.</p>
							            <a  href="#consultation" class="btn btn-outline-light mt-3 text-light">Request A Snowflake Solution</a>
						          	</div>
						        </div>
						        
						        <!-- Image Column -->
						        <div class="col-md-6 text-center">
						            <img src="images/services/data_sharing.webp" alt="Team collaboration" class="img-fluid rounded p-4">
						        </div>
						    </div>
						</div>

							<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div style="background: teal;" class=" p-5">
							        	 <h2 class="mb-1 text-light">Key Features of Snowflake</h2>
							          
							            <ul class="benefits-list text-light">
							                <li><span class="checkmark">✓</span> Cloud-Native Architecture: Snowflake is built to run seamlessly on popular cloud platforms like AWS, Azure, and Google Cloud, ensuring flexibility and reliability.</li>
							                <li><span class="checkmark ">✓</span> Separation of Compute and Storage: Snowflake allows independent scaling of compute and storage resources, making it cost-effective and efficient for various workloads.</li>
							                <li><span class="checkmark">✓</span> Data Sharing and Collaboration: Snowflake's Secure Data Sharing enables instant, real-time sharing of data across organizations without the need for data replication.</li>
							                <li><span class="checkmark">✓</span> Support for Structured and Semi-Structured Data: Snowflake natively supports diverse data formats like JSON, Avro, Parquet, and ORC, simplifying the integration of complex datasets.</li>
							                <li><span class="checkmark">✓</span>Built-in Security and Governance: With robust encryption, role-based access controls, and compliance with industry standards, Snowflake ensures that your data remains secure.</li>
							            </ul>
  
							        </div>

							       
							    </div>
							</div>

						<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	  <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/data_warehouse.webp">
				        	</div>
				           
							  </div>
				    	
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Data Warehousing & Data Lakes</h2><br>
				            <p>Snowflake’s advanced architecture is ideal for building scalable and high-performing data warehouses that support real-time analytics and reporting.</p>
				            <p>Simplify your data lake strategy with Snowflake by consolidating structured and semi-structured data into a unified platform for comprehensive analysis.</p>
				            <br>
				          
				        </div>
				        
				        
				      
				    </div>
						</div>

						<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Business Intelligence & Real-Time Analytics</h2><br>
				            <p>Integrate Snowflake with BI tools like Tableau, Power BI, and Looker to uncover actionable insights and enhance decision-making.</p>
				            <p>Enable real-time monitoring and analytics to drive immediate business decisions, such as customer personalization or operational efficiency.</p><br>
				          
				        </div>
				         <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/header.webp">
				        	</div>
				           
							  </div>
				        
				      
				    </div>
						</div>

							
							</div>
							<?php endif ?>

								<!-- start of snowflake for Microsoft Dynamics 365 	 -->
							<?php if ($_GET['name']=="dynamics365"): ?>
							<div class="container">	
							<h3 class="text-center">Digital Services: Microsoft Dynamics 365 	<center><hr class="default-background hr" ></center></h3>
								
							<div class="container-fluid solutions-section text-white py-5 mt-5">
						    <div class="row align-items-center">
						        <!-- Text Column -->
						        <div class="col-md-6  text-center text-md-left">
						           <div class="m-5">
							            <h2 class="text-light">Microsoft Dynamics 365 Solutions</h2>
							            <p class="text-light">Microsoft Dynamics 365 is a cloud-based suite of intelligent business applications that combine CRM (Customer Relationship Management) and ERP (Enterprise Resource Planning) capabilities. It empowers organizations to drive innovation, optimize workflows, and deliver exceptional customer experiences.</p>
							            <p class="text-light">From sales and marketing to finance and operations, Dynamics 365 unifies data, streamlines processes, and fosters collaboration across teams.</p>
							            <a  href="#consultation" class="btn btn-outline-light mt-3 text-light">Request A MS Dynamics 365 Solution</a>
						          	</div>
						        </div>
						        
						        <!-- Image Column -->
						        <div class="col-md-6 text-center">
						            <img src="images/services/365_header.webp" alt="Team collaboration" class="img-fluid rounded p-4">
						        </div>
						    </div>
						</div>

							<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div style="background: teal;" class=" p-5">
							        	 <h2 class="mb-1 text-light">Key Features of Microsoft Dynamics 365</h2>
							          
							            <ul class="benefits-list text-light">
							                <li><span class="checkmark">✓</span> Unified Platform- Seamlessly integrates ERP and CRM functionalities, ensuring a connected and streamlined approach to business management.</li>
							                <li><span class="checkmark ">✓</span> Artificial Intelligence and Insights- Leverages AI-driven analytics and predictive insights to make smarter, faster decisions.</li>
							                <li><span class="checkmark">✓</span> Customization and Scalability- Tailor solutions to meet your unique business needs, and scale effortlessly as your business grows.</li>
							                <li><span class="checkmark">✓</span> Cross-Platform Integration- Works harmoniously with Microsoft 365, Power Platform, and third-party applications for a complete digital ecosystem.</li>
							                <li><span class="checkmark">✓</span>Industry-Specific Solutions- Provides specialized modules for industries such as retail, manufacturing, healthcare, and finance.</li>
							            </ul>
  
							        </div>

							       
							    </div>
							</div>

						<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	  <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/sales_automation.webp">
				        	</div>
				           
							  </div>
				    	
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Sales Automation & Marketing Optimization</h2><br>
				            <p>Equip sales teams with AI-driven tools to manage pipelines, close deals faster, and deliver personalized customer experiences.</p>
				            <p>Plan, execute, and analyze campaigns with Dynamics 365 Marketing, enhancing engagement through customer insights.</p>
				            <br>
				          
				        </div>
				        
				        
				      
				    </div>
						</div>

						<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Customer Service Excellence & Finance and Operations</h2><br>
				            <p>Streamline financial processes, automate workflows, and optimize supply chain operations with Dynamics 365 Finance and Supply Chain Management.</p>
				            <p>Empower support teams to provide seamless and efficient customer service with intuitive tools and real-time insights.</p><br>
				          
				        </div>
				         <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/365_last.webp">
				        	</div>
				           
							  </div>
				        
				      
				    </div>
						</div>

							<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	 <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/customer_service.webp">
				        	</div>
				           
							  </div>
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Human Resource Management & Project Management</h2><br>
				            <p>Manage employee lifecycles, performance, and compliance with Dynamics 365 Human Resources.</p>
				            <p>Plan, track, and execute projects with Dynamics 365 Project Operations, ensuring timely delivery and budget management.</p><br>
				          
				        </div>
				        
				        
				      
				    </div>
						</div>
							</div>
							<?php endif ?>


							<!-- start of snowflake for SQL and Data Engineering 	 -->
							<?php if ($_GET['name']=="sql-data-warehousing"): ?>
							<div class="container">	
							<h3 class="text-center">Digital Services: SQL and Data Engineering 	<center><hr class="default-background hr" ></center></h3>
								
							<div class="container-fluid solutions-section text-white py-5 mt-5">
						    <div class="row align-items-center">
						        <!-- Text Column -->
						        <div class="col-md-6  text-center text-md-left">
						           <div class="m-5">
							            <h2 class="text-light">SQL and Data Engineering Solutions</h2>
							            <p class="text-light">SQL (Structured Query Language) is the standard programming language for managing and interacting with relational databases. It is the foundation for organizing, storing, retrieving, and analyzing data efficiently. With SQL, organizations can access and manipulate data seamlessly, ensuring that they derive value from their data assets.</p>
							            <p class="text-light">Data Engineering involves designing, building, and maintaining systems for collecting, storing, and analyzing large sets of data. It is a critical discipline in data-driven organizations, ensuring that data is accessible, reliable, and optimized for use in analytics, machine learning, and business intelligence.</p>
							            <a  href="#consultation" class="btn btn-outline-light mt-3 text-light">Request SQL and Data Engineering Solution</a>
						          	</div>
						        </div>
						        
						        <!-- Image Column -->
						        <div class="col-md-6 text-center">
						            <img src="images/services/sql_header.webp" alt="Team collaboration" class="img-fluid rounded p-4">
						        </div>
						    </div>
						</div>

							<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div style="background: teal;" class=" p-5">
							        	 <h2 class="mb-1 text-light">The Role of SQL in Data Engineering</h2>
							          
							            <ul class="benefits-list text-light">
							                <li><span class="checkmark">✓</span> Design and Manage Databases- Use SQL to create, modify, and manage database schemas and structures.</li>
							                <li><span class="checkmark ">✓</span> ETL Processes- Facilitate Extract, Transform, and Load (ETL) pipelines to move data between systems and clean it for analysis.</li>
							                <li><span class="checkmark">✓</span> Data Integration- Combine data from multiple sources, creating a unified view for analytics and reporting.</li>
							                <li><span class="checkmark">✓</span> Data Quality Management- Implement SQL queries to identify and resolve data inconsistencies or missing values..</li>
							                <li><span class="checkmark">✓</span>Performance Optimization- Write optimized SQL queries to enhance database performance and reduce latency.</li>
							            </ul>
  
							        </div>

							       
							    </div>
							</div>

						<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	  <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/sql_business_intel.webp">
				        	</div>
				           
							  </div>
				    	
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Business Intelligence & Machine Learning</h2><br>
				            <p>Build robust data pipelines that feed into BI tools like Power BI, Tableau, or Looker, enabling real-time decision-making.</p>
				            <p>Prepare and transform data for machine learning models by integrating SQL with Python or R.</p>
				            <br>
				          
				        </div>
				        
				        
				      
				    </div>
						</div>

						<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Data Warehousing & Streaming Data Processing</h2><br>
				            <p>Design and optimize data warehouses to store historical and transactional data for analysis.</p>
				            <p>Manage real-time data streams for use cases like fraud detection or personalized recommendations.</p><br>
				          
				        </div>
				         <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/sql_data_warehousing.webp">
				        	</div>
				           
							  </div>
				        
				      
				    </div>
						</div>

							<div class="container my-5 mt-4">
				    <div class="row align-items-center">
				    	 <!-- Image Section -->
				        <div class="col-md-6 text-center">
				        	<div class="video-container">
				        		<img src="images/services/sql_cloud_based.webp">
				        	</div>
				           
							  </div>
				        <!-- Text Section -->
				        <div class="col-md-6">
				            <h2 class="font-weight-bold">Cloud-Based Data Solutions</h2><br>
				            <p>Work with cloud platforms like AWS, Azure, and Google Cloud to implement scalable and reliable data systems.</p>
				           <br>
				          
				        </div>
				        
				        
				      
				    </div>
						</div>
							</div>
							<?php endif ?>


							<!-- start of snowflake for API Data Access	 	 -->
							<?php if ($_GET['name']=="apidataaccess"): ?>
							<div class="container">	
							<h3 class="text-center">Digital Services: API Data Access	<center><hr class="default-background hr" ></center></h3>
								
							<div class="container-fluid solutions-section text-white py-5 mt-5">
						    <div class="row align-items-center">
						        <!-- Text Column -->
						        <div class="col-md-6  text-center text-md-left">
						           <div class="m-5">
							            <h2 class="text-light">APIs in Data Access</h2>
							            <p class="text-light">API (Application Programming Interface) data access allows applications to interact with and retrieve data from external or internal systems, enabling seamless integration and data flow. APIs are the backbone of modern applications, offering developers the ability to access, manipulate, and utilize data from various sources like cloud platforms, databases, and third-party services.</p>
							            
							            <a  href="#consultation" class="btn btn-outline-light mt-3 text-light">Request API Data Access Solution</a>
						          	</div>
						        </div>
						        
						        <!-- Image Column -->
						        <div class="col-md-6 text-center">
						            <img src="images/services/api_integration.webp" alt="Team collaboration" class="img-fluid rounded p-4">
						        </div>
						    </div>
						</div>

							<div class="container-fluid mt-5">
							    <div class="row">
							        <!-- Left Column -->
							        <div style="background: teal;" class=" p-5">
							        	 <h2 class="mb-1 text-light">The Role of APIs in Data Access</h2>
							          
							            <ul class="benefits-list text-light">
							                <li><span class="checkmark">✓</span> Access Real-Time Data- Fetch up-to-date information from systems like databases, cloud platforms, and external services.</li>
							                <li><span class="checkmark ">✓</span>Enable Seamless Integration- Connect disparate systems, allowing smooth data exchange between applications.</li>
							                <li><span class="checkmark">✓</span> Support Scalability- APIs allow businesses to scale their operations by integrating additional data sources or applications as needed.</li>
							                <li><span class="checkmark">✓</span>Enhance Automation- Automate workflows by using APIs to retrieve and process data programmatically.</li>
							               
							            </ul>
  
							        </div>

							       
							    </div>
							</div>

							<div class="container-fluid mt-5">
							    <div class="row">
							       
							        <!-- Left Column -->
							        <div class="bg-success shadow p-5">
							        	 <h2 class="mb-1 text-light">API Data Access with Azure</h2>
							          
							            <ul class="benefits-list text-light">
							                <li><span class="checkmark">✓</span> Azure REST APIs- Access Azure resources such as Virtual Machines, Storage Accounts, and Databases using secure REST APIs.</li>
							                <li><span class="checkmark ">✓</span>Azure Data Factory API- Automate and orchestrate ETL processes to integrate data from various sources into a centralized system.</li>
							                <li><span class="checkmark">✓</span> Azure OpenAI API- Leverage AI models like GPT for advanced data processing and insights.</li>
							                <li><span class="checkmark">✓</span>Azure Cognitive Services API- Access pre-built AI models for vision, speech, language, and decision-making.</li>
							                 <li><span class="checkmark">✓</span>Azure API Management- Securely publish, monitor, and manage APIs at scale.</li>
							               
							            </ul>
  
							        </div>


							       
							    </div>
							</div>

							<div class="container-fluid mt-5">
							    <div class="row">
							       
							        <!-- Left Column -->
							        <div class="bg-secondary shadow  col-lg-12 p-5">
							        	 <h2 class="mb-1 text-light">Benefits of API Data Access</h2>
							          
							            <ul class="benefits-list text-light">
							                <li><span class="checkmark">✓</span>Real-Time Insights: Access up-to-date information for decision-making.</li>
							                <li><span class="checkmark ">✓</span>Enhanced Collaboration: Share data seamlessly across platforms and teams.</li>
							                <li><span class="checkmark">✓</span> Custom Solutions: Build tailored applications leveraging diverse data sources.</li>
							                <li><span class="checkmark">✓</span>Cost Efficiency: Automate data retrieval and processing, reducing manual effort.</li>
							                 <li><span class="checkmark">✓</span>Scalability: Integrate additional APIs as business needs grow.</li>
							               
							            </ul>
  
							        </div>


							       
							    </div>
							</div>
							</div>


							</div>
							<?php endif ?>
							<!-- start of power pages for digital services -->
							<?php if ($_GET['name']=="virtualagents"): ?>
							<div class="container">	
							<h3 class="">Digital Services: Power Virtual Agents - Engage Customers with Intelligent Chatbots <center><hr class="default-background hr" ></center></h3>
							<h5 class="mt-2 mb-2">Create Smart Chatbots to Enhance Customer Engagement</h5>
							<p>Power Virtual Agents allows you to create powerful AI-driven chatbots that can interact with customers, answer questions, and resolve issues—all without the need for coding. These chatbots can be deployed across multiple channels, including websites, Microsoft Teams, and social media, making it easier than ever to provide consistent support. </p>
							<blockquote>
								<p> 
								<h5 class="text-light"><i class="icofont-quote-left"></i><strong>Key Features</strong></h5> 
							</p>
							
							<ol class="ml-5">
								<li class="mt-1">No-Code Bot Building: Design chatbots with a simple drag-and-drop interface.  </li>
								<li class="mt-1">AI-Powered Conversations: Utilize AI to understand and respond to customer inquiries effectively.  </li>
								<li class="mt-1">Omni-Channel Deployment: Deploy your chatbot on websites, messaging platforms, and more. </li>
							
								
							</ol>	
														
							</blockquote>
							
							</div>
							<?php endif ?>



							<!-- start of power roboticprocessing for digital services -->
							<?php if ($_GET['name']=="roboticprocessing"): ?>
							<div class="container">	
							<h3 class="">Digital Services: Robotic Process Automation (RPA) - Automate Manual Tasks with Ease 	<center><hr class="default-background hr" ></center></h3>
							<h5 class="mt-2 mb-2">Streamline Your Business Processes with RPA</h5>
							<p>Robotic Process Automation (RPA) with Microsoft Power Automate enables you to automate repetitive, rule-based tasks by mimicking human interactions with digital systems. RPA bots can handle high-volume, manual tasks such as data entry, report generation, and transaction processing, reducing errors and saving valuable time.</p>
							<blockquote>
								<p> 
								<h5 class="text-light"><i class="icofont-quote-left"></i><strong>Key Capabilities</strong></h5> 
							</p>
							
							<ol class="ml-5">
								<li class="mt-1">Automate Manual Processes: Create bots that perform repetitive tasks quickly and accurately.  </li>
								<li class="mt-1">Increase Efficiency: Free up employees to focus on more strategic work.  </li>
								<li class="mt-1">Scalable Automation: Deploy RPA bots across your organization, regardless of scale. </li>
								
							</ol>	
														
							</blockquote>
							
							</div>
							<?php endif ?>

							<!-- start of power sharepointonline for digital services -->
							<?php if ($_GET['name']=="sharepointonline"): ?>
							<div class="container">	
							<h3 class="">Digital Services: SharePoint Online - Collaborate and Manage Content Securely <center><hr class="default-background hr" ></center></h3>
							<h5 class="mt-2 mb-2">Empower Team Collaboration and Content Management</h5>
							<p>SharePoint Online is your go-to platform for secure content management, document sharing, and team collaboration. With SharePoint Online, you can create intranets, manage documents, and collaborate in real-time, all while ensuring your data remains secure and compliant.</p>
							<blockquote>
								<p> 
								<h5 class="text-light"><i class="icofont-quote-left"></i><strong>Key Features</strong></h5> 
							</p>
							
							<ol class="ml-5">
								<li class="mt-1">Document Management: Store, organize, and share documents with ease. </li>
								<li class="mt-1">Intranet Solutions: Build company intranets that facilitate communication and information sharing. </li>
								<li class="mt-1">Integration: Seamlessly integrate with Microsoft 365 for enhanced productivity. </li>
								
							</ol>	
														
							</blockquote>
							
							</div>
							<?php endif ?>
							<!-- start of power copilot for digital services -->
							<?php if ($_GET['name']=="copilot"): ?>
							<div class="container">	
							<h3 class="">Digital Services: Your AI-Powered Assistant in Microsoft 365 	<center><hr class="default-background hr" ></center></h3>
							<h5 class="mt-2 mb-2">Work Smarter with CoPilot - AI-Powered Assistance</h5>
							<p>CoPilot is the AI-driven assistant integrated into Microsoft 365 apps, designed to help you work more efficiently. Whether you're drafting documents, creating presentations, or analyzing data, CoPilot can suggest ideas, automate tasks, and provide insights, allowing you to focus on what matters most.</p>
							<blockquote>
								<p> 
								<h5 class="text-light"><i class="icofont-quote-left"></i><strong>Key Features</strong></h5> 
							</p>
							
							<ol class="ml-5">
								<li class="mt-1">Automate Manual Processes: Create bots that perform repetitive tasks quickly and accurately.  </li>
								<li class="mt-1">Intelligent Suggestions: Receive AI-powered recommendations while you work. </li>
								<li class="mt-1">Task Automation: Let CoPilot handle routine tasks, from email drafting to data analysis.  </li>
								<li class="mt-1">Data-Driven Insights: Get real-time insights to make informed decisions quickly. </li>
								
							</ol>	
														
							</blockquote>
							
							</div>
							<?php endif ?>

							<!-- start of power powerplatform for digital services -->
							<?php if ($_GET['name']=="powerplatform"): ?>
							<div class="container">	
							<h3 class="">Digital Services: Power Pages - Create Engaging Websites Effortlessly  	<center><hr class="default-background hr" ></center></h3>
							<h5 class="mt-2 mb-2">Build and Launch Websites with No Limits</h5>
							<p>Power Pages provides the tools you need to create professional, responsive websites that meet your business goals. Whether you're showcasing a product, offering services, or connecting with customers, Power Pages makes it easy to design and deploy websites that deliver impact. </p>
							<blockquote>
								<p> 
								<h5 class="text-light"><i class="icofont-quote-left"></i><strong>Key Features</strong></h5> 
							</p>
							
							<ol class="ml-5">
								<li class="mt-1">Customizable Templates: Choose from a variety of templates designed for different industries. </li>
								<li class="mt-1">Responsive Design: Ensure your website looks great on any device. </li>
								<li class="mt-1">Secure and Scalable: Built-in security and compliance features to protect your data. </li>
								<li class="mt-1">Data-Driven Insights: Get real-time insights to make informed decisions quickly. </li>

								
							</ol>	
									<strong class="mt-5">Call to Action: "Design Your Website with Power Pages" </strong>					
							</blockquote>
							
							</div>
							<?php endif ?>

							<!-- start of power powerplatform for digital services -->
							<?php if ($_GET['name']=="databricks"): ?>
							<div class="container">	
							<h3 class="text-center">Data Services: Databricks	<center><hr class="default-background hr" ></center></h3>
							<center><img width="100" height="100" class="img-fluid p-2" src="https://cdn.brandfetch.io/idSUrLOWbH/theme/dark/symbol.svg?k=bfHSJFAPEG"></center>
							<p>In today’s fast-paced digital landscape, leveraging data effectively is crucial for business success. At armely, we specialize in Databricks consulting services that empower organizations to harness the full potential of their data. Our expert team is dedicated to helping you streamline your data workflows, enhance analytics capabilities, and drive innovation through data-driven insights. </p>
							<blockquote>
								<p> 
								<h5 class="text-light"><i class="icofont-quote-left"></i><strong> Our Services </strong></h5> 
							</p>
							
							<ol class="ml-5">
								<li class="mt-1">Databricks Implementation.</li>
								<li class="mt-1">Data Engineering</li>
								<li class="mt-1">Data Analytics & Visualization</li>
								<li class="mt-1">Support</li>
								<li class="mt-1">Training and Development</li>

								
							</ol>	
											
							</blockquote>
							<h5 class="mt-2 mb-2">Why Choose us?</h5>
							<p>
								Every organization is unique, we architect and implement tailored solutions that fit your goal and address your challenges. Our experienced data engineers works with our customers to guide through each step of implementation, orchestration and customization. 
							</p><br>
							<p>
								Our partnership with Databricks positions us greatly to ensure you get the best out the platform. 
							</p>
							</div>
							<?php endif ?>
						</section>

						<!-- Start Appointment -->
						<section class="appointment">
						<div class="container">
						<div class="row">
						<div class="col-lg-12">

						<div class="section-title">
							<h2 id="consultation">Schedule a consultation today	</h2>
							<center><hr class="default-background hr" ></center>
							
						</div>
						</div>
						</div>

						<div class="row">

						<div class="col-lg-12 col-md-6 col-12 d-flex text-center default-background mb-5">
						<form class="form p-5" id="contact-form" method="post">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group input-with-background">
										<input required class="remove-input-background" name="name" type="text" placeholder="Name">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input required class="remove-input-background" name="email" type="email" placeholder="Email">
									</div> 
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input required class="remove-input-background" name="phone" type="text" placeholder="Phone">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input required class="remove-input-background" name="organization" type="text" placeholder="Orginazation Name">
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-12">
									<div class="form-group">
										<textarea required class="remove-input-background" name="message" placeholder="Write Your Message Here....."></textarea>
									</div>
								</div>
								<div class="form-group ml-3">
									<div class="button">
										<button type="submit" class="btn send-message-btn" name="submit_form">Send Message</button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5 col-md-4 col-12">
									
								</div>
							</div>
						</form>
						</div>
						</div>

						</div>
						<!-- End Appointment -->

						</section>
						<!--/ End Pricing Table -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Portfolio Details Area -->
<?php else: ?>
<!-- <div class="container mt-5">
	<center>
		<div class="card text-center col-4 bg-danger  d-flex align-items-center p-2">
			<h3 class="text-light"><i class="icofont-warning-alt"></i> Warning</h3>
			<p class="text-light">No data was found!!</p>
		</div>
	</center> -->
</div>
<?php endif ?>
<?php if(isset($_GET['title'])): ?>
<div class="container mt-5">
	<?php displayServicesDetails(); ?>
</div>
	<?php endif ?>


		
		<section>	
		<!-- Floating Action Button -->
		   <div class="floating-btn">
		    <button id="myBtn"  style="border-radius: 50%; height: 60px; width: 60px; background-color: rgb(47,85,151);"  type="button" class="btn btn-primary btn-lg h1">
		      <i class="fa fa-comments "></i>
		    </button>
		  </div>
		<div id="myModal" class="modal-chat">

		  <!-- Modal content -->
		  <div class="modal-content-chat col-lg-4">
		    <span class="close">&times;</span>
		    <iframe src="https://copilotstudio.microsoft.com/environments/Default-588cadf4-9902-4465-86c0-8bcf04f4f102/bots/crc65_armelyCom/webchat?__version__=2"
		    frameborder="0" style="width: 100%; height: 80%;"></iframe>  
		  </div>

		</div>
		</section>

		<?php echo getFooter(); ?>