<?php
session_start();

// Ensure the user is an admin
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
    header('Location: ../view/login.php');
    exit();
}

// Include the services class and database connection
require_once '../classes/service.php';
require_once '../settings/db_class.php';

// Instantiate the Service class
$serviceModel = new Service();

// Fetch all categories
$categories = $serviceModel->db_fetch_all("SELECT * FROM service_categories");

// Fetch all providers (role_id = 2)
$providers = $serviceModel->db_fetch_all("
    SELECT user_id, user_name 
    FROM users 
    WHERE role_id = 2
");

// Handle error if no providers found
if (!$providers) {
    $providers = [];
    $providerFetchError = "No service providers available.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Service</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f5f7;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #1e6b3a;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
            height: 100vh;
            position: fixed;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            font-weight: 500;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar a.active, .sidebar a:hover {
            background-color: #164d2b;
            font-weight: 700;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 40px;
            width: 100%;
        }

        .form-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #1e6b3a;
            box-shadow: 0 0 5px rgba(30, 107, 58, 0.5);
        }

        button {
            width: 100%;
            background-color: #1e6b3a;
            color: white;
            padding: 12px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #164d2b;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<nav class="sidebar">
    <div class="brand">Admin Panel</div>
    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
    <a href="manage_users.php"><i class="fas fa-users"></i> Manage Users</a>
    <a href="manage_bookings.php"><i class="fas fa-calendar-alt"></i> Manage Bookings</a>
    <a href="manage_services.php" class="active"><i class="fas fa-cogs"></i> Manage Services</a>
    <a href="manage_service_categories.php"><i class="fas fa-list"></i> Manage Categories</a>
    <a href="../view/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</nav>

<!-- Main Content -->
<main class="main-content">
    <h1>Add New Service</h1>
    <p>Admins can add new services to the platform by filling out the form below.</p>

    <div class="form-container">
        <form action="../actions/add_service_action.php" method="post">
            <!-- Service Name -->
            <div class="mb-4">
                <label for="service_name" class="form-label">Service Name</label>
                <input type="text" id="service_name" name="service_name" class="form-control" placeholder="Enter service name" required>
            </div>

            <!-- Service Category -->
            <div class="mb-4">
                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= htmlspecialchars($category['category_id']); ?>">
                            <?= htmlspecialchars($category['category_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Service Provider -->
            <div class="mb-4">
                <label for="provider_id" class="form-label">Provider</label>
                <select id="provider_id" name="provider_id" class="form-control" required>
                    <option value="">Select a Provider</option>
                    <?php if (!empty($providers)): ?>
                        <?php foreach ($providers as $provider): ?>
                            <option value="<?= htmlspecialchars($provider['user_id']); ?>">
                                <?= htmlspecialchars($provider['user_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="" disabled><?= isset($providerFetchError) ? $providerFetchError : 'No Providers Found'; ?></option>
                    <?php endif; ?>
                </select>
            </div>

            <!-- Service Description -->
            <div class="mb-4">
                <label for="service_description" class="form-label">Description</label>
                <textarea id="service_description" name="service_description" class="form-control" rows="4" placeholder="Enter service description" required></textarea>
            </div>

            <!-- Service Cost -->
            <div class="mb-4">
                <label for="service_cost" class="form-label">Cost</label>
                <input type="number" step="0.01" id="service_cost" name="service_cost" class="form-control" placeholder="Enter service cost" required>
            </div>

            <!-- Service Duration -->
            <div class="mb-4">
                <label for="service_duration" class="form-label">Duration (minutes)</label>
                <input type="number" id="service_duration" name="service_duration" class="form-control" placeholder="Enter duration in minutes" required>
            </div>

            <!-- Submit Button -->
            <button type="submit">Add Service</button>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
