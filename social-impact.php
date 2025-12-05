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
:root {
    --default-color: #2f5597;
    --default-background: #2f5597;
}

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

/* Hero Section */
.social-impact-hero {
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(0,0,0,0.02) 0%, rgba(0,0,0,0) 100%);
    position: relative;
    overflow: hidden;
}

.social-impact-hero::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background: var(--default-background);
    opacity: 0.05;
    clip-path: polygon(30% 0, 100% 0, 100% 100%, 0% 100%);
}

.impact-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--default-background);
    color: #fff;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
    animation: fadeInUp 0.6s ease;
}

.impact-badge i {
    font-size: 18px;
}

.hero-title {
    font-size: 3rem;
    font-weight: 800;
    color: #222;
    margin-bottom: 20px;
    line-height: 1.2;
    animation: fadeInUp 0.8s ease;
}

.hero-subtitle {
    font-size: 1.2rem;
    color: #666;
    line-height: 1.8;
    margin-bottom: 15px;
    animation: fadeInUp 1s ease;
}

.hero-image-wrapper {
    position: relative;
    animation: fadeInRight 1s ease;
}

.hero-impact-image {
    border-radius: 30px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    transform: rotate(2deg);
    transition: all 0.5s ease;
}

.hero-impact-image:hover {
    transform: rotate(0deg) scale(1.05);
    box-shadow: 0 30px 80px rgba(0,0,0,0.2);
}

.impact-stats {
    display: flex;
    gap: 30px;
    margin-top: 40px;
    flex-wrap: wrap;
}

.stat-item {
    flex: 1;
    min-width: 150px;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--default-color);
    display: block;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 14px;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Gallery Section */
.gallery-section {
    padding: 80px 0;
    background: linear-gradient(to bottom, #f8f9fa 0%, #fff 100%);
    position: relative;
}

.section-header-modern {
    text-align: center;
    margin-bottom: 60px;
}

.section-tag {
    color: var(--default-color);
    font-weight: 600;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 2px;
    margin-bottom: 15px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.section-tag i {
    font-size: 18px;
}

.section-title-modern {
    font-size: 2.5rem;
    font-weight: 700;
    color: #222;
    margin-bottom: 15px;
}

.section-divider {
    width: 80px;
    height: 4px;
    background: var(--default-background);
    margin: 0 auto 20px;
    border-radius: 2px;
}

/* Photo Album Grid */
.photo-album-grid {
    margin-top: 50px;
}

/* Gallery Folder */
.gallery-folder {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.08);
    margin-bottom: 25px;
    overflow: hidden;
    border: 2px solid #f0f0f0;
    transition: all 0.3s ease;
}

.gallery-folder:hover {
    border-color: var(--default-background);
    box-shadow: 0 5px 25px rgba(0,0,0,0.12);
}

.folder-header {
    display: flex;
    align-items: center;
    padding: 20px 25px;
    background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
    cursor: pointer;
    transition: background 0.3s ease;
}

.folder-header:hover {
    background: linear-gradient(135deg, #f0f1f3 0%, #f8f9fa 100%);
}

.folder-icon {
    position: relative;
    font-size: 48px;
    color: var(--default-background);
    margin-right: 20px;
    transition: transform 0.3s ease;
}

.folder-header:hover .folder-icon {
    transform: scale(1.1);
}

.image-count {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: var(--default-color);
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 12px;
    min-width: 30px;
    text-align: center;
}

.folder-info {
    flex: 1;
}

.folder-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #222;
    margin: 0 0 8px 0;
    line-height: 1.3;
}

.folder-meta {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.folder-date {
    color: #666;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.folder-date i {
    color: var(--default-color);
}

.folder-badge {
    background: var(--default-background);
    color: #fff;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.folder-toggle {
    background: var(--default-background);
    color: #fff;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.folder-toggle:hover {
    background: var(--default-color);
    transform: scale(1.1);
}

.folder-toggle i {
    transition: transform 0.3s ease;
}

.folder-toggle.active i {
    transform: rotate(180deg);
}

.folder-content {
    padding: 0;
    max-height: 0;
    overflow: hidden;
    transition: all 0.4s ease;
}

.folder-content.open {
    padding: 25px;
    max-height: 5000px;
}

.folder-images-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
}

.folder-image-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    display: block;
    aspect-ratio: 1;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.folder-image-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.folder-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.folder-image-item:hover .folder-img {
    transform: scale(1.15);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.7) 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.folder-image-item:hover .image-overlay {
    opacity: 1;
}

.image-number {
    color: #fff;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
}

.image-overlay i {
    color: #fff;
    font-size: 32px;
}

/* Responsive */
@media (max-width: 768px) {
    .folder-header {
        padding: 15px;
    }
    
    .folder-icon {
        font-size: 36px;
        margin-right: 15px;
    }
    
    .folder-title {
        font-size: 1.1rem;
    }
    
    .folder-images-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
    }
    
    .folder-content.open {
        padding: 15px;
    }
}

