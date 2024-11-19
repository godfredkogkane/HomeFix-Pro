<?php
// Include necessary files
include_once('../settings/db_class.php');
include_once('../classes/service.php');

// Create a new instance of the Service class
$service = new Service();

// Retrieve all services
$services = $service->getAllServices();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service List</title>
    <link rel="stylesheet" href="../css/service_view.css">
</head>
<body>
    <div class="container">
        <h1>Service Categories</h1>

        <?php if ($services): ?>
            <table>
                <thead>
                    <tr>
                        <th>Service Category</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $service): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($service['category_name']); ?></td>
                            <td><?php echo htmlspecialchars($service['description']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($service['icon']); ?>" alt="Icon" width="50" height="50"></td>
                            <td>
                                <!-- Edit Button -->
                                <form method="POST" action="../admin/edit_service.php">
                                    <input type="hidden" name="category_id" value="<?php echo $service['category_id']; ?>">
                                    <button type="submit" class="btn-edit">Edit</button>
                                </form>

                                <!-- Delete Button -->
                                <form method="POST" action="../actions/deleteServiceAction.php" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                    <input type="hidden" name="category_id" value="<?php echo $service['category_id']; ?>">
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No services found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
