<?php
// Include the db_connection file
include_once('../settings/db_class.php');

class Customer extends db_connection {
    public function __construct() {
        // Call the db_connect method to establish the database connection
        if (!$this->db_connect()) {
            die("Database connection failed");
        }
    }

    // Method to add a new user (customer or provider)
    public function addCustomer($fullname, $email, $hashedPassword, $contact, $country, $city, $address, $role) {
        $sql = "
            INSERT INTO users (user_name, user_email, user_password, user_contact, user_country, user_city, user_address, role_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = mysqli_prepare($this->db, $sql);

        // Bind the parameters to the statement
        mysqli_stmt_bind_param($stmt, 'ssssssss', $fullname, $email, $hashedPassword, $contact, $country, $city, $address, $role);

        // Execute the statement
        return mysqli_stmt_execute($stmt);
    }

    // Check if email exists
    public function checkEmail($email) {
        $sql = "SELECT * FROM users WHERE user_email = ?";
        
        // Prepare the statement
        $stmt = mysqli_prepare($this->db, $sql);
        
        // Bind the email parameter
        mysqli_stmt_bind_param($stmt, 's', $email);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Store the result
        mysqli_stmt_store_result($stmt);

        // Check if any rows were returned
        return mysqli_stmt_num_rows($stmt) > 0;
    }

    // Method to get user by email (used for login)
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE user_email = ?";

        // Prepare the statement
        $stmt = mysqli_prepare($this->db, $sql);

        // Bind the email parameter
        mysqli_stmt_bind_param($stmt, 's', $email);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Fetch the result
        $result = mysqli_stmt_get_result($stmt);

        // Return the associated array of the user
        return mysqli_fetch_assoc($result);
    }
}
?>
