<?php include 'php/actions.php'; include 'php/header_footer.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armely Mega Menu Test</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
       /* ======================================================================================
   ARMELY FULL-WIDTH MEGA MENU — DESKTOP ONLY
   Mobile uses DEFAULT Bootstrap dropdown (no mega menu)
   ====================================================================================== */

/* DESKTOP ONLY (≥ 992px) */
@media (min-width: 992px) {

    /* Parent <li> must be static for full-width background */
    .navbar-nav li {
        position: static !important;
    }

    /* FULL-WIDTH DROPDOWN BACKGROUND */
    .mega-menu,
    .dropdown-menu.mega-menu {
        position: absolute !important;
        top: 100%;
        left: 0 !important;
        right: 0 !important;

        width: 100vw !important;
        margin-left: calc(50% - 50vw) !important;

        background: #002040 !important;
        padding: 0 !important;
        border: none !important;
        border-radius: 0 !important;

        display: none !important;
        overflow-x: hidden !important;
        z-index: 9999 !important;
    }

    /* Show on hover (desktop only) */
    .navbar-nav li:hover > .mega-menu {
        display: block !important;
    }

    /* INNER CONTENT */
    .mega-menu-inner {
        max-width: 1300px;
        margin: 0 auto;
        padding: 40px 60px;

        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 40px;
    }

    .mega-title {
        color: #ffffff;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .mega-menu a {
        display: block;
        padding: 6px 0;
        color: #fff;
        font-size: 15px;
    }

    .mega-menu a:hover {
        color: #57C8FF;
    }
}

/* ======================================================================================
   MOBILE MODE (≤ 991px)
   Disable mega-menu completely → revert to NORMAL Bootstrap dropdown
   ====================================================================================== */
@media (max-width: 991px) {

    /* Remove full-width behavior */
    .mega-menu,
    .dropdown-menu.mega-menu {
        position: static !important;
        width: 100% !important;
        margin-left: 0 !important;

        display: none !important;
        background: white !important; /* default dropdown color */
        padding: 10px 15px !important;
        border: 1px solid #ddd !important;
        border-radius: 6px !important;
    }

    /* Bootstrap handles show/hide via .show class on mobile */
    .dropdown-menu.show {
        display: block !important;
    }

    /* MOBILE: revert to stacked list */
    .mega-menu-inner {
        display: block !important;
        padding: 5px 10px !important;
    }

    .mega-title {
        color: #002040;
        font-weight: 600;
        margin-top: 12px;
    }

    .mega-menu a {
        color: #002040 !important;
        padding: 6px 0;
        display: block;
    }
}

    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <a class="navbar-brand fw-bold fs-4" href="#">armely</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">

            <!-- ===== Example Mega Menu ===== -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="#">Services</a>

                <!-- FULL-WIDTH MEGA DROPDOWN -->
                <div class="dropdown-menu mega-menu">
                    <div class="mega-menu-inner">

                        <div>
                            <div class="mega-title">AI Services</div>
                            <a href="#">AI Consulting</a>
                            <a href="#">AI Advisory</a>
                            <a href="#">Generative AI</a>
                            <a href="#">AI PoC Starter</a>
                        </div>

                        <div>
                            <div class="mega-title">Data Services</div>
                            <a href="#">Microsoft Fabric</a>
                            <a href="#">Databricks</a>
                            <a href="#">Snowflake</a>
                            <a href="#">Data Strategy</a>
                        </div>

                        <div>
                            <div class="mega-title">Digital Transformation</div>
                            <a href="#">Power Apps</a>
                            <a href="#">Power Automate</a>
                            <a href="#">Dynamics 365</a>
                            <a href="#">API Data Access</a>
                        </div>

                    </div>
                </div>
            </li>

            <li class="nav-item"><a class="nav-link" href="#">Insights</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Industries</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- CONTENT PLACEHOLDER -->
<div class="container py-5">
    <h2 class="text-center mb-4">Mega Menu Test Page</h2>
    <p class="text-center">Hover over <strong>Services</strong> to test the full-width mega menu.</p>
</div>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
