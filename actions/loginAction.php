<?php
// Include the login controller
include_once('../controllers/loginController.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Call the loginUserController to handle validation and authentication
    $result = loginUserController($email, $password);

    // Check if the result is true (login successful)
    if ($result === true) {
        // Start the session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Redirect based on the role_id stored in the session
        $role_id = $_SESSION['role_id'];
        
        if ($role_id == 3) {
            // Redirect to admin dashboard
            header('Location: ../admin/admin_dashboard.php');
        } elseif ($role_id == 2) {
            // Redirect to supplier dashboard
            header('Location: ../view/provider_dashboard.php');
        } else {
            // Redirect to customer dashboard by default
            header('Location: ../view/customer_dashboard.php');
        }
        exit();
    } else {
        // If errors were returned, redirect back to the form with error messages
        $errorString = implode("&error[]=", array_map('urlencode', $result));
        header("Location: ../view/login.php?error[]=" . $errorString);
        exit();
    }
} else {
    // If the request method is not POST, show an error
    echo "Invalid request method.";
}
?>
