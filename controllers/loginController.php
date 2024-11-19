<?php
// Include the necessary Customer class
include_once('../classes/customer.php');

function loginUserController($email, $password) {
    // Initialize an empty array for errors
    $errors = [];

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format. Please provide a valid email address.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // If there are validation errors, return them
    if (!empty($errors)) {
        return $errors;
    }

    // Create a Customer instance
    $customer = new Customer();

    // Retrieve the user by email
    $user = $customer->getUserByEmail($email);

    // Check if the user exists
    if (!$user) {
        return ['Invalid email or password.'];
    }

    // Verify the password
    if (!password_verify($password, $user['user_password'])) {
        return ['Invalid email or password.'];
    }

    // If the login is successful, start a session and store the user info
    session_start();
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['role_id'] = $user['role_id']; // This will help to distinguish between roles

    // Return true for successful login
    return true;
}
?>
