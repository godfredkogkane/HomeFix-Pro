<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - HomeFix Pro</title>
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

        .contact-header {
            background-color: #1e6b3a;
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .contact-header h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .contact-header p {
            font-size: 20px;
            margin-bottom: 0;
        }

        .contact-section {
            padding: 60px 0;
        }

        .contact-section h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 40px;
            color: #1e6b3a;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .contact-info {
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .contact-info h4 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #1e6b3a;
        }

        .contact-info i {
            font-size: 20px;
            margin-right: 10px;
            color: #1e6b3a;
        }

        .map {
            width: 100%;
            height: 350px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            background-color: #fff;
        }

        .navbar-brand {
            color: #1e6b3a;
        }

        .navbar-brand:hover {
            color: #164d2b;
        }

        .nav-link {
            color: #333;
        }

        .nav-link:hover {
            color: #1e6b3a;
        }

        .footer {
            background-color: #1e6b3a;
            color: #fff;
            text-align: center;
            padding: 20px;
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
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service_list.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact Header -->
    <section class="contact-header">
        <div class="container">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you! Whether you have a question, need assistance, or just want to provide feedback.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-md-6">
                    <h2>Send Us a Message</h2>
                    <form action="contactformprocess.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="message" rows="6" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="col-md-6">
                    <div class="contact-info">
                        <h4>Contact Information</h4>
                        <p><i class="fas fa-phone"></i> +233-555-879-943</p>
                        <p><i class="fas fa-envelope"></i> support@homefixpro.com</p>
                        <p><i class="fas fa-map-marker-alt"></i> 123 HomeFix Street, Accra, Ghana</p>
                        <p><i class="fas fa-clock"></i> Mon - Fri: 9 AM - 5 PM</p>
                    </div>

                    <!-- Optional Map Section -->
                    <h4>Our Location</h4>
                    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093016!2d144.9537363156168!3d-37.81720944200388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf0727e5f4c8a4b09!2sHomeFix%20Pro!5e0!3m2!1sen!2sus!4v1632639461375!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
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