/* Blog Posts Section */
.featured-posts-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.modern-blog-post {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    margin-bottom: 30px;
    border: 2px solid transparent;
    display: block;
    text-decoration: none;
}

.modern-blog-post:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    border-color: var(--default-background);
    text-decoration: none;
}

.blog-image-container {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.blog-post-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.modern-blog-post:hover .blog-post-image {
    transform: scale(1.1);
}

.blog-category-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: var(--default-background);
    color: #fff;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}

.blog-content-wrapper {
    padding: 25px;
}

.blog-date {
    color: #999;
    font-size: 13px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.blog-post-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #222;
    margin-bottom: 15px;
    line-height: 1.4;
    transition: color 0.3s ease;
}

.modern-blog-post:hover .blog-post-title {
    color: var(--default-color);
}

.blog-excerpt {
    color: #666;
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 20px;
}

.read-article-btn {
    color: var(--default-color);
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: gap 0.3s ease;
}

.read-article-btn:hover {
    gap: 15px;
    color: var(--default-color);
}

/* Sidebar */
.modern-sidebar {
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    position: sticky;
    top: 100px;
}

.sidebar-image {
    border-radius: 15px;
    margin-bottom: 20px;
    width: 100%;
}

.sidebar-heading {
    font-size: 1.5rem;
    font-weight: 700;
    color: #222;
    margin-bottom: 15px;
}

.sidebar-text {
    color: #666;
    line-height: 1.7;
    margin-bottom: 20px;
}

.sidebar-cta-btn {
    background: var(--default-background);
    color: #fff;
    padding: 12px 30px;
    border-radius: 25px;
    text-decoration: none;
    display: inline-block;
    font-weight: 600;
    transition: all 0.3s ease;
}

.sidebar-cta-btn:hover {
    background: var(--default-color);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    text-decoration: none;
}

/* All Posts Grid */
.posts-grid {
    padding: 80px 0;
    background: linear-gradient(to bottom, #fff 0%, #f8f9fa 100%);
}

.section-description {
    color: #666;
    font-size: 1.1rem;
    max-width: 600px;
    margin: 15px auto 0;
    line-height: 1.6;
}

/* Story Filters */
.story-filters {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin: 50px 0 40px;
    flex-wrap: wrap;
}

.filter-btn {
    background: #fff;
    border: 2px solid #e0e0e0;
    color: #666;
    padding: 12px 28px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.filter-btn i {
    font-size: 18px;
}

.filter-btn:hover {
    border-color: var(--default-color);
    color: var(--default-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.filter-btn.active {
    background: var(--default-background);
    border-color: var(--default-background);
    color: #fff;
    box-shadow: 0 5px 20px rgba(47,85,151,0.3);
}

.stories-container {
    position: relative;
}

.post-grid-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    border: 2px solid transparent;
    position: relative;
}

.post-grid-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--default-background), var(--default-color));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.post-grid-card:hover::before {
    transform: scaleX(1);
}

.post-grid-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    border-color: var(--default-background);
    text-decoration: none;
}

.grid-card-image-wrapper {
    position: relative;
    overflow: hidden;
    height: 240px;
}

.grid-card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.post-grid-card:hover .grid-card-image {
    transform: scale(1.15);
}

.grid-reading-time {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background: rgba(255,255,255,0.95);
    color: var(--default-color);
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
    backdrop-filter: blur(10px);
}

.grid-card-body {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.grid-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #222;
    margin-bottom: 12px;
    line-height: 1.4;
    transition: color 0.3s ease;
}

.post-grid-card:hover .grid-card-title {
    color: var(--default-color);
}

.grid-card-excerpt {
    color: #666;
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 20px;
    flex: 1;
}

.grid-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 15px;
    border-top: 1px solid #f0f0f0;
}

