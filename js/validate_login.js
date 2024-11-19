function validateLoginForm() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/;

    // Check if email is empty
    if (email.trim() === "") {
        alert("Email is required.");
        return false;
    }

    // Validate email format (Ashesi email)
    if (!emailPattern.test(email)) {
        alert("Email must be an Ashesi email.");
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
