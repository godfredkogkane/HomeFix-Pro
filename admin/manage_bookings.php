<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Bookings</title>
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

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #1e6b3a;
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-action {
            color: #fff;
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-edit {
            background-color: #ffc107;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Responsive Design */
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

            .table-container {
                padding: 10px;
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
    <a href="manage_bookings.php" class="active"><i class="fas fa-calendar-alt"></i> Manage Bookings</a>
    <a href="manage_services.php"><i class="fas fa-cogs"></i> Manage Services</a>
    <a href="manage_service_categories.php"><i class="fas fa-list"></i> Manage Categories</a>
    <a href="../view/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</nav>

<!-- Main Content -->
<main class="main-content">
    <h1>Manage Bookings</h1>
    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Customer</th>
                    <th>Provider</th>
                    <th>Problem Description</th>
                    <th>Booking Date</th>
                    <th>Service Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                    <th>Cost</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($bookings)): ?>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?= htmlspecialchars($booking['booking_id']); ?></td>
                            <td><?= htmlspecialchars($booking['customer_name']); ?></td>
                            <td><?= htmlspecialchars($booking['provider_name']); ?></td>
                            <td><?= htmlspecialchars($booking['problem_description']); ?></td>
                            <td><?= htmlspecialchars($booking['booking_date']); ?></td>
                            <td><?= htmlspecialchars($booking['service_date']); ?></td>
                            <td><?= htmlspecialchars($booking['start_time']); ?></td>
                            <td><?= htmlspecialchars($booking['end_time']); ?></td>
                            <td><?= htmlspecialchars($booking['booking_status']); ?></td>
                            <td><?= htmlspecialchars($booking['service_cost']); ?></td>
                            <td>
                                <a href="edit_booking.php?id=<?= $booking['booking_id']; ?>" class="btn-action btn-edit">Edit</a>
                                <a href="delete_booking.php?id=<?= $booking['booking_id']; ?>" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11" class="text-center">No bookings available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
