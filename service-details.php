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
			<li><a href="/">Home</a></li>
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
<div class="container py-4">
  <div class="row g-4">
   <?php displayFreemiums(); ?>

   
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
	<div class="inner-content" >
		
		<div class="body-text">
		<?php if ($_GET['name']==$_GET['name']): ?>
			<section class="container">
				
				

				<p> <?php 

					require 'php/config.php';
					$numbering = 1;
					$id = mysqli_real_escape_string($conn,$_GET['name']);
					$select = $conn->query("SELECT title,body,image_url,url_get_name FROM freemium WHERE title='$id'");
					if ($select->num_rows>0) {
						echo '<h3 class="default-color"><'.$id.'</h3>';
						while ($row=$select->fetch_assoc()) {
							echo $row['body'];
						}
					}else{
						// echo "
					    //   Nothing found!";
					}
				 ?></p>
			 
				 <?php 
				 $id = mysqli_real_escape_string($conn,$_GET['name']);
					$select = $conn->query("SELECT title,body,image_url,url_get_name FROM freemium WHERE title='$id'");
					if ($select->num_rows>0): ?>
				 	
				
			 <div class="container mt-3 row">

		        <div class="col-md-12 default-background">
		        	<h5 class="mb-5 text-light pt-2">Get Your Free <?php echo $_GET['name']; ?></h5>
		        	<label id="serviceTitle" style="display: none;"><?php if (isset($_GET['name'])) {
		        		echo $_GET['name'];
		        	} ?></label>
		        	<form class="form-group" method="post" id="offers-form" >
		        		<input style="display: none;" id="category1" required class="form-control p-3" type="text" name="category1"  value="<?php if (isset($_GET['name'])) {
		        		echo $_GET['name'];
		        	} ?>"><br>
		        		<input id="fullName" required class="form-control p-3" type="text" name="fname1"  placeholder="First Name"><br>
		        		<input required class="form-control p-3" type="text" name="lname1" placeholder="Last Name"><br>
		        		<input required class="form-control p-3" type="email" name="email1" placeholder="Company Email"><br>
		        		<input required  class="form-control p-3   " type="tel" name="phone1" placeholder="Phone Number"><br>
		        		<input required  class="form-control p-3   " type="text" name="country1" placeholder="Country"><br>  		
		        	
		        		<button type="submit" name="submit_offers_form" class="btn btn-primary">Download Now</button>
		        	</form>
		        </div>
		    </div>

		     <?php endif ?>


			</section>
			<?php endif ?>
		
			<?php if ($_GET['name']=="ai-advisory"): ?>
			<?php include 'php/services/ai-advisory.php'; ?>
			<?php endif ?>



						<?php if ($_GET['name']=="ai-consulting"): ?>
			<?php include 'php/services/ai-consulting.php'; ?>
			<?php endif ?>
						</section>	




						<?php if ($_GET['name']=="generative-ai"): ?>
			<?php include 'php/services/generative-ai.php'; ?>
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
<?php include 'php/services/data-strategy.php'; ?>
<?php endif ?>

					<?php if ($_GET['name']=="data-science"): ?>
<?php include 'php/services/data-science.php'; ?>
<?php endif ?>
					
					
				<!-- start of snowflake for SQL and Data Engineering 	 -->
				<?php if ($_GET['name']=="fabric"): ?>
<?php include 'php/services/fabric.php'; ?>
<?php endif ?>

				<?php if ($_GET['name']=="fabric_capacity"): ?>
<?php include 'php/services/fabric_capacity.php'; ?>
<?php endif ?>


				<!-- start of snowflake for SQL and Data Engineering 	 -->
				<?php if ($_GET['name']=="sqlsupport"): ?>
<?php include 'php/services/sqlsupport.php'; ?>
<?php endif ?>


				<!-- start of app support	 -->
				<?php if ($_GET['name']=="appsupport"): ?>
