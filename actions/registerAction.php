<?php
// Include the register controller
include_once('../settings/db_class.php');
include_once('../controllers/registerController.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve form data
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']); // For password match validation
    $country = trim($_POST['country']);
    $city = trim($_POST['city']);
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);
    $role = trim($_POST['role']); // Capture role (1: Customer, 2: Service Provider)

    // Call the registerUserController to handle validation and registration
    $result = registerUserController($fullname, $email, $password, $confirm_password, $country, $city, $contact, $address, $role);

    // Check if the result is true (registration successful)
    if ($result === true) {
        header('Location: ../view/login.php?success=Registration successful');
        exit();
    } else {
        // If errors were returned, redirect back to the form with error messages
        $errorString = implode("&error[]=", array_map('urlencode', $result));
        header("Location: ../view/register.php?error[]=" . $errorString);
        exit();
    }
} else {
    // If the request method is not POST, show an error
    echo "Invalid request method.";
}
?>
