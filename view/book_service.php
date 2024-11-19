<?php
session_start();
include_once('../classes/single_service.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=Please log in to book a service');
    exit();
}

// Fetch all services available from the database
$service = new Service();
$services = $service->getAllServices();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/booking_styles.css"> <!-- Custom CSS -->
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
                    <a class="nav-link active" href="service_list.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_bookings.php">Bookings History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Services Available -->
<div class="container">
    <h2 class="mt-4 mb-4">Available Services</h2>
    <div class="row">
        <?php if (!empty($services)): ?>
            <?php foreach ($services as $service): ?>
                <div class="col-md-4">
                    <div class="service-item">
                        <h4><?php echo $service['service_name']; ?></h4>
                        <p><?php echo $service['service_description']; ?></p>
                        <p>Cost: $<?php echo $service['service_cost']; ?></p>
                        <p>Duration: <?php echo $service['service_duration']; ?> mins</p>
                        <form action="../actions/book_service_action.php" method="POST">
                            <input type="hidden" name="service_id" value="<?php echo $service['service_id']; ?>">
                            <input type="hidden" name="service_cost" value="<?php echo $service['service_cost']; ?>">
                            <div class="form-group mb-3">
                                <label for="service_date">Select Service Date:</label>
                                <input type="date" class="form-control" name="service_date" required>
                            </div>
                            <button type="submit" class="btn btn-success">Book Now</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No services available at the moment.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
