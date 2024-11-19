<?php
require '../classes/single_service.php';

// Instantiate the Service class and fetch all services
$serviceModel = new Service();
$services = $serviceModel->getAllServices();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Services</title>
    <style>
        .action-btn {
            padding: 5px 10px;
            margin: 5px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .action-btn.delete {
            background-color: #DC3545;
        }

        .action-btn:hover {
            opacity: 0.9;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Service List</h1>
    <table border="1">
        <tr>
            <th>Service ID</th>
            <th>Name</th>
            <th>Category Name</th>
            <th>Provider Name</th>
            <th>Cost</th>
            <th>Actions</th>
        </tr>
        <?php if ($services): ?>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?= htmlspecialchars($service['service_id']) ?></td>
                    <td><?= htmlspecialchars($service['service_name']) ?></td>
                    <td><?= htmlspecialchars($service['category_name']) ?></td>
                    <td><?= htmlspecialchars($service['provider_name'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($service['service_cost']) ?></td>
                    <td>
                        <!-- Edit Button -->
                        <form action="../admin/editSingleService.php" method="get">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($service['service_id']) ?>">
                            <button type="submit" class="action-btn">Edit</button>
                        </form>

                        <!-- Delete Button -->
                        <form action="../actions/deleteSingleService.php" method="get" onsubmit="return confirm('Are you sure you want to delete this service?');">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($service['service_id']) ?>">
                            <button type="submit" class="action-btn delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No services found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
