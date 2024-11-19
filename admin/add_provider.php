<?php
require '../classes/service.php';

// Instantiate the Service class
$serviceModel = new Service();

// Fetch all users with role_id = 2 (Service Providers)
$providers = $serviceModel->db_fetch_all("SELECT * FROM users WHERE role_id = 2");

// Fetch all service categories
$categories = $serviceModel->db_fetch_all("SELECT * FROM service_categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service Provider</title>
</head>
<body>
    <h1>Add New Service Provider</h1>
    <form action="../actions/add_provider_action.php" method="post">
        <label for="user_id">Provider (Registered as Service Provider):</label>
        <select id="user_id" name="user_id" required>
            <option value="">Select a Service Provider</option>
            <?php foreach ($providers as $provider): ?>
                <option value="<?= htmlspecialchars($provider['user_id']) ?>">
                    <?= htmlspecialchars($provider['user_name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="provider_service_category">Service Category:</label>
        <select id="provider_service_category" name="provider_service_category" required>
            <option value="">Select a Category</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['category_id']) ?>">
                    <?= htmlspecialchars($category['category_name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Add Provider</button>
    </form>
</body>
</html>
