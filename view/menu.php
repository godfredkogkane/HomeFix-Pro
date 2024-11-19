<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <!-- Link to External CSS -->
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>

<!-- Menu View -->
<nav>
    <ul>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <li><a href="register.php" class="active">Register</a></li>
            <li><a href="login.php">Login</a></li>
        <?php else: ?>
            <li><a href="logout.php">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>

</body>
</html>
