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
                <img src="https://cdn.freelogovectors.net/wp-content/uploads/2023/07/university_of_nebraska_medical_center_logo-freelogovectors.net_.png">
            </div>

            <div class="partner-item">
                <img src="https://swopehealth.org/wp-content/uploads/2024/03/Swope-Health-Services-244462845.png">
            </div>

            <div class="partner-item">
                <img src="https://assets.libsyn.com/content/17315963?height=250&width=250&overlay=true">
            </div>

            <div class="partner-item">
                <img src="https://www.sagebutte.com/wp-content/uploads/2024/01/Sage-Butte-Energy-logo.png">
            </div>

            <div class="partner-item">
                <img src="images/brand-partners/qb_energy.jpg">
            </div>

            <div class="partner-item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Logo_of_Frisco%2C_Texas.svg/768px-Logo_of_Frisco%2C_Texas.svg.png?20180828011722">
            </div>

            <div class="partner-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrSzxH_f1lEuzqxEewHFlxbQr6jWb-ISY4eQ&s">
            </div>

            <div class="partner-item">
                <img src="https://lambdalegal.org/wp-content/uploads/2023/02/lambda-logo-300x84.png">
            </div>

            <div class="partner-item">
                <img src="https://nfg-sofun.s3.amazonaws.com/uploads/ui_configuration/main_logo/12617/welcome_logo_HBI_LOGO_FINAL_Long_Form.png">
            </div>

            <div class="partner-item">
                <img src="https://www.moblicosolutions.com/wp-content/uploads/2024/09/Image-for-Home-Page-Hero-4-e1726688399270.png">
            </div>

            <div class="partner-item">
                <img src="https://logos-world.net/wp-content/uploads/2024/07/BNSF-Railway-Symbol.png">
            </div>

        </div>
    </div>
</section>
<!-- Start of Footer Area -->


<?php echo getFooter(); ?>
