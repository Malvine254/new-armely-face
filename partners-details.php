<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("partners details"); ?>

<?php
// Get selected partner (default = redhat)
$partner = $_GET['partner'] ?? 'redhat';

// Data structure for all partners
$partners = [
    "aws" => [
        "name" => "Amazon Web Services",
        "subtitle" => "AWS",
        "hero_image" => "images/partners/aws-hero.jpg",
        "logo" => "images/partners/aws.png",
		"full" => file_get_contents("html-pages/aws-full.php"),
        "lead" => "AWS cloud computing solutions help organizations innovate and scale rapidly.",
        "content" => "Amazon Web Services (AWS) provides an extensive suite of cloud computing services, making it a trusted partner for businesses seeking scalable and cost-effective cloud solutions. With a portfolio that covers everything from compute and storage to machine learning and artificial intelligence, AWS enables organizations to enhance their digital infrastructure. We help businesses deploy, secure, and optimize workloads across the entire AWS ecosystem, ensuring seamless integration, management, and data protection at every level. AWS’s vast network of services, such as Amazon EC2 for scalable compute capacity, and Amazon S3 for highly durable object storage, empowers organizations to build innovative solutions that improve productivity, speed up development, and reduce operational costs. Whether you are migrating to the cloud or seeking to optimize your existing environment, AWS ensures that your infrastructure is built for resilience, security, and scalability."
    ],

    "td" => [
        "name" => "Tech Data",
        "subtitle" => "TD",
        "hero_image" => "images/partners/td-hero.jpg",
        "logo" => "images/partners/td.png",
        "full" => file_get_contents("html-pages/td-full.php"),
        "lead" => "Tech Data is a global leader in distribution and digital transformation solutions.",
        "content" => "Tech Data enables businesses to accelerate their digital transformation by providing access to cutting-edge technology solutions across a wide range of industries. As a global distributor of IT solutions, Tech Data specializes in cloud computing, security, data center infrastructure, and enterprise software. Their ability to support businesses through cloud distribution, managed services, and complex IT projects helps clients scale rapidly while maintaining operational efficiency. By fostering innovation and facilitating seamless integrations, Tech Data ensures that businesses can quickly adapt to emerging technologies and future-proof their IT infrastructure. With deep expertise in enterprise solutions, they provide tailored consulting and delivery services that align with the specific needs of customers, empowering them to grow and succeed in the ever-evolving digital landscape."
    ],

    "snowflake" => [
        "name" => "Snowflake",
        "subtitle" => "Snowflake",
        "hero_image" => "images/partners/snowflake-hero.jpg",
        "logo" => "images/partners/snowflake1.png",
		"full" => file_get_contents("html-pages/snowflake-full.php"),
        "lead" => "Snowflake’s Data Cloud enables seamless data integration, analytics, and collaboration.",
        "content" => "Snowflake revolutionizes how organizations use and share data through its unique Data Cloud platform, which integrates seamlessly across clouds and platforms. Snowflake enables businesses to break down data silos and share data securely and effortlessly, making it easier to derive insights and make data-driven decisions. By offering a unified solution for data engineering, data warehousing, and data sharing, Snowflake empowers organizations to accelerate analytics and enhance collaboration. Whether you're working on large-scale analytics projects, real-time data processing, or machine learning, Snowflake's platform ensures high performance and scalability. Snowflake helps businesses unlock the full potential of their data, turning it into a strategic asset that drives innovation and competitive advantage in the marketplace."
    ],

    "microsoft" => [
        "name" => "Transform. Innovate. Accelerate. ",
        "subtitle" => "Transform. Innovate. Accelerate. ",
        "hero_image" => "images/partners/ms-hero.jpg",
        "logo" => "images/partners/ms.png",
        "lead" => "Your business deserves technology that works as hard as you do. As a certified Microsoft Solutions Partner across multiple designations—Data & AI, Digital & App Innovation, Business Applications, and Modern Work—we deliver comprehensive solutions that drive measurable business outcomes. From intelligent data platforms to enterprise-wide digital transformation, we help organizations harness the full power of the Microsoft Cloud. ",
        "content" => "",
		"subtitle" => "Microsoft Solutions Partner for Data & AI, Digital Transformation, Dynamics 365 & Microsoft Licensing",	

		"full" => file_get_contents("html-pages/microsoft-full.php")
    ],

    "redhat" => [
        "name" => "Red Hat",
        "subtitle" => "Red Hat",
        "hero_image" => "images/partners/redhat-hero.jpg",
        "logo" => "images/partners/redhat.jpg",
        "lead" => "Red Hat delivers open-source enterprise software for cloud, automation, and modernization.",
		"full" => file_get_contents("html-pages/redhat-full.php"),
		"content" => "Red Hat is a pioneer in the open-source enterprise software landscape, helping organizations transition to hybrid cloud architectures while embracing the power of automation and DevOps methodologies. Red Hat’s portfolio of products, including Red Hat OpenShift, Red Hat Ansible Automation, and Red Hat Linux, empowers businesses to modernize their IT infrastructure, improve scalability, and ensure the highest level of security. Red Hat also offers solutions to support cloud-native application development, containerization, and orchestration, providing enterprises with the flexibility to deploy workloads across any environment—on-premises, public cloud, or hybrid cloud. With Red Hat, businesses can accelerate their journey towards IT modernization by streamlining processes, optimizing workflows, and ensuring their systems are agile, scalable, and ready for the future."
    ],

        "cisco" => [
            "name" => "Red Hat",
            "subtitle" => "Red Hat",
            "logo" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqHxfp5_IxQLcw1D8CVTi6ouBWcTy2m6sxHw&s",
            "full" => file_get_contents("html-pages/cisco-full.php"),
        ],
        
        "guardz" => [
            "name" => "Guardz",
            "subtitle" => "Guardz",
            "logo" => "https://i0.wp.com/v2catalog.com/wp-content/uploads/2024/05/CENTRE-box-logo-01.png?fit=656%2C213&ssl=1",
            "full" => file_get_contents("html-pages/guardz-full.php"),
        ],
    ];
    

if (!isset($partners[$partner])) {
    $partner = 'redhat';
}

$data = $partners[$partner];
?>

<!-- Partner detail hero (modern) -->
<style>
	.partner-hero { padding: 60px 0; }
	.partner-breadcrumb a { color: #0ea5bd; text-decoration: none; }
	.partner-subtitle { color: #0ea5bd; font-weight: 600; margin-bottom: 8px; }
	.partner-title { font-weight: 800; font-size: 4.5rem; line-height: 1; letter-spacing: -2px; color: #062238; }
	.partner-lead { color: #374151; font-size: 1.05rem; max-width: 70ch; }
	.btn-cta { background: #c7d92a; border: none; color: #062238; font-weight: 700; padding: 10px 20px; border-radius: 8px; }
	.btn-cta:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(15,23,42,0.08); }

	/* Right-side clipped image */
	.partner-clip-wrap { display:flex; align-items:center; justify-content:center; }
	.partner-svg { width: 320px; max-width: 100%; height: auto; }

	@media (max-width: 768px) {
		.partner-title { font-size: 2.8rem; }
		.partner-hero { padding: 36px 0; }
		.partner-svg { width: 260px; }
	}

	@media (max-width: 480px) {
		.partner-title { font-size: 2rem; }
		.partner-lead { font-size: 0.98rem; }
		.partner-svg { width: 220px; margin-top: 24px; }
	}
</style>


<section class="ms-section ms-section-light mt-4">
    <div class="container">
        <?= $data['full'] ?>
    </div>
</section>


<?php echo getFooter(); ?>
