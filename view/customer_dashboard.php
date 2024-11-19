<?php
session_start();

// Check if the user is logged in and has the correct role
if (!isset($_SESSION['role_id']) || ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3)) {
    // If the user is not a customer or admin, redirect them to the login page
    header('Location: login.php');
    exit();
}

// Get the username to display a personalized message
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard_styles.css"> <!-- Custom CSS for dashboard -->
</head>
<body>

<!-- Navigation Menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">HomeFix Pro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="user_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="service_list.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_bookings.php">My Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Dashboard Content -->
<div class="container mt-5 pt-5">
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p class="lead">Here you can manage your bookings and explore our available services.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Book a Service</div>
                <div class="card-body">
                    <h5 class="card-title">Explore Services</h5>
                    <p class="card-text">Browse and book from our wide range of home services.</p>
                    <a href="service_list.php" class="btn btn-light">Book Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">My Bookings</div>
                <div class="card-body">
                    <h5 class="card-title">View Your Bookings</h5>
                    <p class="card-text">See the details of your service bookings and track their status.</p>
                    <a href="view_bookings.php" class="btn btn-light">View Bookings</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <h5 class="card-title">Manage Your Profile</h5>
                    <p class="card-text">Update your profile information and change your password.</p>
                    <a href="profile.php" class="btn btn-light">Manage Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer bg-success text-white mt-5 py-3">
    <div class="container text-center">
        <p>&copy; 2024 HomeFix Pro. All Rights Reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
