<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("partners"); ?>
<link rel="stylesheet" href="css/partners-modern.css">
<!-- End Header Area -->
<style>
    .partner-logos {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 40px 60px;
    align-items: center;
    justify-items: center;
    margin-top: 40px;
}

.partner-item img {
    width: 180px;
    max-height: 100px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.partner-item img:hover {
    transform: scale(1.05);
}

.carousel-item img {
  height: 500px;
  object-fit: cover;
  filter: brightness(75%);
}

.carousel-caption h3 {
  font-size: 42px;
  font-weight: 700;
  text-shadow: 0px 4px 20px rgba(0,0,0,0.6);
}

.carousel-caption p {
  font-size: 18px;
  margin-top: 10px;
  text-shadow: 0px 4px 20px rgba(0,0,0,0.5);
}

/* Center carousel caption */
.carousel-caption {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center !important;
    width: 100%;
}

/* Make title & subtitle readable */
.carousel-caption h2,
.carousel-caption h3 {
    font-size: 48px;
    font-weight: 700;
    text-shadow: 0 4px 20px rgba(0,0,0,0.5);
}

.carousel-caption p {
    font-size: 20px;
    margin-top: 15px;
    text-shadow: 0 4px 20px rgba(0,0,0,0.4);
}

/* Responsive text scaling */
@media (max-width: 768px) {
    .carousel-caption h2,
    .carousel-caption h3 {
        font-size: 28px;
    }
    .carousel-caption p {
        font-size: 16px;
    }
}

</style>

<div id="modernFadeCarousel" class="carousel slide carousel-fade" data-ride="carousel">

  <div class="carousel-inner">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <img src="images/services/service5.jpg" class="d-block w-100" alt="Partner Ecosystem">
      <div class="carousel-caption">
        <h3 class="text-light">Microsoft • AWS • Snowflake • Red Hat</h3>
        <p class="text-light">Trusted partnerships powering enterprise innovation across cloud, AI, and digital transformation.</p>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item">
      <img src="images/services/service3.jpg" class="d-block w-100" alt="AI and Cloud Partners">
      <div class="carousel-caption">
        <h3 class="text-light">Elite AI, Cloud & Data Partners</h3>
        <p class="text-light">Accelerating business outcomes through deep expertise across Microsoft, Snowflake, AWS, and Red Hat ecosystems.</p>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item">
      <img src="images/services/service4.jpg" class="d-block w-100" alt="Security and Infrastructure Partners">
      <div class="carousel-caption">
        <h3 class="text-light">Cisco • Guardz • Enterprise Security</h3>
        <p class="text-light">Strengthening your cloud, data, and infrastructure with world-class security and connectivity partners.</p>
      </div>
    </div>

  </div>

  <a class="carousel-control-prev" href="#modernFadeCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#modernFadeCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

<section id="clients" class="partner-section py-5">
    <div class="container">
        <div class="section-header modern-section-title">
           
            <h2 class="section-title">Technology Partners</h2>
           <center><hr class="default-background hr"></center>

            <p class="mt-3">
                In today's fast-paced digital landscape, success is often achieved through strategic 
                technology choices and seamless integrations. Our consulting approach is built upon a 
                deep understanding of the global technology ecosystem, allowing us to architect and 
                implement solutions that deliver maximum value, innovation, and compatibility for our clients.
            </p>

            <p class="">
                We don't just recommend technology; we leverage our expertise across leading platforms 
                to ensure your investments are integrated, optimized, and aligned with your core business 
                objectives.
            </p>

            <h4 class="mt-4"><b>The Power of Informed Expertise</b></h4>

            <p class="">
                As consultants, our commitment is to your success, which is why we meticulously maintain 
                proficiencies across a wide range of industry-leading tools.
            </p>

            <ul class="custom-bullets m-3 default-color" >
                <li class="default-color"><b>Vendor Agnostic:</b> We choose the right technology for your needs, not just the 
                    one we partner with, guaranteeing unbiased recommendations.</li>
                <li class="default-color"><b>Deep Integration Knowledge:</b> Our teams specialize in creating flawless 
                    interoperability, turning disparate tools into a single, cohesive business engine.</li>
                <li class="default-color"><b>Certified Mastery:</b> Our consultants hold advanced certifications, ensuring that 
                    implementation and optimization are handled with the highest level of technical 
                    competence.</li>
            </ul>
        </div>

<!-- GRID OF LOGOS (replaces carousel) -->
<div class="partner-logos modern-partner-grid">
    
    <div class="partner-item partner-card">
        <a href="partners-details.php?partner=aws">
            <img src="images/partners/aws.png" alt="AWS">
        </a>
    </div>

    <div class="partner-item partner-card">
        <a href="partners-details.php?partner=td">
            <img src="images/partners/td.png" alt="TD">
        </a>
    </div>

    <div class="partner-item partner-card">
        <a href="partners-details?partner=snowflake">
            <img src="images/partners/snowflake1.png" alt="Snowflake">
        </a>
    </div>

    <div class="partner-item partner-card">
        <a href="partners-details?partner=microsoft">
            <img src="images/partners/ms.png" alt="Microsoft">
        </a>
    </div>

    <div class="partner-item partner-card">
        <a href="partners-details?partner=redhat">
            <img src="images/partners/redhat.jpg" alt="Red Hat">
        </a>
    </div>
     <div class="partner-item partner-card">
        <a href="partners-details?partner=cisco">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqHxfp5_IxQLcw1D8CVTi6ouBWcTy2m6sxHw&s" alt="Cisco">
        </a>
    </div>
     <div class="partner-item partner-card">
        <a href="partners-details?partner=guardz">
            <img src="https://i0.wp.com/v2catalog.com/wp-content/uploads/2024/05/CENTRE-box-logo-01.png?fit=656%2C213&ssl=1" alt="Guardz">
        </a>
    </div>
</div>



</section>
<!-- Start of Footer Area -->


<?php echo getFooter(); ?>
