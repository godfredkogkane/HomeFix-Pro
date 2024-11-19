<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="../css/register.css">
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

    <!-- Registration Form Container -->
    <div class="form-container">
        <h2>Create Account</h2>
        <form id="registerForm" action="../actions/registerAction.php" method="POST" onsubmit="return validateRegisterForm();">
            
            <!-- Full Name -->
            <div class="mb-3">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
                <span class="error" id="fullnameError">Can't be blank.</span>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Phone Number (with country code)" required>
                <span class="error" id="contactError">Please include the country code (e.g., +1).</span>
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
                <span class="error" id="confirmPasswordError">Passwords do not match.</span>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/validate_register.js"></script>
</body>
</html>
