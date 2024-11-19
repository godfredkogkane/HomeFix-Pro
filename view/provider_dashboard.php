<?php
session_start();

// Check if the user is logged in and has the correct role
if (!isset($_SESSION['role_id']) || ($_SESSION['role_id'] != 2 && $_SESSION['role_id'] != 3)) {
    // If the user is not a service provider or admin, redirect them to the login page or an error page
    header('Location: login.php');
    exit();
}

// If the user is a service provider (role_id = 2) or admin (role_id = 3), they can view this dashboard
echo "Welcome to the Service Provider Dashboard!";
