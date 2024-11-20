<?php
// Include the db_connection file
include_once('../settings/db_class.php');

class Service extends db_connection {
    
    public function __construct() {
        // Establish the database connection
        if (!$this->db_connect()) {
            die("Database connection failed");
        }
    }

    // Method to get all services with associated category and provider names
    public function getAllServices() {
        $sql = "SELECT s.service_id, s.service_name, c.category_name, u.user_name AS provider_name, 
                       s.service_cost, s.service_description, s.service_duration
                FROM services s
                INNER JOIN service_categories c ON s.category_id = c.category_id
                LEFT JOIN service_providers sp ON s.provider_id = sp.provider_id
                LEFT JOIN users u ON sp.user_id = u.user_id";
        return $this->db_fetch_all($sql);
    }

    // Method to get services by category ID
    public function getServicesByCategoryId($category_id) {
        $sql = "SELECT s.service_id, s.service_name, s.service_description, s.service_cost, s.service_duration, 
                       u.user_name AS provider_name
                FROM services s
                INNER JOIN service_categories c ON s.category_id = c.category_id
                LEFT JOIN service_providers sp ON s.provider_id = sp.provider_id
                LEFT JOIN users u ON sp.user_id = u.user_id
                WHERE s.category_id = ?";
        
        // Prepare and execute the statement
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, 'i', $category_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_stmt_close($stmt);
            return $services;
        } else {
            error_log("Database Error: " . mysqli_error($this->db));
            return false; // Error preparing the statement
        }
    }

    // Method to add a new service
    public function addService($service_name, $category_id, $provider_id, $description, $cost, $duration) {
        // Ensure provider exists
        if (!$this->validateProvider($provider_id)) {
            return false;
        }

        $sql = "INSERT INTO services (service_name, category_id, provider_id, service_description, service_cost, service_duration) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, 'siisdi', $service_name, $category_id, $provider_id, $description, $cost, $duration);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                error_log("Database Error: " . mysqli_error($this->db));
                mysqli_stmt_close($stmt);
                return false;
            }
        } else {
            error_log("Database Error: " . mysqli_error($this->db));
            return false;
        }
    }

    // Method to edit a service
    public function editService($service_id, $service_name, $category_id, $provider_id, $description, $cost, $duration) {
        // Ensure provider exists
        if (!$this->validateProvider($provider_id)) {
            return false;
        }

        $sql = "UPDATE services 
                SET service_name = ?, category_id = ?, provider_id = ?, service_description = ?, service_cost = ?, service_duration = ? 
                WHERE service_id = ?";
        
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, 'siisdii', $service_name, $category_id, $provider_id, $description, $cost, $duration, $service_id);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                error_log("Database Error: " . mysqli_error($this->db));
                mysqli_stmt_close($stmt);
                return false;
            }
        } else {
            error_log("Database Error: " . mysqli_error($this->db));
            return false;
        }
    }

    // Method to delete a service
    public function deleteService($service_id) {
        $sql = "DELETE FROM services WHERE service_id = ?";
        
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, 'i', $service_id);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                error_log("Database Error: " . mysqli_error($this->db));
                mysqli_stmt_close($stmt);
                return false;
            }
        } else {
            error_log("Database Error: " . mysqli_error($this->db));
            return false;
        }
    }

    // Method to get a service by ID
    public function getServiceById($service_id) {
        $sql = "SELECT s.service_id, s.service_name, s.category_id, s.provider_id, 
                       s.service_description, s.service_cost, s.service_duration,
                       c.category_name, u.user_name AS provider_name
                FROM services s
                INNER JOIN service_categories c ON s.category_id = c.category_id
                LEFT JOIN service_providers sp ON s.provider_id = sp.provider_id
                LEFT JOIN users u ON sp.user_id = u.user_id
                WHERE s.service_id = ?";
        
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, 'i', $service_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $service = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);
            return $service;
        } else {
            error_log("Database Error: " . mysqli_error($this->db));
            return false;
        }
    }

    // Helper method to validate provider ID
    public function validateProvider($provider_id) {
        $sql = "SELECT provider_id FROM service_providers WHERE provider_id = ?";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $provider_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $isValid = mysqli_stmt_num_rows($stmt) > 0;
        mysqli_stmt_close($stmt);
        return $isValid;
    }
}
