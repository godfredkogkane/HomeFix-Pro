<?php
session_start();

// Ensure the user is an admin
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
    header('Location: ../view/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Service Category</title>
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

        .sidebar .brand {
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 15px 20px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar a i {
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #164d2b;
            font-weight: 700;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 40px;
            flex-grow: 1;
        }

        .main-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e6b3a;
        }

        /* Form Styles */
        .form-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: 600;
            color: #555;
            margin-bottom: 10px;
        }

        .form-control {
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #1e6b3a;
            box-shadow: 0 0 5px rgba(30, 107, 58, 0.5);
        }

        button {
            width: 100%;
            background-color: #1e6b3a;
            color: white;
            padding: 12px 20px;
            font-size: 1.2rem;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #164d2b;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .sidebar {
                position: absolute;
                width: 100%;
                height: auto;
                flex-direction: row;
                justify-content: space-around;
                padding: 10px;
            }

            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar Navigation -->
<nav class="sidebar">
    <div class="brand">Admin Panel</div>
    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
    <a href="manage_users.php"><i class="fas fa-users"></i> Manage Users</a>
    <a href="manage_bookings.php"><i class="fas fa-calendar-alt"></i> Manage Bookings</a>
    <a href="manage_services.php"><i class="fas fa-cogs"></i> Manage Services</a>
    <a href="manage_service_categories.php" class="active"><i class="fas fa-list"></i> Manage Categories</a>
    <a href="../view/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</nav>

<!-- Main Content -->
<main class="main-content">
    <h1>Add New Service Category</h1>
    <p>Fill in the details below to create a new service category.</p>

    <div class="form-container">
        <form action="../actions/add_service_category.php" method="POST" enctype="multipart/form-data">
            <!-- Category Name -->
            <div class="form-group mb-4">
                <label for="category_name">Service Category Name</label>
                <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter category name" required>
            </div>

            <!-- Category Description -->
            <div class="form-group mb-4">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Provide a brief description" required></textarea>
            </div>

            <!-- Category Image -->
            <div class="form-group mb-4">
                <label for="image">Category Image</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg" required>
                <small class="text-muted">Allowed formats: PNG, JPG, JPEG. Max size: 2MB.</small>
            </div>

            <!-- Submit Button -->
            <button type="submit">Add Service Category</button>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
