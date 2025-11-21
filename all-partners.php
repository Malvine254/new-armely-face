<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("partners"); ?>
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

</style>
<section id="clients" class="partner-section py-5">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><b>Technology Partners</b></h2>
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

            <ul class="custom-bullets m-3" >
                <li><b>Vendor Agnostic:</b> We choose the right technology for your needs, not just the 
                    one we partner with, guaranteeing unbiased recommendations.</li>
                <li><b>Deep Integration Knowledge:</b> Our teams specialize in creating flawless 
                    interoperability, turning disparate tools into a single, cohesive business engine.</li>
                <li><b>Certified Mastery:</b> Our consultants hold advanced certifications, ensuring that 
                    implementation and optimization are handled with the highest level of technical 
                    competence.</li>
            </ul>
        </div>


        <!-- GRID OF LOGOS (replaces carousel) -->
        <div class="partner-logos">
            
            <div class="partner-item">
                <a href="partners-details">
                    <img src="images/partners/aws.png">
                </a>
            </div>

            <div class="partner-item">
                <a href="partners-details">
                    <img src="images/partners/td.png">
                </a>
            </div>

            <div class="partner-item">
                <a href="partners-details">
                    <img src="images/partners/snowflake1.png">
                </a>
            </div>

            <div class="partner-item">
               <a href="partners-details">
                 <img src="images/partners/ms.png">
               </a>
            </div>

             <div class="partner-item">
               <a href="partners-details">
                 <img src="images/partners/redhat.jpg">
               </a>
            </div>

        </div>
    </div>
</section>
<!-- Start of Footer Area -->


<?php echo getFooter(); ?>
