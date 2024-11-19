<?php
// Check if the request method is POST and service ID is provided
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['service_id'])) {
    // Include the delete controller and necessary classes
    include_once('../controllers/service_controller.php');

    // Sanitize the service ID to prevent SQL injection
    $service_id = intval($_POST['service_id']);

    // Call the controller to delete the service
    $result = deleteServiceController($service_id);

    // Redirect based on the result
    if ($result) {
        header('Location: ../admin/manage_services.php?success=Service deleted successfully');
    } else {
        header('Location: ../admin/manage_services.php?error=Failed to delete service');
    }
    exit();
} else {
    // Redirect if the request method is not POST or service_id is missing
    header('Location: ../admin/manage_services.php?error=Invalid request');
    exit();
}
?>
