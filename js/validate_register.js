document.addEventListener("DOMContentLoaded", function () {
    // Initialize intl-tel-input
    const phoneInputField = document.getElementById("contact");
    const phoneInputInstance = window.intlTelInput(phoneInputField, {
        initialCountry: "auto",
        geoIpLookup: function (callback) {
            fetch("https://ipinfo.io?token=your_token", { headers: { Accept: "application/json" } })
                .then((resp) => resp.json())
                .then((resp) => callback(resp.country))
                .catch(() => callback("US"));
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
    });

    // Validation function
    window.validateRegisterForm = function () {
        const fullname = document.getElementById("fullname").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;

        // Patterns for validation
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        // Validate full name
        if (fullname.trim() === "") {
            alert("Full name cannot be empty.");
            return false;
        }

        // Validate email
        if (!emailPattern.test(email)) {
            alert("Please provide a valid email address.");
            return false;
        }

        // Validate phone number
        if (!phoneInputInstance.isValidNumber()) {
            alert("Please provide a valid phone number.");
            return false;
        }

        // Validate password
        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            return false;
        }

        // Validate confirm password
        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }

        // If all validations pass
        return true;
    };
});
