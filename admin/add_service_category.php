<?php
// session_start();

// // Ensure the user is an admin
// if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
//     header('Location: ../view/login.php');
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/add_service.css"> 
</head>
<body>

<div class="container mt-5">
    <h1>Add New Service</h1>
    
    <!-- Display any error messages -->
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">
            <?php echo $_GET['error']; ?>
        </div>
    <?php endif; ?>
    
    <!-- Add Service Form -->
    <form action="../actions/add_service_category.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="category_name" class="form-label">Service Category:</label>
            <input type="text" id="category_name" name="category_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Service Category Description:</label>
            <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Service Category Image:</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg" required>
            <small class="form-text text-muted">Allowed formats: PNG, JPG, JPEG. Max size: 2MB.</small>
        </div>

        <button type="submit" class="btn btn-success">Add Service Category</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
