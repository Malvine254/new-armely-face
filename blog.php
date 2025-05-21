<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("blog"); ?>
<!-- End Header Area -->
		
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Blogs</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Blogs</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Single News -->
<section class="news-single section">
	<div class="container col-lg-11">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					<div class="col-12" >
					<?php if (isset($_GET['blogId'])) {
						displayBlogFullDetals();
					} else{
						selectblogByDefault();
					}

					?>


					</div>

				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="main-sidebar">
					<!-- Single Widget -->
					<div class="single-widget search">
						<div class="form">
							<input id="searchBar" type="email" placeholder="Search Here...">
							<a class="button default-background" href="#"><i class="fa fa-search"></i></a>
						</div>
					</div>
					<!--/ End Single Widget -->
					
					<!-- Single Widget -->
					<div class="single-widget recent-post box">
						<h3 class="title">Recent post</h3>
						<!-- Single Post -->
						<p style="display: none;" class="alert alert-danger" id="noResults">No results found!!</p>
						<div style="overflow-y: scroll; height:183vh;"><?php displayRecentBlogsOthers() ?></div>
						<!-- End Single Post -->
						
						
					</div>
				
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Single News -->


<?php echo getFooter(); ?>
