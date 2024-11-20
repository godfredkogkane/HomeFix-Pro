<?php
session_start();

// Include necessary files
require_once '../controllers/services_controller.php';

// Validate and sanitize input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_name = filter_input(INPUT_POST, 'service_name', FILTER_SANITIZE_STRING);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $provider_id = filter_input(INPUT_POST, 'provider_id', FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST, 'service_description', FILTER_SANITIZE_STRING);
    $cost = filter_input(INPUT_POST, 'service_cost', FILTER_VALIDATE_FLOAT);
    $duration = filter_input(INPUT_POST, 'service_duration', FILTER_VALIDATE_INT);

    // Check for any missing or invalid input
    if ($service_name && $category_id && $provider_id && $description && $cost && $duration) {
        $result = addServiceController($service_name, $category_id, $provider_id, $description, $cost, $duration);

        if ($result) {
            $_SESSION['success'] = "Service added successfully!";
            header('Location: ../admin/manage_services.php');
            exit();
        } else {
            $_SESSION['error'] = "Failed to add the service. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Invalid input. Please check all fields.";
    }
} else {
    $_SESSION['error'] = "Invalid request method.";
}

header('Location: ../view/add_service.php');
exit();
