<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("social impact"); ?>
<!-- End Header Area -->
 <link rel="stylesheet" href="more_style.css">       
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

<style>
.blog-carousel .item img {
  border-radius: 12px;
  object-fit: cover;
  height: 250px;
  width: 100%;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.blog-carousel .item:hover img {
  transform: scale(1.05);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}
.blog-card img {
  object-fit: cover;
  height: 200px;
  border-radius: 10px;
}
.blog-card {
  border: none;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transition: transform 0.3s ease;
}
.blog-card:hover {
  transform: translateY(-5px);
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
  background: #2f5597; /* Bootstrap primary color */
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

.blog-post:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
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
.blog-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
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
</style>
<!-- Social Impact Section -->
<section class="social-impact-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Text Column -->
            <div class="col-lg-7 col-md-12 text-content">
                <h2 class="mb-2">Social Impact</h2>
                <p class="section-description">
                   Armely is committed to making a lasting and meaningful impact on the environment, the communities where we work and live, and the ethical standards that guide our business. Our dedication to environmental, social, and governance (ESG) principles reflects our responsibility to drive positive change while fostering innovation, sustainability, and inclusivity.  

                </p>
                <p>Discover inspiring ESG stories that showcase how Armely aligns with its corporate social responsibility (CSR) goals—creating a future where businesses, people, and the planet thrive together.</p>
            </div>

            <!-- Right Image Column -->
            <div class="col-lg-5 col-md-12 text-center">
                <img src="images/gallery/gallery-10.jpeg" class="img-fluid impact-image " alt="Social Impact">
            </div>
        </div>
    </div>
</section>

<!-- Featured Blog Section -->
<section class="featured-blogs section">
    <div class="container col-10">
        <h2 class="section-title text-center">Our Gallery</h2>

        <!-- Carousel Wrapper -->
        <div class="owl-carousel blog-carousel">
            <?php displayGallery(); ?> 

        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="news-single section">
    <div class="container">
        
        <div class="row">
            <!-- Blog Posts (Left Column) -->
            <div class="col-lg-8">

               

               <?php  displayNewSocialImpact(); ?>

                <!-- Add more blog posts here -->
            </div>

            <!-- Sidebar (Right Column) -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <img src="images/careers/software.png" class="img-fluid  " alt="Sidebar Image">
                    <h4 class="sidebar-title">Got 5 minutes?</h4>
                    <p class="sidebar-text"><a href="contact" class="text-primary">Contact us to get actionable insights on AI, cloud, cybersecurity, and more delivered to your inbox.</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Blog Section -->
<section class="blog-grid section">
    <div class="container">
        <h2 class="section-title text-center">All Posts</h2>
        <div class="row">
            <?php displayFutureSocialImpact(); ?>


           
           
        </div>
    </div>
</section>

<!-- Blog Section -->
<!-- <section class="news-single section">
    <div class="container">
        <div class="row">
            <h2 class="section-title text-center">Future Visits</h2>
            
            <div class="col-lg-8">
             
               <?php //displayAllSocialImpact(); ?>

              
            </div>

           
        </div>
    </div>
</section> -->



<!-- jQuery (Required for Owl Carousel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  

<script>
$(document).ready(function(){
    $(".blog-carousel").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        navText: ["<", ">"],
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1024: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });
});
</script>


  <?php echo getFooter(); ?>