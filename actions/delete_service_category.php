<?php
// Check if the request method is POST and category ID is provided
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category_id'])) {
    // Include the service category controller
    include_once('../controllers/service_category_controller.php');

    // Sanitize the category ID to prevent SQL injection
    $category_id = intval($_POST['category_id']);

    // Call the controller to delete the service category
    $result = deleteServiceCategoryController($category_id);

    // Redirect based on the result
    if ($result) {
        header('Location: ../admin/manage_service_categories.php?success=Service category deleted successfully');
    } else {
        header('Location: ../admin/manage_service_categories.php?error=Failed to delete service category.');
    }
    exit();
} else {
    // Redirect if the request method is not POST or category_id is missing
    header('Location: ../admin/manage_service_categories.php?error=Invalid request.');
    exit();
}
