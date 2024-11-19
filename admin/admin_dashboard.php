<?php
// session_start();

// // Ensure the user is an admin
// if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
//     header('Location: ../view/login.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - HomeFix Pro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure full height of the viewport */
        }

        /* Navigation Menu */
        .navbar {
            background-color: #1e6b3a;
        }

        .navbar .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            background-color: #164d2b; /* Darker green on hover */
            border-radius: 5px;
        }

        /* Admin Dashboard Content */
        .dashboard-content {
            padding: 60px 0;
            text-align: center;
            flex-grow: 1; /* Ensure content area grows to take up space */
        }

        .dashboard-content h1 {
            font-size: 36px;
            margin-bottom: 40px;
            color: #1e6b3a;
        }

        .dashboard-content p {
            font-size: 20px;
            color: #666;
        }

        /* Action Cards */
        .card {
            border: none;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 150px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1e6b3a;
        }

        .card-icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: #1e6b3a;
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
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">HomeFix Pro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="..index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/service.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Admin Dashboard Content -->
<div class="container dashboard-content">
    <h1>Welcome, Admin!</h1>
    <p>Manage the platform's users, bookings, and services by selecting an option below.</p>

    <!-- Dashboard Action Cards -->
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <a href="manage_users.php" class="text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-users card-icon"></i>
                        <h2 class="card-title">Manage Users</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="manage_bookings.php" class="text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-calendar-alt card-icon"></i>
                        <h2 class="card-title">Manage Bookings</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="manage_services.php" class="text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-cogs card-icon"></i>
                        <h2 class="card-title">Manage Services</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 HomeFix Pro. All Rights Reserved.</p>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
