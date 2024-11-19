<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeFix Pro - Your Trusted Home Services Partner</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Hero Section */
        .hero {
            background: url('https://via.placeholder.com/1500x600') no-repeat center center;
            background-size: cover;
            height: 600px;
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .hero h1 {
            font-size: 56px;
            font-weight: bold;
        }

        .hero p {
            font-size: 20px;
            margin-top: 20px;
        }

        .hero .btn {
            margin-top: 30px;
            font-size: 18px;
            padding: 12px 30px;
            background-color: #1e6b3a;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .hero .btn:hover {
            background-color: #164d2b;
        }

        /* Services Section */
        .services-section {
            padding: 60px 0;
            text-align: center;
        }

        .services-section h2 {
            font-size: 36px;
            margin-bottom: 40px;
            color: #1e6b3a;
        }

        .service-item {
            margin-bottom: 30px;
        }

        .service-item i {
            font-size: 50px;
            color: #1e6b3a;
            margin-bottom: 20px;
        }

        .service-item h4 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        /* Why Choose Us Section */
        .choose-us {
            background-color: #fff;
            padding: 60px 0;
        }

        .choose-us h2 {
            font-size: 36px;
            margin-bottom: 40px;
            text-align: center;
            color: #1e6b3a;
        }

        .choose-us .feature {
            display: flex;
            margin-bottom: 30px;
            align-items: center;
        }

        .choose-us .feature i {
            font-size: 40px;
            color: #1e6b3a;
            margin-right: 20px;
        }

        .choose-us .feature h5 {
            font-size: 22px;
            color: #333;
        }

        /* Testimonials */
        .testimonials {
            background-color: #f8f9fa;
            padding: 60px 0;
            text-align: center;
        }

        .testimonials h2 {
            font-size: 36px;
            margin-bottom: 40px;
            color: #1e6b3a;
        }

        .testimonial-item {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .testimonial-item p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        .testimonial-item h5 {
            font-size: 18px;
            color: #1e6b3a;
            margin-bottom: 5px;
        }

        /* Footer */
        .footer {
            background-color: #1e6b3a;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body>

    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HomeFix Pro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view/service_list.php">Service Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view/register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view/contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Your Trusted Home Services Partner</h1>
            <p>Providing reliable and affordable home services to make your life easier.</p>
            <a href="services.php" class="btn">Explore Our Services</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <h2>Our Services</h2>
            <div class="row">
                <div class="col-md-4 service-item">
                    <i class="fas fa-tools"></i>
                    <h4>Home Repairs</h4>
                    <p>We provide expert repair services to keep your home functioning smoothly.</p>
                </div>
                <div class="col-md-4 service-item">
                    <i class="fas fa-couch"></i>
                    <h4>Furniture Assembly</h4>
                    <p>Let our professionals handle your furniture assembly for a stress-free experience.</p>
                </div>
                <div class="col-md-4 service-item">
                    <i class="fas fa-broom"></i>
                    <h4>Cleaning Services</h4>
                    <p>Our team provides thorough and reliable cleaning services for your home or office.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="choose-us">
        <div class="container">
            <h2>Why Choose Us?</h2>
            <div class="row">
                <div class="col-md-6 feature">
                    <i class="fas fa-check-circle"></i>
                    <h5>Experienced Professionals</h5>
                </div>
                <div class="col-md-6 feature">
                    <i class="fas fa-thumbs-up"></i>
                    <h5>Quality Guaranteed</h5>
                </div>
                <div class="col-md-6 feature">
                    <i class="fas fa-clock"></i>
                    <h5>Timely and Reliable</h5>
                </div>
                <div class="col-md-6 feature">
                    <i class="fas fa-dollar-sign"></i>
                    <h5>Affordable Pricing</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2>What Our Customers Say</h2>
            <div class="row">
                <div class="col-md-4 testimonial-item">
                    <p>"HomeFix Pro transformed our home with their renovation services. Excellent work!"</p>
                    <h5>Jane Smith</h5>
                </div>
                <div class="col-md-4 testimonial-item">
                    <p>"Highly reliable and professional team. They assembled all our new furniture perfectly!"</p>
                    <h5>John Doe</h5>
                </div>
                <div class="col-md-4 testimonial-item">
                    <p>"Our go-to cleaning service! Always on time and they leave our house spotless."</p>
                    <h5>Susan Lee</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 HomeFix Pro. All Rights Reserved.</p>
    </div>

    <!-- Bootstrap JS and Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