.grid-card-date {
    color: #999;
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.grid-card-arrow {
    color: var(--default-color);
    font-size: 20px;
    transition: transform 0.3s ease;
}

.post-grid-card:hover .grid-card-arrow {
    transform: translateX(5px);
}

/* Responsive */
@media (max-width: 768px) {
    .story-filters {
        gap: 10px;
    }
    
    .filter-btn {
        padding: 10px 20px;
        font-size: 14px;
    }
    
    .grid-card-image-wrapper {
        height: 200px;
    }
}

/* Owl Carousel Modern Styles */
.owl-carousel .owl-nav {
    position: relative;
    margin-top: 30px;
    text-align: center;
}

.owl-carousel .owl-nav button.owl-prev,
.owl-carousel .owl-nav button.owl-next {
    background: var(--default-background) !important;
    color: #fff !important;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 20px !important;
    margin: 0 8px;
    transition: all 0.3s ease;
}

.owl-carousel .owl-nav button.owl-prev:hover,
.owl-carousel .owl-nav button.owl-next:hover {
    background: var(--default-color) !important;
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.owl-carousel .item img {
    border-radius: 15px;
    object-fit: cover;
    height: 250px;
    width: 100%;
    transition: all 0.4s ease;
}

.owl-carousel .item:hover img {
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .modern-sidebar {
        margin-top: 30px;
        position: relative;
        top: 0;
    }
}
</style>
<!-- Social Impact Section -->
<section class="social-impact-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <div class="impact-badge">
                    <i class="icofont-heart-alt"></i>
                    <span>Making a Difference</span>
                </div>
                <h1 class="hero-title">Driving Positive Change Through Innovation</h1>
                <p class="hero-subtitle">
                    Armely is committed to making a lasting and meaningful impact on the environment, the communities where we work and live, and the ethical standards that guide our business.
                </p>
                <p class="hero-subtitle">
                    Our dedication to environmental, social, and governance (ESG) principles reflects our responsibility to drive positive change while fostering innovation, sustainability, and inclusivity.
                </p>
                
                <div class="impact-stats">
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Communities Impacted</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">100K+</span>
                        <span class="stat-label">Lives Touched</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">25+</span>
                        <span class="stat-label">ESG Initiatives</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 col-md-12">
                <div class="hero-image-wrapper text-center mt-4 mt-lg-0">
                    <img src="images/gallery/gallery-10.jpeg" class="img-fluid hero-impact-image" alt="Social Impact">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Blog Section -->
<section class="gallery-section">
    <div class="container">
        <div class="section-header-modern">
            <div class="section-tag"><i class="icofont-camera"></i> Our Journey</div>
            <h2 class="section-title-modern">Impact Photo Album</h2>
            <div class="section-divider"></div>
            <p style="color: #666; max-width: 700px; margin: 0 auto; font-size: 1.1rem;">
                Capturing moments of transformation, hope, and positive change across communities.
            </p>
        </div>

        <div class="photo-album-grid">
            <?php displayGallery(); ?> 
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="featured-posts-section">
    <div class="container">
        <div class="section-header-modern">
            <div class="section-tag">Latest Stories</div>
            <h2 class="section-title-modern">Featured Impact Stories</h2>
            <div class="section-divider"></div>
        </div>

        <div class="row">
            <!-- Blog Posts (Left Column) -->
            <div class="col-lg-8">
               <?php  displayNewSocialImpact(); ?>
            </div>

            <!-- Sidebar (Right Column) -->
            <div class="col-lg-4">
                <div class="modern-sidebar">
                    <img src="images/careers/software.png" class="sidebar-image" alt="Get Insights">
                    <h4 class="sidebar-heading">Got 5 minutes?</h4>
                    <p class="sidebar-text">
                        Get actionable insights on AI, cloud, cybersecurity, sustainability, and social impact delivered straight to your inbox.
                    </p>
                    <a href="contact" class="sidebar-cta-btn text-light">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- All Impact Stories Section -->
<section class="posts-grid">
    <div class="container">
        <div class="section-header-modern">
            <div class="section-tag"><i class="icofont-newspaper"></i> Explore More</div>
            <h2 class="section-title-modern">All Impact Stories</h2>
            <div class="section-divider"></div>
            <p class="section-description">Discover how we're making a difference in communities around the world</p>
        </div>

        <!-- Filter Tabs -->
        <div class="story-filters">
            <button class="filter-btn active" data-filter="all">
                <i class="icofont-layers"></i> All Stories
            </button>
            <button class="filter-btn" data-filter="new">
                <i class="icofont-star"></i> Featured
            </button>
            <button class="filter-btn" data-filter="future">
                <i class="icofont-rocket"></i> Upcoming
            </button>
        </div>

        <div class="row stories-container">
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
// Toggle folder function
function toggleFolder(button) {
    const folder = button.closest('.gallery-folder');
    const content = folder.querySelector('.folder-content');
    const icon = button.querySelector('i');
    
    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
        setTimeout(() => {
            content.classList.add('open');
        }, 10);
        button.classList.add('active');
    } else {
        content.classList.remove('open');
        setTimeout(() => {
            content.style.display = 'none';
        }, 400);
        button.classList.remove('active');
    }
}

// Optional: Click anywhere on header to toggle
$(document).ready(function(){
    $('.folder-header').click(function(e) {
        // Don't toggle if clicking on the button itself (to avoid double toggle)
        if (!$(e.target).closest('.folder-toggle').length) {
            $(this).find('.folder-toggle').click();
        }
    });
    
    // Story filter functionality
    $('.filter-btn').click(function() {
        const filter = $(this).data('filter');
        
        // Update active state
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        // Note: This is a visual demo. In production, you'd filter based on data attributes
        // For now, all stories remain visible
        $('.post-grid-card').parent().fadeOut(300, function() {
            $(this).fadeIn(300);
        });
    });
});
</script>


  <?php echo getFooter(); ?>