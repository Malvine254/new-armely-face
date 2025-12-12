<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php echo getHeader("partners"); ?>
<link rel="stylesheet" href="css/partners-modern.css">
<!-- End Header Area -->

<style>
/* ===== ENHANCED PARTNER DETAILS PAGE STYLES ===== */

body {
    background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
}

/* Breadcrumbs Enhancement */
.breadcrumbs.partners-breadcrumbs {
    background: linear-gradient(135deg, #2f5597 0%, #1e3a6d 100%) !important;
    padding: 40px 0 !important;
    position: relative;
    overflow: hidden;
}

.breadcrumbs.partners-breadcrumbs::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 500px;
    height: 100%;
    background: radial-gradient(circle at top right, rgba(255,255,255,0.1), transparent);
    pointer-events: none;
}

.breadcrumbs h2 {
    color: white;
    font-size: 2.5rem;
    font-weight: 800;
    letter-spacing: -1px;
    margin: 0;
}

.bread-list li a,
.bread-list li.active {
    color: rgba(255,255,255,0.9) !important;
    font-weight: 600;
}

/* Partners Content Section */
.partners-content-section {
    padding: 60px 15px !important;
    margin: 0 auto;
    max-width: 1400px;
}

/* Enhanced Toggle Button */
.btn-modern-toggle-partners {
    background: linear-gradient(135deg, #2f5597 0%, #1e3a6d 100%);
    border: 2px solid rgba(255,255,255,0.2);
    color: #fff;
    font-weight: 700;
    padding: 16px 24px;
    border-radius: 14px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 24px rgba(47, 85, 151, 0.3);
    font-size: 0.95rem;
    letter-spacing: 0.5px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-modern-toggle-partners:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(47, 85, 151, 0.4);
    border-color: rgba(255,255,255,0.4);
    color: #fff;
    text-decoration: none;
}

.btn-modern-toggle-partners i {
    font-size: 1.1rem;
}

/* Modern Tab Navigation */
.modern-tabs-partners {
    border: none !important;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-radius: 18px;
    padding: 14px;
    margin-bottom: 40px;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    border: 1px solid rgba(47, 85, 151, 0.08) !important;
    list-style: none;
}

.modern-tabs-partners .nav-item {
    margin-right: 0 !important;
    margin-bottom: 0;
}

.modern-tabs-partners .nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 22px;
    border: 2px solid transparent;
    border-radius: 14px;
    color: #4b5563;
    font-weight: 700;
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    background: #ffffff;
    white-space: nowrap;
    position: relative;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    cursor: pointer;
}

.modern-tabs-partners .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(47, 85, 151, 0.15), transparent);
    transition: left 0.6s ease;
}

.modern-tabs-partners .nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #2f5597 0%, #0d9488 100%);
    transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.modern-tabs-partners .nav-link:hover::before {
    left: 100%;
}

.modern-tabs-partners .nav-link:hover {
    background: #f8f9fa;
    border-color: rgba(47, 85, 151, 0.2);
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(47, 85, 151, 0.15);
}