<?php include 'php/services/appsupport.php'; ?>
<?php endif ?>
				</div>


			</section>
			<!-- end of data services -->

			<section  class="container">


				<!-- start of power apps for digital services -->
					<?php if ($_GET['name']=="powerapps"): ?>
<?php include 'php/services/powerapps.php'; ?>
<?php endif ?>


				<!-- start of power automate for digital services -->
				<?php if ($_GET['name']=="powerautomate"): ?>
<?php include 'php/services/powerautomate.php'; ?>
<?php endif ?>

			<!-- start of snowflake for digital services -->
				<?php if ($_GET['name']=="snowflake"): ?>
<?php include 'php/services/snowflake.php'; ?>
<?php endif ?>

					<!-- start of snowflake for Microsoft Dynamics 365 	 -->
				<?php if ($_GET['name']=="dynamics365"): ?>
<?php include 'php/services/dynamics365.php'; ?>
<?php endif ?>


				<!-- start of snowflake for SQL and Data Engineering 	 -->
				<?php if ($_GET['name']=="sql-data-warehousing"): ?>
<?php include 'php/services/sql-data-warehousing.php'; ?>
<?php endif ?>


				<!-- start of snowflake for API Data Access	 	 -->
				<?php if ($_GET['name']=="apidataaccess"): ?>
<?php include 'php/services/apidataaccess.php'; ?>
<?php endif ?>
				<!-- start of power pages for digital services -->
				<?php if ($_GET['name']=="virtualagents"): ?>
<?php include 'php/services/virtualagents.php'; ?>
<?php endif ?>



				<!-- start of power roboticprocessing for digital services -->
				<?php if ($_GET['name']=="roboticprocessing"): ?>
<?php include 'php/services/roboticprocessing.php'; ?>
<?php endif ?>

				<!-- start of power sharepointonline for digital services -->
				<?php if ($_GET['name']=="sharepointonline"): ?>
<?php include 'php/services/sharepointonline.php'; ?>
<?php endif ?>
				<!-- start of power copilot for digital services -->
				<?php if ($_GET['name']=="copilot"): ?>
<?php include 'php/services/copilot.php'; ?>
<?php endif ?>

				<!-- start of power powerplatform for digital services -->
				<?php if ($_GET['name']=="powerplatform"): ?>
<?php include 'php/services/powerplatform.php'; ?>
<?php endif ?>

				<!-- start of Data Services: Databricks-->
				<?php if ($_GET['name']=="databricks"): ?>
<?php include 'php/services/databricks.php'; ?>
<?php endif ?>

				<?php if ($_GET['name']=="pocstarter-ai"): ?>
<?php include 'php/services/pocstarter-ai.php'; ?>
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

			<div class="col-lg-12 col-md-6 col-12 d-flex default-background mb-5">
			<form class="form p-5" id="contact-form" method="post">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<label class="text-start text-light">Name *</label>
						<div class="form-group input-with-background">
							<input required class="remove-input-background" name="name" type="text" placeholder="Name">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<label class="text-start text-light">Email *</label>
						<div class="form-group">
							<input required class="remove-input-background" name="email" type="email" placeholder="Email">
						</div> 
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<label class="text-start text-light">Phone Number *</label>
						<div class="form-group">
							<input required class="remove-input-background" name="phone" type="text" placeholder="Phone">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<label class="text-start text-light">Orginazation Name *</label>
						<div class="form-group">
							<input required class="remove-input-background" name="organization" type="text" placeholder="Organization Name">
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-12">
						<label class="text-start text-light">Message *</label>
						<div class="form-group">
							<textarea required class="remove-input-background" name="message" placeholder="Write Your Message Here....."></textarea>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label class="text-start text-light">Confirm you are not a robot *</label>
							<div class="g-recaptcha" data-sitekey="6Ld0Z0krAAAAAFCwIDiunmU9l68kT4Vm2cB7U7px"></div>
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