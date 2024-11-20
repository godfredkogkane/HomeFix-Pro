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
    <title>Admin Dashboard - HomeFix Pro</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f4f5f7;
            color: #333;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #1e6b3a;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
            position: fixed;
            height: 100%;
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
            flex-grow: 1;
            padding: 40px;
        }

        .main-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e6b3a;
        }

        .main-content p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 40px;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 12px;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 30px;
            text-align: center;
        }

        .card-icon {
            font-size: 3rem;
            color: #1e6b3a;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                padding: 20px;
            }

            .card-body {
                padding: 20px;
            }

            .card-icon {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                position: absolute;
                width: 100%;
                height: auto;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                padding: 10px;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<nav class="sidebar">
    <div class="brand">Admin Panel</div>
    <a href="admin_dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard</a>
    <a href="manage_users.php"><i class="fas fa-users"></i> Manage Users</a>
    <a href="manage_bookings.php"><i class="fas fa-calendar-alt"></i> Manage Bookings</a>
    <a href="manage_services.php"><i class="fas fa-cogs"></i> Manage Services</a>
    <a href="manage_service_categories.php"><i class="fas fa-list"></i> Manage Categories</a>
    <a href="../view/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</nav>

<!-- Main Content -->
<main class="main-content">
    <h1>Welcome, Admin!</h1>
    <p>Manage users, bookings, services, and service categories efficiently with the options below.</p>

    <!-- Action Cards -->
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-users card-icon"></i>
                    <h2 class="card-title">Manage Users</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-calendar-alt card-icon"></i>
                    <h2 class="card-title">Manage Bookings</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-cogs card-icon"></i>
                    <h2 class="card-title">Manage Services</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-list card-icon"></i>
                    <h2 class="card-title">Manage Service Categories</h2>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
