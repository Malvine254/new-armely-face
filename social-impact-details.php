<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<?php $array_body = moreDetailsForSocialImpactPosts(); ?>

<!-- Start of Header Area -->
<?php  echo getHeader("blog"); ?>
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

<!-- Article Details Page -->
<section class="article-section">
    <div class="container">
        <div class="row">
            <!-- Main Article Content -->
            <div class="col-lg-8">
                <!-- Featured Image -->
                <div class="article-image">
                    <img src="img/<?php echo $array_body['image_url']; ?>" class="img-fluid" alt="Article Featured Image">
                </div>

                <!-- Article Meta -->
                <div class="article-meta">
                    <span class="article-date"><?php echo $array_body['posted_date']; ?></span> • 
                    <span class="article-read-time">4 min read</span>
                </div>

                <!-- Article Title -->
                <h1 class="article-title">
                   <?php echo $array_body['title']; ?>
                </h1>

                <!-- Article Content -->
                <div class="article-content">
                    <p>
                        <?php echo $array_body['body']; ?>
                    </p>

                 <!--    <blockquote>
                        "This partnership represents a crucial step in ensuring that Indigenous communities play a 
                        significant role in Canada's transition to a low-carbon economy." – IBM Sustainability Team
                    </blockquote>
 -->
                 
                </div>
            </div>

            <!-- Sidebar with Related Articles -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="sidebar-title">Related Articles</h3>
                    
                    <!-- Related Article 1 -->
                    <?php  relatedArticles(); ?>

                    <!-- Author Bio -->
                    <div class="author-box">
                        <h4>About the Author</h4>
                        <p><strong> <?php echo $array_body['author_name']; ?></strong> is in  <?php echo $array_body['author_title']; ?> at armely</p>
                    </div>
                </div>
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
