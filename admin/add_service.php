<?php
// Include the services class and database connection
require_once '../classes/service.php';
require_once '../settings/db_class.php';

// Instantiate the Service class
$serviceModel = new Service();

// Fetch all categories and providers
$categories = $serviceModel->db_fetch_all("SELECT * FROM service_categories");
$providers = $serviceModel->db_fetch_all("SELECT service_providers.provider_id, users.user_name 
                                          FROM service_providers 
                                          INNER JOIN users ON service_providers.user_id = users.user_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <link rel="stylesheet" href="../css/add_service.css">
</head>
<body>
    <div class="container">
        <h1>Add New Service</h1>
        
        <!-- Form to add a new service -->
        <form action="../actions/add_service_action.php" method="post">
            <!-- Service Name -->
            <div class="form-group">
                <label for="service_name">Service Name:</label>
                <input type="text" id="service_name" name="service_name" class="form-control" required>
            </div>

            <!-- Service Category -->
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= htmlspecialchars($category['category_id']) ?>">
                            <?= htmlspecialchars($category['category_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Service Provider -->
            <div class="form-group">
                <label for="provider_id">Provider:</label>
                <select id="provider_id" name="provider_id" class="form-control">
                    <option value="">Select a Provider</option>
                    <?php foreach ($providers as $provider): ?>
                        <option value="<?= htmlspecialchars($provider['provider_id']) ?>">
                            <?= htmlspecialchars($provider['user_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Service Description -->
            <div class="form-group">
                <label for="service_description">Description:</label>
                <textarea id="service_description" name="service_description" class="form-control" required></textarea>
            </div>

            <!-- Service Cost -->
            <div class="form-group">
                <label for="service_cost">Cost:</label>
                <input type="number" step="0.01" id="service_cost" name="service_cost" class="form-control" required>
            </div>

            <!-- Service Duration -->
            <div class="form-group">
                <label for="service_duration">Duration (minutes):</label>
                <input type="number" id="service_duration" name="service_duration" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Add Service</button>
        </form>
    </div>

    <!-- Add any additional scripts here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
