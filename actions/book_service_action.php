<?php
session_start();
include_once('../controllers/booking_controller.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php?error=Please log in to book a service');
    exit();
}

// Check if booking form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $service_id = $_POST['service_id'];
    $service_date = $_POST['service_date'];
    $service_cost = $_POST['service_cost'];

    // Call the BookingController to add the booking
    $bookingController = new BookingController();
    $result = $bookingController->addBooking($user_id, $service_id, $service_date, $service_cost);

    if ($result) {
        header('Location: booking_confirmation.php?success=Booking successful');
    } else {
        header('Location: ../view/book_service.php?service_id=' . $service_id . '&error=Booking failed');
    }
} else {
    header('Location: ../view/service_list.php');
}
?>
