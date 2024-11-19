<?php
session_start();
include_once('../controllers/booking_controller.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $booking_id = $_POST['booking_id'];
    $service_date = $_POST['service_date'];

    $controller = new BookingController();
    $result = $controller->updateBooking($booking_id, $service_date);

    if ($result) {
        header('Location: ../view/view_bookings.php?success=Booking updated successfully');
    } else {
        header('Location: ../view/edit_booking.php?id=' . $booking_id . '&error=Failed to update booking');
    }
}
