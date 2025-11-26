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
        "lead" => "AWS cloud computing solutions help organizations innovate and scale rapidly.",
        "content" => "Amazon Web Services (AWS) provides an extensive suite of cloud computing services, making it a trusted partner for businesses seeking scalable and cost-effective cloud solutions. With a portfolio that covers everything from compute and storage to machine learning and artificial intelligence, AWS enables organizations to enhance their digital infrastructure. We help businesses deploy, secure, and optimize workloads across the entire AWS ecosystem, ensuring seamless integration, management, and data protection at every level. AWS’s vast network of services, such as Amazon EC2 for scalable compute capacity, and Amazon S3 for highly durable object storage, empowers organizations to build innovative solutions that improve productivity, speed up development, and reduce operational costs. Whether you are migrating to the cloud or seeking to optimize your existing environment, AWS ensures that your infrastructure is built for resilience, security, and scalability."
    ],

    "td" => [
        "name" => "Tech Data",
        "subtitle" => "TD",
        "hero_image" => "images/partners/td-hero.jpg",
        "logo" => "images/partners/td.png",
        "lead" => "Tech Data is a global leader in distribution and digital transformation solutions.",
        "content" => "Tech Data enables businesses to accelerate their digital transformation by providing access to cutting-edge technology solutions across a wide range of industries. As a global distributor of IT solutions, Tech Data specializes in cloud computing, security, data center infrastructure, and enterprise software. Their ability to support businesses through cloud distribution, managed services, and complex IT projects helps clients scale rapidly while maintaining operational efficiency. By fostering innovation and facilitating seamless integrations, Tech Data ensures that businesses can quickly adapt to emerging technologies and future-proof their IT infrastructure. With deep expertise in enterprise solutions, they provide tailored consulting and delivery services that align with the specific needs of customers, empowering them to grow and succeed in the ever-evolving digital landscape."
    ],

    "snowflake" => [
        "name" => "Snowflake",
        "subtitle" => "Snowflake",
        "hero_image" => "images/partners/snowflake-hero.jpg",
        "logo" => "images/partners/snowflake1.png",
        "lead" => "Snowflake’s Data Cloud enables seamless data integration, analytics, and collaboration.",
        "content" => "Snowflake revolutionizes how organizations use and share data through its unique Data Cloud platform, which integrates seamlessly across clouds and platforms. Snowflake enables businesses to break down data silos and share data securely and effortlessly, making it easier to derive insights and make data-driven decisions. By offering a unified solution for data engineering, data warehousing, and data sharing, Snowflake empowers organizations to accelerate analytics and enhance collaboration. Whether you're working on large-scale analytics projects, real-time data processing, or machine learning, Snowflake's platform ensures high performance and scalability. Snowflake helps businesses unlock the full potential of their data, turning it into a strategic asset that drives innovation and competitive advantage in the marketplace."
    ],

    "microsoft" => [
        "name" => "Microsoft",
        "subtitle" => "Microsoft",
        "hero_image" => "images/partners/ms-hero.jpg",
        "logo" => "images/partners/ms.png",
        "lead" => "Microsoft empowers digital transformation with cloud, AI, and productivity solutions.",
        "content" => "Microsoft is a global leader in enterprise technology, offering a comprehensive suite of solutions designed to accelerate business growth and transformation. With Azure, Microsoft’s cloud computing platform, businesses can take advantage of scalable infrastructure, powerful analytics, and innovative artificial intelligence (AI) solutions. As a Microsoft Partner, we help our clients implement Microsoft solutions across the enterprise, including Azure, Microsoft 365, Dynamics 365, and Power Platform. From cloud migrations to AI-powered applications, we ensure that businesses harness the full capabilities of Microsoft’s cutting-edge technology stack. Microsoft’s solutions enable organizations to improve productivity, optimize operations, and enhance security—all while ensuring a seamless digital experience. We also specialize in delivering modern work solutions, supporting businesses as they evolve in today’s digital-first world."
    ],

    "redhat" => [
        "name" => "Red Hat",
        "subtitle" => "Red Hat",
        "hero_image" => "images/partners/redhat-hero.jpg",
        "logo" => "images/partners/redhat.jpg",
        "lead" => "Red Hat delivers open-source enterprise software for cloud, automation, and modernization.",
        "content" => "Red Hat is a pioneer in the open-source enterprise software landscape, helping organizations transition to hybrid cloud architectures while embracing the power of automation and DevOps methodologies. Red Hat’s portfolio of products, including Red Hat OpenShift, Red Hat Ansible Automation, and Red Hat Linux, empowers businesses to modernize their IT infrastructure, improve scalability, and ensure the highest level of security. Red Hat also offers solutions to support cloud-native application development, containerization, and orchestration, providing enterprises with the flexibility to deploy workloads across any environment—on-premises, public cloud, or hybrid cloud. With Red Hat, businesses can accelerate their journey towards IT modernization by streamlining processes, optimizing workflows, and ensuring their systems are agile, scalable, and ready for the future."
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

<section class="partner-hero">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-8">
				<nav class="partner-breadcrumb " aria-label="breadcrumb">
					<small>
						<span class="text-muted">
							<?php
							// Determine the base path dynamically
							$base_path = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? '/new-armely-face/' : '/';

							// Now use $base_path in your partner links
							foreach ($partners as $key => $partner) {
								// Generate a dynamic link for each partner with the correct base path
								echo "<a href='{$base_path}partners-details.php?partner=$key' style='font-size: 18px;'>{$partner['name']}</a> &nbsp;/&nbsp;";
							}
							?>

						</span>
					</small>
				</nav>

				<div class="mt-3">
					<div class="partner-subtitle default-color"><?= $data['subtitle'] ?></div>
					<h1 class="partner-title"><?= strtoupper($data['name']) ?></h1>

					<p class="partner-lead mt-4"><?= $data['lead'] ?></p>
					<p class="partner-lead"><?= $data['content'] ?></p>

					<div class="mt-4">
						<a class="btn btn-cta default-background text-light" href="contact">Let's Talk</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 partner-clip-wrap text-center">
				<!-- SVG clipped play-like rounded triangle. Replace href value with partner image. -->
				<img clip-path="url(#rounded-play)" src="images/services/data_services.png"  width="100%" height="100%" />
			</div>



		</div>
	</div>
</section>

<!-- Our approach section -->
<section class="partner-approach py-5">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7">
				<h3 class="h3 mb-3 default-color">Our approach</h3>
				<p class="lead partner-lead"><?= $data['name'] ?> is committed to delivering cutting-edge solutions to transform your business. We work closely with you to leverage innovative technologies and ensure that your business can scale quickly, securely, and with greater efficiency.</p>

				<p class="partner-lead">Together with our partner, we enable businesses to adopt the latest trends in cloud, data, and automation, ultimately improving operations and fostering a culture of continuous innovation.</p>
			</div>

			<div class="col-lg-5 text-center">
				<img loading="lazy" alt="<?= $data['name'] ?> logo" class="partner-brand-logo mb-3" src="<?= $data['logo'] ?>">

				<div class="partner-badges mt-3 mx-auto" style="max-width:320px;">
					<div class="partner-badge partner-badge--premier">Premier</div>
					<div class="partner-badge partner-badge--partner">Business Partner</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Services section -->
<section class="services-section py-5">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7 order-lg-1 order-2">
				<h2 class="section-title">SERVICES</h2>
				<h4 class="mt-4 default-color">Cloud and Infrastructure</h4>
				<p class="partner-lead">Leverage the power of the cloud to scale your infrastructure with security and efficiency. We work with our partners to deliver high-performance cloud environments that drive your business forward.</p>

				<p class="partner-lead">Whether it’s cloud migration, infrastructure optimization, or hybrid cloud management, our team works closely with partners to deliver tailored solutions that help businesses succeed in today’s dynamic environment.</p>
			</div>

			<div class="col-lg-5 text-center order-lg-2 order-1 mb-4 mb-lg-0">
				<img loading="lazy" alt="Cloud and infrastructure" class="service-image rounded-lg" src="images/offers/managedoffer.png">
			</div>
		</div>
	</div>
</section>

<!-- Additional Services: Automation and Application Modernization -->
<section class="services-more">
	<div class="container">
		<hr class="section-divider">

		
		<div class="row align-items-center service-block">
			<div class="col-lg-5 text-center d-none d-lg-block">
				<img loading="lazy" alt="Application Modernization" class="service-image rounded-lg" src="images/offers/managedoffer.png">
			</div>
			<div class="col-lg-7">
				<h3 class="h3 default-color">Application Modernization</h3>
				<p class="partner-lead">We collaborate with our partners to refactor and modernize applications, bringing agility and scalability to your systems, and ensuring they are prepared for future growth and innovation.</p>
			</div>
		</div>

		<hr class="section-divider mt-4">
		<div class="row align-items-center service-block">
			<div class="col-lg-7">
				<h3 class="h3 default-color">Automation and Orchestration</h3>
				<p class="partner-lead">Our partner helps businesses modernize faster with enterprise automation enablement. From continuous integration to configuration management, we work to deliver solutions that streamline operations and foster efficiency.</p>
			</div>
			<div class="col-lg-5 text-center">
				<img loading="lazy" alt="Automation and Orchestration" class="service-image rounded-lg" src="images/offers/managedoffer.png">
			</div>
		</div>

		<hr class="section-divider">

	</div>
</section>

<?php echo getFooter(); ?>