.modern-tabs-partners .nav-link.active {
    background: linear-gradient(135deg, #2f5597 0%, #1e3a6d 100%);
    color: #ffffff;
    border-color: transparent;
    box-shadow: 0 12px 32px rgba(47, 85, 151, 0.35);
    transform: translateY(-4px);
}

.modern-tabs-partners .nav-link.active::after {
    width: 100%;
}

.modern-tabs-partners .nav-link.active strong {
    color: #ffffff;
}

.modern-tabs-partners .nav-link img {
    width: 36px;
    height: 36px;
    object-fit: contain;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    filter: grayscale(40%) drop-shadow(0 2px 4px rgba(0,0,0,0.08));
}

.modern-tabs-partners .nav-link.active img {
    filter: grayscale(0%) drop-shadow(0 2px 6px rgba(47, 85, 151, 0.2)) brightness(1.1);
    transform: scale(1.05);
}

.modern-tabs-partners .nav-link:hover img {
    transform: scale(1.15) rotate(5deg);
    filter: grayscale(0%) drop-shadow(0 4px 8px rgba(47, 85, 151, 0.15));
}

/* Tab Content */
.modern-tab-content-partners {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-radius: 18px;
    padding: 40px;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(47, 85, 151, 0.08);
    animation: fadeInUp 0.6s ease-out;
}

.partner-full-content {
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

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

/* Back to Partners CTA */
.btn-back-partners {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    background: linear-gradient(135deg, #2f5597 0%, #1e3a6d 100%);
    color: white;
    text-decoration: none;
    border-radius: 14px;
    font-weight: 700;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 24px rgba(47, 85, 151, 0.3);
    border: 2px solid transparent;
    margin-top: 50px;
}

.btn-back-partners:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(47, 85, 151, 0.4);
    color: white;
    text-decoration: none;
    border-color: rgba(255, 255, 255, 0.2);
}

.btn-back-partners i {
    font-size: 1.1rem;
}

.back-to-partners-section {
    text-align: center;
    padding: 40px 0 60px;
}

/* Responsive */
@media (max-width: 768px) {
    .breadcrumbs h2 {
        font-size: 1.8rem;
    }
    
    .modern-tabs-partners {
        padding: 10px;
        gap: 8px;
    }
    
    .modern-tabs-partners .nav-link {
        padding: 10px 14px;
        font-size: 0.85rem;
        gap: 8px;
    }
    
    .modern-tabs-partners .nav-link img {
        width: 28px;
        height: 28px;
    }
    
    .modern-tab-content-partners {
        padding: 20px;
    }

    .partners-content-section {
        padding: 40px 15px !important;
    }
}
</style>

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay partners-breadcrumbs">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Strategic Partner Solutions</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li><a href="all-partners.php">Partners</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Partner Details</li>
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
        "logo" => "images/partners/aws.png",
    ],
    "td" => [
        "name" => "Tech Data",
        "subtitle" => "TD",
        "logo" => "images/partners/td.png",
    ],
    "snowflake" => [
        "name" => "Snowflake",
        "subtitle" => "Snowflake",
        "logo" => "images/partners/snowflake1.png",
    ],
    "microsoft" => [
        "name" => "Microsoft",
        "subtitle" => "Microsoft",
        "logo" => "images/partners/ms.png",
    ],
    "redhat" => [
        "name" => "Red Hat",
        "subtitle" => "Red Hat",
        "logo" => "images/partners/redhat.jpg",
    ],
    "cisco" => [
        "name" => "Cisco",
        "subtitle" => "Cisco",
        "logo" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqHxfp5_IxQLcw1D8CVTi6ouBWcTy2m6sxHw&s",
    ],
    "guardz" => [
        "name" => "Guardz",
        "subtitle" => "Guardz",
        "logo" => "https://i0.wp.com/v2catalog.com/wp-content/uploads/2024/05/CENTRE-box-logo-01.png?fit=656%2C213&ssl=1",
    ],
];

if (!isset($partners[$partner])) { 
    $partner = 'redhat'; 
}
?>

<!-- Partners Content -->
<div class="partners-content-section">
	<div class="row">
		<div class="col-md-12">
			<!-- Enhanced Mobile Dropdown Button -->
			<div class="form-group d-lg-none" style="margin-bottom: 30px;">
				<button class="btn-modern-toggle-partners" type="button" data-bs-toggle="collapse" data-bs-target="#partners-menu" aria-controls="partners-menu" aria-expanded="false" aria-label="Toggle navigation">
					<i class="icofont-navigation-menu"></i>
					SELECT PARTNER
				</button>
			</div>

			<!-- Modern Navigation Tabs -->
			<div class="collapse d-lg-block" id="partners-menu">
				<ul class="nav nav-tabs modern-tabs-partners" id="partners-tabs" role="tablist">
					<?php foreach ($partners as $key => $partner_data): ?>
						<li class="nav-item" role="presentation">
							<a class="nav-link <?php if (($partner) === $key) { echo 'active'; } ?>" href="?partner=<?php echo $key; ?>" role="tab">
								<img src="<?php echo htmlspecialchars($partner_data['logo']); ?>" alt="<?php echo htmlspecialchars($partner_data['name']); ?>">
								<strong><?php echo htmlspecialchars($partner_data['subtitle']); ?></strong>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<!-- Modern Tab Content -->
			<div class="modern-tab-content-partners">
				<div class="partner-full-content">
					<?php include "html-pages/{$partner}-full.php"; ?>
				</div>
			</div>

			<!-- Back to Partners CTA -->
			<div class="back-to-partners-section">
				<a href="all-partners.php" class="btn-back-partners">
					<i class="icofont-arrow-left"></i>
					Back to All Partners
				</a>
			</div>
		</div>
	</div>
</div>
<!-- End Partners Content -->

<?php echo getFooter(); ?>
