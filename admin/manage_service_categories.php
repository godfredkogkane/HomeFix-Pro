<?php
session_start();
include_once('../settings/db_class.php');
include_once('../classes/service_category.php');

// // Ensure the user is an admin
// if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
//     header('Location: ../view/login.php');
//     exit();
// }

// Initialize the Service class
$service = new ServiceCategory();;
$services = $service->getAllServiceCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Service Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/manage_service.css"> 
</head>
<body>

<div class="container mt-5">
    <h1>Manage Service Categories</h1>

    <!-- Success/Error Messages -->
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">
            <?php echo $_GET['success']; ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">
            <?php echo $_GET['error']; ?>
        </div>
    <?php endif; ?>

    <!-- Button to Add a New Service -->
    <a href="add_service.php" class="btn btn-success mb-3">Add New Service Category</a>

    <!-- Services Table -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Service ID</th>
                <th>Service Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($services) > 0): ?>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?php echo $service['category_id']; ?></td>
                        <td><?php echo $service['category_name']; ?></td>
                        <td><?php echo $service['description']; ?></td>
                        <td>
                            <?php if (!empty($service['image'])): ?>
                                <img src="<?php echo $service['image']; ?>" alt="Service Image" width="50">
                            <?php else: ?>
                                <span>No Image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <a href="../view/edit_service.php?id=<?php echo $service['category_id']; ?>" class="btn btn-primary">Edit</a>
                            <!-- Delete Button with Confirmation -->
                            <a href="../actions/deleteServiceAction.php?id=<?php echo $service['category_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service category?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No service categories found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
