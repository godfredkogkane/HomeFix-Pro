<?php
// editServiceAction.php

// Start session
session_start();

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include necessary files
    include_once('../settings/db_class.php');
    include_once('../controllers/service_category_controller.php');

    // Retrieve and sanitize form data
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : null;
    $category_name = isset($_POST['category_name']) ? trim($_POST['category_name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';

    // Initialize variable for the image path
    $image_path = null;

    // Check if a new image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed_types = array('image/png', 'image/jpeg', 'image/jpg');
        $max_file_size = 2 * 1024 * 1024; // 2MB size limit

        // Validate file type and size
        if (!in_array($_FILES['image']['type'], $allowed_types)) {
            header('Location: ../admin/edit_service_category.php?id=' . $category_id . '&error=Invalid file type. Only PNG, JPG, and JPEG are allowed.');
            exit();
        }
        if ($_FILES['image']['size'] > $max_file_size) {
            header('Location: ../admin/edit_service_category.php?id=' . $category_id . '&error=File size exceeds the maximum allowed size of 2MB.');
            exit();
        }

        // Define target directory for the image upload
        $target_dir = "../uploads/images/";

        // Create directory if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Define the path for the uploaded image
        $image_path = $target_dir . basename($_FILES["image"]["name"]);

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
            header('Location: ../admin/edit_service_category.php?id=' . $category_id . '&error=Failed to upload the image.');
            exit();
        }
    }

    // If no new image is uploaded, use the existing image from the database
    if ($image_path === null) {
        // Fetch existing image from the database
        $existing_category = getServiceCategoryByIdController($category_id);
        if ($existing_category) {
            $image_path = $existing_category['image']; // Retain the existing image if not replaced
        }
    }

    // Call the controller to handle the update
    $result = editServiceCategoryController($category_id, $category_name, $description, $image_path);

    // Redirect based on the result
    if ($result) {
        header('Location: ../admin/manage_service_categories.php?success=Service category updated successfully');
        exit();
    } else {
        header('Location: ../admin/edit_service_category.php?id=' . $category_id . '&error=Failed to update service category.');
        exit();
    }
} else {
    // Redirect if the request method is not POST
    header('Location: ../admin/manage_service_categories.php');
    exit();
}
