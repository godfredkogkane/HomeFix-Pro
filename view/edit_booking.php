<?php
session_start();
include_once('../controllers/booking_controller.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get booking details
$booking_id = $_GET['id'];
$controller = new BookingController();
$booking = $controller->getBookingById($booking_id);

if (!$booking) {
    echo "Booking not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking - HomeFix Pro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/edit_booking.css">
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
                        <a class="nav-link" href="../view/customer_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service_list.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="view_bookings.php">My Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../view/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Edit Booking Form -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Booking</h1>
        
        <form action="../actions/edit_booking_action.php" method="POST">
            <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
            
            <div class="mb-3">
                <label for="service_name" class="form-label">Service</label>
                <input type="text" class="form-control" id="service_name" value="<?php echo $booking['service_name']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="service_date" class="form-label">Service Date</label>
                <input type="date" class="form-control" id="service_date" name="service_date" value="<?php echo $booking['service_date']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="service_cost" class="form-label">Service Cost</label>
                <input type="text" class="form-control" id="service_cost" value="<?php echo '$' . number_format($booking['service_cost'], 2); ?>" readonly>
            </div>

            <button type="submit" class="btn btn-success">Update Booking</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-dark text-white text-center">
        <div class="container">
            <p>&copy; 2024 HomeFix Pro. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
