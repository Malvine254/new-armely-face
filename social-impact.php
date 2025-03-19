<?php include 'php/actions.php'; include 'php/header_footer.php';?>
<link rel="stylesheet" href="more_style.css">

<!-- Start of Header Area -->
<?php  echo getHeader("social impact"); ?>
<!-- End Header Area -->
        
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>Social Impact</h2>
                    <ul class="bread-list">
                        <li><a href="index">Home</a></li>
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
            <div class="col-lg-8 col-md-12 text-content">
                <h2 class="mb-2">Social Impact</h2>
                <p class="section-description">
                    Armely aspires to make a lasting, positive impact on the environment, 
                    the communities in which we work and live, and business ethics. 
                    Explore environmental, social, and governance (ESG) stories that align 
                    with our corporate social responsibility (CSR) goals.
                </p>
            </div>

            <!-- Right Image Column -->
            <div class="col-lg-4 col-md-12 text-center">
                <img src="img/blog1.jpg" class="img-fluid impact-image lazy-img" alt="Social Impact">
            </div>
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
                    <img src="img/blog1.jpg" class="img-fluid lazy-img lazy-img" alt="Sidebar Image">
                    <h4 class="sidebar-title">Got 5 minutes?</h4>
                    <p class="sidebar-text">Join thousands of tech leaders and get actionable insights on AI, cloud, cybersecurity, and more delivered to your inbox.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Blog Section -->
<section class="blog-grid section">
    <div class="container">
        <div class="row">
            <!-- Blog Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <img src="img/blog3.jpg" class="img-fluid blog-card-image lazy-img lazy-img" alt="Blog Image">
                    <div class="blog-content">
                        <span class="date">September 15, 2022</span>
                        <h3 class="blog-title">How Armely SkillsBuild Accelerated a Community College Student’s Career Journey</h3>
                        <p class="blog-desc">3 min read - In celebration of National Online Learning Day, which highlights the benefits and limitless possibilities of online education...</p>
                    </div>
                </div>
            </div>

            <!-- Blog Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <img src="img/blog2.jpg" class="img-fluid blog-card-image lazy-img lazy-img" alt="Blog Image">
                    <div class="blog-content">
                        <span class="date">September 12, 2022</span>
                        <h3 class="blog-title">Purpose-Driven Individuals: Meet 5 Armely Volunteers Taking Action Against Climate Change</h3>
                        <p class="blog-desc">6 min read - Extraordinary Achievements: When Talent, Skills, and Passion Align with Purpose...</p>
                    </div>
                </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <img src="img/blog1.jpg" class="img-fluid blog-card-image lazy-img lazy-img" alt="Blog Image">
                    <div class="blog-content">
                        <span class="date">June 9, 2022</span>
                        <h3 class="blog-title">The Impact of Giving Back: Celebrating Armely Volunteers Worldwide</h3>
                        <p class="blog-desc">2 min read - Since 2018, Armely’s Volunteer Excellence Awards have been annually presented by our Chairman and CEO, continuing to this day...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="news-single section">
    <div class="container">
        <div class="row">
            <!-- Blog Posts (Left Column) -->
            <div class="col-lg-8">
    
               <?php displayAllSocialImpact(); ?>

                <!-- Add more blog posts here -->
            </div>

           
        </div>
    </div>
</section>

<!-- Featured Blog Section -->
<section class="featured-blogs section">
    <div class="container col-10">
        <h2 class="section-title text-center">Featured by Topic</h2>

        <!-- Carousel Wrapper -->
        <div class="owl-carousel blog-carousel">
            <?php displayFutureSocialImpact(); ?>

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