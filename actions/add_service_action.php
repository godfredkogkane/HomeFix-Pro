<?php
// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include necessary files
    include_once('../settings/db_class.php');
    include_once('../controllers/service_controller.php');

    // Retrieve and sanitize form data
    $service_name = trim($_POST['service_name']);
    $category_id = intval($_POST['category_id']);
    $provider_id = intval($_POST['provider_id']);
    $description = trim($_POST['description']);
    $cost = floatval($_POST['service_cost']);
    $duration = intval($_POST['service_duration']); // Duration in minutes

    // Call the controller to handle the logic
    $result = addServiceController($service_name, $category_id, $provider_id, $description, $cost, $duration);

    // Redirect based on the result
    if ($result) {
        header('Location: ../admin/manage_services.php?success=Service added successfully');
        exit();
    } else {
        header('Location: ../admin/add_service.php?error=Failed to add service');
        exit();
    }
} else {
    // Redirect if the request method is not POST
    header('Location: ../admin/add_service.php');
    exit();
}
?>
