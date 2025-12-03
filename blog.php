<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("blog"); ?>
<link rel="stylesheet" href="css/blog-modern.css">
<!-- End Header Area -->
		
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay blog-breadcrumbs">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Our Insights & Stories</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Blog</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Blog Listing Section -->
<section class="blog-listing-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div id="blog-main-content">
					<?php if (isset($_GET['blogId'])) {
						displayBlogFullDetals();
					} else{
						selectblogByDefault();
					}
					?>
				</div>
			</div>
			
			<div class="col-lg-4 col-12">
				<div class="blog-sidebar">
					<!-- Search Widget -->
					<div class="sidebar-widget">
						<h3 class="sidebar-widget-title">Search Articles</h3>
						<div class="blog-search-form">
							<input id="searchBar" type="text" class="blog-search-input" placeholder="Search for articles...">
							<button class="blog-search-btn default-background"><i class="fa fa-search"></i></button>
						</div>
					</div>
					
					<!-- Recent Posts Widget -->
					<div class="sidebar-widget">
						<h3 class="sidebar-widget-title">Recent Posts</h3>
						<p style="display: none;" class="no-results-alert" id="noResults">No results found!</p>
						<div class="recent-posts-list">
							<?php displayRecentBlogsOthers() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blog Listing Section -->


<?php echo getFooter(); ?>
