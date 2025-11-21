<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("partners details"); ?>

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
			<div class="col-lg-7">
				<nav class="partner-breadcrumb " aria-label="breadcrumb">
					<small>
						<a href="/">Home</a> &nbsp;/&nbsp; <a href="/who-we-are.php">Who We Are</a> &nbsp;/&nbsp; <span class="text-muted">Partnerships</span>
					</small>
				</nav>

				<div class="mt-3">
					<div class="partner-subtitle default-color">Red Hat</div>
					<h1 class="partner-title">PARTNERSHIP</h1>

					<p class="partner-lead mt-4">Open source is more than just code. It’s a movement that brings an electrifying blend of creativity and collaboration to make software better, faster and more secure. As the largest open-source company in the world, <a href="#">Red Hat</a> provides open source software (OSS) backed by the power of community to accelerate innovation, security and solutions across your entire enterprise.</p>

					<p class="partner-lead">Our specialists help you integrate these platforms into real-world solutions that deliver measurable business value.</p>

					<div class="mt-4">
						<a class="btn btn-cta default-background text-light" href="contact">Let's Talk</a>
					</div>
				</div>
			</div>

			<div class="col-lg-5 partner-clip-wrap text-center">
				<!-- SVG clipped play-like rounded triangle. Replace href value with partner image. -->
				<svg class="partner-svg" viewBox="0 0 360 360" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Partner image">
					<defs>
						<clipPath id="rounded-play">
							<!-- rounded-play shape built with quadratic curves -->
							<path d="M60 28 Q75 20 95 28 L290 150 Q305 158 290 170 L95 332 Q75 340 60 332 Q45 324 45 310 L45 50 Q45 36 60 28 Z" />
						</clipPath>
					</defs>
					<rect width="100%" height="100%" fill="#fff" rx="18" ry="18" />
					<image clip-path="url(#rounded-play)" href="images/partners/redhat-hero.jpg" preserveAspectRatio="xMidYMid slice" width="100%" height="100%" />
					<!-- optional soft vignette -->
					<rect width="100%" height="100%" fill="url(#grad)" opacity="0.08" clip-path="url(#rounded-play)" />
				</svg>
			</div>
		</div>
	</div>
</section>

<style>
	/* Our approach / badges */
	.partner-approach h3 { font-size: 1.75rem; color: #062238; font-weight: 800; }
	.partner-approach .partner-lead { margin-top: 0.75rem; }
	.partner-brand-logo { max-width: 220px; height: auto; display: inline-block; }
	.partner-badges { display: block; }
	.partner-badge { padding: 18px 12px; color: #fff; font-weight: 700; font-size: 1.2rem; text-align: center; border-radius: 2px; }
	.partner-badge--premier { background: #e03131; }
	.partner-badge--partner { background: #5a5a5a; margin-top: 8px; }

	/* Services section */
	.services-section .section-title { font-size: 2.5rem; font-weight: 900; color: #062238; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: 1px; }
	.services-section h4 { font-size: 1.6rem; color: #062238; font-weight: 700; }
	.service-image { width: 100%; max-width: 420px; height: auto; object-fit: cover; border-radius: 18px; box-shadow: 0 10px 30px rgba(2,6,23,0.08); }

	@media (max-width: 768px) {
		.partner-brand-logo { max-width: 180px; }
		.service-image { max-width: 320px; }
		.services-section .section-title { text-align: left; }
	}
	@media (max-width: 480px) {
		.partner-badge { font-size: 1rem; padding: 12px 8px; }
		.partner-brand-logo { max-width: 140px; }
		.service-image { max-width: 260px; }
	}
</style>


<!-- Our approach section -->
<section class="partner-approach py-5">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7">
				<h3 class="h3 mb-3">Our approach</h3>
				<p class="lead partner-lead">Red Hat will show you the way—we’ll help you get there. As a <a href="#">Red Hat Premier Business Partner</a>, we provide qualified technical leadership, open-source expertise and scale to help you get the most out of Red Hat solutions—no matter where you are in your modernization journey.</p>

				<p class="partner-lead">By combining Red Hat’s powerful hybrid cloud and multicloud technologies with our full stack technology services, you’ll unlock best-in-class delivery while preserving the flexibility of your open-source ecosystem.</p>
			</div>

			<div class="col-lg-5 text-center">
				<img loading="lazy" alt="Red Hat logo" class="partner-brand-logo mb-3" src="images/partners/redhat.jpg">

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
				<h4 class="mt-4">Cloud and Infrastructure</h4>
				<p class="partner-lead">Accelerate your transformation with a cloud stack that lets you run at full velocity. We have deep experience in cloud enablement and beyond, from applications to networks to security.</p>

				<p class="partner-lead">Together, we’ll build, manage and integrate your <a href="#">hybrid and multicloud</a> environments across private and public domains. Whether it’s automation and containerization, cloud-native development, hybrid cloud infrastructure, IT optimization, Kubernetes or OpenShift platform support—we’re here to help.</p>
			</div>

			<div class="col-lg-5 text-center order-lg-2 order-1 mb-4 mb-lg-0">
				<img loading="lazy" alt="Cloud and infrastructure" class="service-image rounded-lg" src="images/offers/managedoffer.png">
			</div>
		</div>
	</div>
</section>


<style>
	/* Additional services blocks styling */
	.services-more .service-block { padding: 30px 0; }
	.services-more hr.section-divider { border: 0; border-top: 1px solid #e6e9ee; margin: 48px 0; }
	.services-more .h3 { font-size: 1.9rem; color: #062238; font-weight: 800; }
	.partner-lead { color: #374151; }
	@media (max-width: 768px) { .services-more .service-block { padding: 18px 0; } }
</style>


<!-- Additional Services: Automation and Application Modernization -->
<section class="services-more">
	<div class="container">
		<hr class="section-divider">

		<div class="row align-items-center service-block">
			<div class="col-lg-7">
				<h3 class="h3">Automation and Orchestration</h3>
				<p class="partner-lead">Modernize faster with enterprise automation enablement, a fluid approach to management supported by our thought leadership. We bring expertise in continuous integration and delivery (CI/CD), infrastructure as code (IaC), configuration management and more to coordinate your systems, automation platforms and Red Hat environment. All aimed at delivering a unified framework so you can run faster, consistently and securely.</p>
			</div>
			<div class="col-lg-5 text-center">
				<img loading="lazy" alt="Automation and Orchestration" class="service-image rounded-lg" src="images/offers/managedoffer.png">
			</div>
		</div>

		<hr class="section-divider">

		<div class="row align-items-center service-block">
			<div class="col-lg-5 text-center d-none d-lg-block">
				<img loading="lazy" alt="Application Modernization" class="service-image rounded-lg" src="images/offers/managedoffer.png">
			</div>
			<div class="col-lg-7">
				<h3 class="h3">Application Modernization</h3>
				<p class="partner-lead">Need to free up your teams so they can focus on developing the valuable innovations that propel your business forward? As a Red Hat partner, we can help you standardize and simplify, achieving peak operational efficiency with application refactoring and modernization. Accelerate your development and delivery cycles by integrating critical workloads with OpenShift.</p>
			</div>
		</div>

		<hr class="section-divider mb-0">
	</div>
</section>


<?php echo getFooter(); ?>