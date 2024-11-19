<?php
// Start a session
session_start();

// Include the register controller
include_once('../settings/db_class.php');
include_once('../controllers/registerController.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve form data
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $country = trim($_POST['country']);
    $city = trim($_POST['city']);
    $contact = trim($_POST['contact']); // Should include country code
    $address = trim($_POST['address']);
    $role = trim($_POST['role']);

    // Initialize session message
    $_SESSION['error'] = [];
    $_SESSION['success'] = '';

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'][] = "Invalid email address.";
    }

    // Validate phone number format (E.164 format)
    if (!preg_match('/^\+?[1-9]\d{1,14}$/', $contact)) {
        $_SESSION['error'][] = "Invalid phone number format. Ensure it includes the country code.";
    }

    // Validate passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error'][] = "Passwords do not match.";
    }

    // If there are errors, redirect back to the form
    if (!empty($_SESSION['error'])) {
        header("Location: ../view/register.php");
        exit();
    }

    // Call the registerUserController to handle validation and registration
    $result = registerUserController($fullname, $email, $password, $confirm_password, $country, $city, $contact, $address, $role);

    // Check if the result is true (registration successful)
    if ($result === true) {
        $_SESSION['success'] = "Registration successful. You can now log in.";
        header("Location: ../view/login.php");
        exit();
    } else {
        $_SESSION['error'] = $result; // Pass any error messages returned by the controller
        header("Location: ../view/register.php");
        exit();
    }
} else {
    // If the request method is not POST, show an error
    $_SESSION['error'][] = "Invalid request method.";
    header("Location: ../view/register.php");
    exit();
}
?>
