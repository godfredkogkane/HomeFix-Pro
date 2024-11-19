<?php
require '../classes/single_service.php';

// Instantiate the Service class
$serviceModel = new Service();

// Fetch the service details to be edited
$service_id = $_GET['id'];  // The ID should be passed via query string
$service = $serviceModel->db_fetch_one("SELECT * FROM services WHERE service_id = '$service_id'");

// Fetch all service categories
$categories = $serviceModel->db_fetch_all("SELECT * FROM service_categories");

// Fetch all providers (assuming role_id = 2 represents service providers)
$providers = $serviceModel->db_fetch_all("SELECT user_id, user_name FROM users WHERE role_id = 2");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
</head>
<body>
    <h1>Edit Service</h1>
    <form action="../actions/editSingleService.php" method="post">
        <input type="hidden" name="service_id" value="<?= htmlspecialchars($service['service_id']) ?>">

        <label for="service_name">Service Name:</label>
        <input type="text" id="service_name" name="service_name" value="<?= htmlspecialchars($service['service_name']) ?>" required><br>

        <label for="category_id">Service Category:</label>
        <select id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['category_id']) ?>" 
                    <?= ($category['category_id'] == $service['category_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['category_name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="provider_id">Service Provider:</label>
        <select id="provider_id" name="provider_id" required>
            <option value="">Select a Provider</option>
            <?php foreach ($providers as $provider): ?>
                <option value="<?= htmlspecialchars($provider['user_id']) ?>" 
                    <?= ($provider['user_id'] == $service['provider_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($provider['user_name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="service_description">Description:</label>
        <textarea id="service_description" name="service_description" required><?= htmlspecialchars($service['service_description']) ?></textarea><br>

        <label for="service_cost">Cost:</label>
        <input type="number" step="0.01" id="service_cost" name="service_cost" value="<?= htmlspecialchars($service['service_cost']) ?>" required><br>

        <label for="service_duration">Duration (minutes):</label>
        <input type="number" id="service_duration" name="service_duration" value="<?= htmlspecialchars($service['service_duration']) ?>" required><br>

        <button type="submit">Update Service</button>
    </form>
</body>
</html>
