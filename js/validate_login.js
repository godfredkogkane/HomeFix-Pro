function validateLoginForm() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // General email validation pattern
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Check if email is empty
    if (email.trim() === "") {
        alert("Email is required.");
        return false;
    }

    // Validate email format (general email)
    if (!emailPattern.test(email)) {
        alert("Invalid email format. Please enter a valid email address.");
        return false;
    }

    // Check if password is empty
    if (password.trim() === "") {
        alert("Password is required.");
        return false;
    }

    // If everything is fine, allow the form to submit
    return true;
}
