<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php echo getHeader("partners"); ?>
<link rel="stylesheet" href="css/partners-modern.css">
<!-- End Header Area -->

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay partners-breadcrumbs">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Our Strategic Partners</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Partners</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<?php
// Get selected partner (default = redhat)
$partner = $_GET['partner'] ?? 'redhat';

// All partners data
$partners = [
    "aws" => [
        "name" => "Amazon Web Services",
        "subtitle" => "AWS",
        "hero_image" => "images/case-study/Casey.png",
        "logo" => "images/partners/aws.png",
        "full" => file_get_contents("html-pages/aws-full.php"),
        "lead" => "AWS cloud computing solutions help organizations innovate and scale rapidly.",
        "content" => "Amazon Web Services (AWS) provides an extensive suite of cloud computing services..."
    ],

    "td" => [
        "name" => "Tech Data",
        "subtitle" => "TD",
        "hero_image" => "images/case-study/Casey.png",
        "logo" => "images/partners/td.png",
        "full" => file_get_contents("html-pages/td-full.php"),
        "lead" => "Tech Data is a global leader in digital transformation...",
        "content" => "Tech Data enables businesses to accelerate..."
    ],

    "snowflake" => [
        "name" => "Snowflake",
        "subtitle" => "Snowflake",
        "hero_image" => "images/case-study/Casey.png",
        "logo" => "images/partners/snowflake1.png",
        "full" => file_get_contents("html-pages/snowflake-full.php"),
        "lead" => "Snowflake's Data Cloud enables seamless analytics...",
        "content" => "Snowflake revolutionizes how organizations use data..."
    ],

    "microsoft" => [
        "name" => "Microsoft",
        "subtitle" => "Microsoft",
        "hero_image" => "images/case-study/Casey.png",
        "logo" => "images/partners/ms.png",
        "full" => file_get_contents("html-pages/microsoft-full.php"),
        "lead" => "Your business deserves technology that works as hard as you do...",
        "content" => "From intelligent data platforms to enterprise transformation..."
    ],

    "redhat" => [
        "name" => "Red Hat",
        "subtitle" => "Red Hat",
        "hero_image" => "images/case-study/Casey.png",
        "logo" => "images/partners/redhat.jpg",
        "full" => file_get_contents("html-pages/redhat-full.php"),
        "lead" => "Red Hat delivers enterprise open-source innovation...",
        "content" => "Red Hat is a pioneer in hybrid cloud architectures..."
    ],

    "cisco" => [
        "name" => "Cisco",
        "subtitle" => "Cisco",
        "hero_image" => "images/case-study/Casey.png",
        "logo" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqHxfp5_IxQLcw1D8CVTi6ouBWcTy2m6sxHw&s",
        "full" => file_get_contents("html-pages/cisco-full.php"),
        "lead" => "Cisco delivers secure, seamless connectivity...",
        "content" => "Cisco empowers organizations to transform networks..."
    ],

    "guardz" => [
        "name" => "Guardz",
        "subtitle" => "Guardz",
        "hero_image" => "images/case-study/Casey.png",
        "logo" => "https://i0.wp.com/v2catalog.com/wp-content/uploads/2024/05/CENTRE-box-logo-01.png",
        "full" => file_get_contents("html-pages/guardz-full.php"),
        "lead" => "Guardz provides comprehensive cloud security...",
        "content" => "Guardz protects infrastructure with advanced DR solutions..."
    ],
];

if (!isset($partners[$partner])) { 
    $partner = 'redhat'; 
}
?>

<!-- Partners Tab System -->
<section class="partners-content-section">
	<div class="">

		<!-- Mobile Dropdown -->
		<button class="btn btn-modern-toggle-partners btn-block d-md-none mb-3" type="button"
				data-toggle="collapse" data-target="#tabsMenu">
			<i class="fa fa-bars"></i> SELECT PARTNER
		</button>

		<!-- Tabs -->
		<div class="collapse d-md-block" id="tabsMenu">
			<ul class="nav nav-tabs modern-tabs-partners">
				<?php foreach ($partners as $key => $p): ?>
					<li class="nav-item">
						<a class="nav-link <?= $key === $partner ? 'active' : '' ?>"
						   href="?partner=<?= $key ?>"> <!-- FIXED -->
							
							<?php if (!empty($p['logo'])): ?>
								<img src="<?= htmlspecialchars($p['logo']) ?>" 
								     alt="<?= htmlspecialchars($p['name']) ?>">
							<?php endif; ?>

							<strong><?= htmlspecialchars($p['subtitle']) ?></strong>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<!-- Tab Content -->
		<div class="tab-content modern-tab-content-partners">
			<div class="tab-pane fade show active">
				<div class="partner-full-content mt-4">
					<?= $partners[$partner]['full'] ?>
				</div>
			</div>
		</div>

	</div>
</section>

<?php echo getFooter(); ?>
