<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partnerships | TEKsystems</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Header */
header {
    background-color: #1a1a1a;
    padding: 20px;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar .logo h1 {
    color: #fff;
}

.nav-links {
    list-style-type: none;
    display: flex;
}

.nav-links li {
    margin-left: 20px;
}

.nav-links a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

/* Hero Section */
.hero {
    background: url('hero-image.jpg') center/cover no-repeat;
    height: 500px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    text-align: center;
}

.hero-content h2 {
    font-size: 40px;
    font-weight: 700;
}

.hero-content p {
    font-size: 18px;
    max-width: 600px;
    margin: 10px auto;
}

/* Partnerships Section */
.partnerships {
    padding: 50px 0;
    text-align: center;
}

.partnerships-header h3 {
    font-size: 30px;
    font-weight: 600;
    margin-bottom: 10px;
}

.partnerships-header p {
    font-size: 18px;
    margin-bottom: 40px;
}

.partner-logos {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.logo-item {
    width: 150px;
    height: 100px;
    margin: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo-item img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

/* Call to Action Section */
.cta {
    background-color: #006bb6;
    color: white;
    padding: 50px 20px;
    text-align: center;
}

.cta-content h3 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
}

.cta-content p {
    font-size: 18px;
    margin-bottom: 30px;
}

.cta-content button {
    background-color: #fff;
    color: #006bb6;
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.cta-content button:hover {
    background-color: #e5e5e5;
}

/* Footer */
footer {
    background-color: #1a1a1a;
    color: #fff;
    padding: 20px;
    text-align: center;
}
    </style>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>TEKsystems</h1>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Transformational Partnerships</h2>
            <p>We help organizations build the next generation of innovative solutions.</p>
        </div>
    </section>

    <!-- Partnership Logos Section -->
    <section class="partnerships">
        <div class="partnerships-header">
            <h3>Our Key Partnerships</h3>
            <p>We work with the best to provide top-tier solutions.</p>
        </div>
        
        <div class="partner-logos">
            <!-- Replace with actual partner logos -->
            <div class="logo-item"><img src="partner1.png" alt="Partner 1"></div>
            <div class="logo-item"><img src="partner2.png" alt="Partner 2"></div>
            <div class="logo-item"><img src="partner3.png" alt="Partner 3"></div>
            <div class="logo-item"><img src="partner4.png" alt="Partner 4"></div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta">
        <div class="cta-content">
            <h3>Explore How We Drive Innovation</h3>
            <p>Partner with us today to accelerate your success.</p>
            <button>Learn More</button>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 TEKsystems | All Rights Reserved</p>
    </footer>
</body>
</html>