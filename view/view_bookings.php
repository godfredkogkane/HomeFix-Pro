<?php
session_start();
include_once('../controllers/booking_controller.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get user bookings
$user_id = $_SESSION['user_id'];
$controller = new BookingController();
$bookings = $controller->getUserBookings($user_id);

// Make sure bookings is an array
if (!is_array($bookings)) {
    $bookings = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - HomeFix Pro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/view_bookings.css">
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
                        <a class="nav-link active" href="view_bookings.php">Bookings History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../view/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bookings Section -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">My Bookings</h1>

        <?php if (count($bookings) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Provider</th>
                        <th scope="col">Service Date</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?php echo $booking['service_name']; ?></td>
                            <td><?php echo $booking['provider_name']; ?></td> <!-- Display provider name -->
                            <td><?php echo $booking['service_date']; ?></td>
                            <td><?php echo '$' . number_format($booking['service_cost'], 2); ?></td>
                            <td><?php echo $booking['booking_status']; ?></td>
                            <td>
                                <a href="../actions/delete_booking_action.php?id=<?php echo $booking['booking_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this booking?');">Cancel</a>
                                <a href="../view/edit_booking.php?id=<?php echo $booking['booking_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">You have no bookings at the moment.</p>
        <?php endif; ?>
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
