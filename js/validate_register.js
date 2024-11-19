function validateRegisterForm() {
    const fullname = document.getElementById("fullname").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const contact = document.getElementById("contact").value;

    // Patterns for validation
    const emailPattern = /^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/;
    const contactPattern = /^\+?[1-9]\d{1,14}$/;

    // Validate full name
    if (fullname.trim() === "") {
        alert("Full name cannot be empty.");
        return false;
    }

    // Validate Ashesi email
    if (!emailPattern.test(email)) {
        alert("Email must be an Ashesi email.");
        return false;
    }

    // Validate phone number with country code
    if (!contactPattern.test(contact)) {
        alert("Please provide a valid phone number including the country code (E.164 format), e.g., +1.");
        return false;
    }

    // Validate password length (minimum 8 characters)
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    // Validate that password matches confirm password
    if (password !== confirmPassword) {
        alert("Passwords do not match. Please re-enter.");
        return false;
    }

    // If all validations pass, return true
    return true;
}
