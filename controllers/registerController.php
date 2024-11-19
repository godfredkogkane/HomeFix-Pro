<?php
// Include the necessary Customer class
include_once('../classes/customer.php');

function registerUserController($fullname, $email, $password, $confirm_password, $country, $city, $contact, $address, $role) {
    // Initialize an empty errors array
    $errors = [];

    // Validate full name
    if (empty($fullname)) {
        $errors[] = "Full name is required.";
    }

    // Validate email format
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/", $email)) {
        $errors[] = "Invalid email format. Use your Ashesi email address.";
    }

    // Validate password and confirm password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Validate contact number format
    if (empty($contact)) {
        $errors[] = "Contact number is required.";
    } elseif (!preg_match("/^\+?[1-9]\d{1,14}$/", $contact)) {
        $errors[] = "Invalid phone number format.";
    }

    // Validate country and city
    if (empty($country)) {
        $errors[] = "Country is required.";
    }

    if (empty($city)) {
        $errors[] = "City is required.";
    }

    // Validate address
    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    // If there are validation errors, return them
    if (!empty($errors)) {
        return $errors;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Create a Customer instance and check if the email is unique
    $customer = new Customer();
    if ($customer->checkEmail($email)) {
        return ['Email already exists.'];
    }

    // Add the customer to the database
    if ($customer->addCustomer($fullname, $email, $hashedPassword, $country, $city, $contact, $address, $role)) {
        return true; // Success
    } else {
        return ['Error registering user.'];
    }
}
?>
