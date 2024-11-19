<?php
// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include necessary files
    include_once('../settings/db_class.php');
    include_once('../controllers/service_category_controller.php');

    // Retrieve and sanitize form data
    $category_name = trim($_POST['category_name']);
    $description = trim($_POST['description']);
    $image_path = null;

    // Allowed file types for image upload
    $allowed_types = array('image/png', 'image/jpeg', 'image/jpg');
    $max_file_size = 2 * 1024 * 1024; // 2MB size limit

    // Handle the image upload if provided
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Validate the file type
        if (!in_array($_FILES['image']['type'], $allowed_types)) {
            header('Location: ../admin/add_service_category.php?error=Invalid file type. Only PNG, JPG, and JPEG are allowed.');
            exit();
        }

        // Validate the file size
        if ($_FILES['image']['size'] > $max_file_size) {
            header('Location: ../admin/add_service_category.php?error=File size exceeds the maximum allowed size of 2MB.');
            exit();
        }

        // Define target directory for the image upload
        $target_dir = "../uploads/images/";

        // Check if the directory exists, if not, create it
        if (!is_dir($target_dir)) {
            if (!mkdir($target_dir, 0755, true)) {
                header('Location: ../admin/add_service_category.php?error=Failed to create directory for images.');
                exit();
            }
        }

        // Define the path for the uploaded image
        $image_path = $target_dir . basename($_FILES["image"]["name"]);

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
            header('Location: ../admin/add_service_category.php?error=Failed to upload the image.');
            exit();
        }
    } else {
        header('Location: ../admin/add_service_category.php?error=Please upload a valid image.');
        exit();
    }

    // Call the controller to handle the logic
    $result = addServiceCategoryController($category_name, $description, $image_path);

    // Redirect based on the result
    if ($result) {
        header('Location: ../admin/manage_service_categories.php?success=Service category added successfully');
        exit();
    } else {
        header('Location: ../admin/add_service_category.php?error=Failed to add service category.');
        exit();
    }
} else {
    // If the request method is not POST, redirect to the add service category page
    header('Location: ../admin/add_service_category.php');
    exit();
}
?>
