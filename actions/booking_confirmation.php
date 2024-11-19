<?php
session_start();
include_once('../controllers/booking_controller.php');

if (isset($_GET['success'])) {
    echo "Your booking has been confirmed!";
    // Optionally, redirect to the service list or another page after a few seconds
    header("Refresh: 3; URL=../view/view_bookings.php");
}
?>
