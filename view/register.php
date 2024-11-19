<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css">
    <!-- Link to custom CSS -->
    <link rel="stylesheet" href="../css/register.css">
    <style>
        /* Custom styling for messages */
        .message-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1050;
            text-align: center;
        }
        .alert {
            display: inline-block;
            margin: 15px auto;
            padding: 15px;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HomeFix Pro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service_list.php">Service Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Message Display Section -->
    <div class="message-container">
        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($_SESSION['error'] as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['error']); // Clear errors after displaying ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($_SESSION['success']); ?>
            </div>
            <?php unset($_SESSION['success']); // Clear success message after displaying ?>
        <?php endif; ?>
    </div>

    <!-- Registration Form Container -->
    <div class="form-container mt-5 pt-5">
        <h2>Create Account</h2>
        <form id="registerForm" action="../actions/registerAction.php" method="POST" onsubmit="return validateRegisterForm();">
            
            <!-- Full Name -->
            <div class="mb-3">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter phone number" required>
                <small class="text-muted">Start your number without the leading zero. Example: 701234567.</small>
            </div>

            <!-- Country -->
            <div class="mb-3">
                <input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
            </div>

            <!-- City -->
            <div class="mb-3">
                <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
            </div>

            <!-- Role Selection -->
            <div class="mb-3">
                <label for="role" class="form-label">Select Account Type</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="1">Customer</option>
                    <option value="2">Service Provider</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required minlength="8">
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn btn-primary">Create Account</button>
        </form>

        <p class="form-text mt-3">
            By clicking below and creating an account, I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
        </p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 HomeFix Pro. All Rights Reserved.</p>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script src="../js/validate_register.js"></script>
</body>
</html>
