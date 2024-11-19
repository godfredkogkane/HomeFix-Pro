<?php
session_start();
include_once('../controllers/booking_controller.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php?error=Please log in to manage your bookings');
    exit();
}

// Check if booking ID is provided
if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    // Call the BookingController to delete the booking
    $bookingController = new BookingController();
    $result = $bookingController->deleteBooking($booking_id);

    if ($result) {
        header('Location: ../view/view_bookings.php?success=Booking deleted successfully');
    } else {
        header('Location: ../view/view_bookings.php?error=Failed to delete booking');
    }
} else {
    header('Location: ../view/view_bookings.php');
}
?>
