<?php include 'php/actions.php'; include 'php/header_footer.php';?>
<link rel="stylesheet" href="more_style.css">
<style>
.blog-carousel .item img {
  border-radius: 12px;
  object-fit: cover;
  height: 250px;
  width: 100%;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}


.blog-card img {
  object-fit: cover;
  height: 250px;
  border-radius: 10px;
}
.blog-card {
  border: none;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transition: transform 0.3s ease;
}



.section-title {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 2rem;
  position: relative;
}
.section-title::after {
  content: "";
  width: 60px;
  height: 4px;
  background: #0d6efd;
  display: block;
  margin: 10px auto 0;
  border-radius: 2px;
}
.owl-carousel .owl-nav {
  position: relative;
  margin-top: 15px; /* space between slider and arrows */
  text-align: right; /* align arrows to the right */
}

.owl-carousel .owl-nav button.owl-prev,
.owl-carousel .owl-nav button.owl-next {
  background: #0d6efd; /* Bootstrap primary color */
  color: #fff !important;
  border: none;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  font-size: 18px !important;
  margin-left: 8px;
  transition: all 0.3s ease;
}

.owl-carousel .owl-nav button.owl-prev:hover,
.owl-carousel .owl-nav button.owl-next:hover {
  background: #0b5ed7; /* darker blue on hover */
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

.blog-post {
  border-radius: 12px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  overflow: hidden;
}



.blog-image {
  object-fit: cover;
  height: 100%;
  width: 100%;
}

.blog-title {
  color: #212529;
}

.blog-title:hover {
  color: #084196ff; /* Bootstrap primary */
  text-decoration: underline;
}
.blog-image {
  width: 100%;
  height: 200px; /* adjust this for consistent size */
  object-fit: cover; /* crop instead of stretch */
  border-radius: 8px;
}

.blog-card {
  border-radius: 12px;
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.blog-card-image {
  height: 150px; /* uniform image height */
  object-fit: cover;
}
.card-title {
  font-size: 1rem; /* smaller title */
  line-height: 1.3;
  margin-bottom: 0.5rem;/* keeps titles aligned */
}
.card-text {
  font-size: 0.85rem; /* smaller body */
  line-height: 1.4;
}
.blog-single-image {
  max-height: 400px;
  object-fit: cover;
  width: 100%;
}

.blog-meta span {
  margin-right: 10px;
  font-size: 0.9rem;
}

.blog-body {
  font-size: 1rem;
  line-height: 1.7;
  color: #333;
}

.blog-body p {
  margin-bottom: 1rem;
}
  
</style>
<!-- Start of Header Area -->
<?php  echo getHeader("social impact details"); ?>
<!-- End Header Area -->
        
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>Social Impact</h2>
                    <ul class="bread-list">
                        <li><a href="/">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Social Impact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->


<!-- Blog Section -->
<section class="news-single section">
    <div class="container">
        
       <div class="col-lg-12 p-4">
               

               <?php if (isset($_GET['social_id'])) {
                require 'php/config.php';
                   $social_id = mysqli_real_escape_string($conn,$_GET['social_id']);
               }  displayNewSocialImpactSingle($social_id); ?>

                <!-- Add more blog posts here -->
            </div>
            
    </div>
</section>

<!-- Blog Section -->
<section class="news-single section" style="background: #e7eaf1ff; padding: 40px 0;">
    <div class="container">
         <h2 class="section-title text-center">Related Topics</h2>
         <?php  displayNewSocialImpact(); ?>
    </div>
</section>



<!-- jQuery (Required for Owl Carousel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<?php echo getFooter(); ?>
