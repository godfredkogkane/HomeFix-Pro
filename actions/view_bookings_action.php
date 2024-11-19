<?php
session_start();
include_once('../controllers/booking_controller.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php?error=Please log in to view your bookings');
    exit();
}

$bookingController = new BookingController();
$bookings = $bookingController->getUserBookings($_SESSION['user_id']);

// This action should then pass the $bookings data to the view (view_bookings.php)
// This can be done by including the view and passing the data to it
include('../view/view_bookings.php');
?>
