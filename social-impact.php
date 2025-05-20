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
                <img src="images/gallery/gallery_0.jpg" class="img-fluid impact-image " alt="Social Impact">
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
<section class="news-single section">
    <div class="container">
        <div class="row">
            <h2 class="section-title text-center">Future Visits</h2>
            <!-- Blog Posts (Left Column) -->
            <div class="col-lg-8">
             
               <?php displayAllSocialImpact(); ?>

                <!-- Add more blog posts here -->
            </div>

           
        </div>
    </div>
</section>



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