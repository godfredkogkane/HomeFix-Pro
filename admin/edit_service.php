<?php
// Start session
// session_start();

// Ensure the user is an admin
// if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
//     header('Location: ../view/login.php');
//     exit();
// }

// Check if the service ID is passed via POST or GET
if (isset($_POST['category_id']) || isset($_GET['category_id'])) {
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : $_GET['category_id'];

    // Include necessary files
    include_once('../classes/service.php');

    // Create an instance of the Service class
    $service = new Service();

    // Fetch the service details by ID
    $service_details = $service->getServiceById($category_id);

    if (!$service_details) {
        header('Location: ../admin/manage_services.php?error=Service not found.');
        exit();
    }
} else {
    header('Location: ../admin/manage_services.php?error=No service selected.');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link rel="stylesheet" href="../css/edit_service.css">
</head>
<body>
    <div class="container">
        <h1>Edit Service</h1>
        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <form action="../actions/editServiceAction.php" method="POST" enctype="multipart/form-data">
            <!-- Hidden input to pass the service ID -->
            <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($service_details['category_id']); ?>">

            <label for="category_name">Service Category Name</label>
            <input type="text" name="category_name" value="<?php echo htmlspecialchars($service_details['category_name']); ?>" required>

            <label for="description">Service Description</label>
            <textarea name="description" required><?php echo htmlspecialchars($service_details['description']); ?></textarea>

            <label for="icon">Current Icon</label>
            <img src="<?php echo htmlspecialchars($service_details['icon']); ?>" alt="Icon" width="50" height="50">

            <label for="icon">Upload New Icon (Optional)</label>
            <input type="file" name="icon" accept="image/png, image/jpeg, image/jpg">

            <button type="submit" class="btn-submit">Update Service</button>
        </form>
    </div>
</body>
</html>
