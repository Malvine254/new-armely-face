<?php include 'php/actions.php'; include 'php/header_footer.php';?>
<link rel="stylesheet" href="more_style.css">

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
        
       <div class="col-lg-12 card p-4">
               

               <?php if (isset($_GET['social_id'])) {
                require 'php/config.php';
                   $social_id = mysqli_real_escape_string($conn,$_GET['social_id']);
               }  displayNewSocialImpactSingle($social_id); ?>

                <!-- Add more blog posts here -->
            </div>
            
    </div>
</section>

<!-- Blog Section -->
<section class="news-single section">
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
