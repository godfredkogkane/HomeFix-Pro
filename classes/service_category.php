<?php
// Include the db_connection file
include_once('../settings/db_class.php');

class ServiceCategory extends db_connection {

    public function __construct() {
        // Establish the database connection
        if (!$this->db_connect()) {
            die("Database connection failed");
        }
    }

    // Method to add a new service category
    public function addServiceCategory($category_name, $description, $image) {
        $sql = "
            INSERT INTO service_categories (category_name, description, image) 
            VALUES (?, ?, ?)";
        
        // Prepare the statement
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, 'sss', $category_name, $description, $image);
            
            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                mysqli_stmt_close($stmt);
                return false; // Error executing the statement
            }
        } else {
            return false; // Error preparing the statement
        }
    }

    // Method to edit an existing service category
    public function editServiceCategory($category_id, $category_name, $description, $image) {
        $sql = "
            UPDATE service_categories 
            SET category_name = ?, description = ?, image = ? 
            WHERE category_id = ?";
        
        // Prepare the statement
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, 'sssi', $category_name, $description, $image, $category_id);
            
            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                mysqli_stmt_close($stmt);
                return false; // Error executing the statement
            }
        } else {
            return false; // Error preparing the statement
        }
    }

    // Method to delete a service category
    public function deleteServiceCategory($category_id) {
        $sql = "DELETE FROM service_categories WHERE category_id = ?";
        
        // Prepare the statement
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            // Bind parameter
            mysqli_stmt_bind_param($stmt, 'i', $category_id);
            
            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                mysqli_stmt_close($stmt);
                return false; // Error executing the statement
            }
        } else {
            return false; // Error preparing the statement
        }
    }

    // Method to get all service categories
    public function getAllServiceCategories() {
        $sql = "SELECT * FROM service_categories";
        
        // Execute the query
        if ($result = mysqli_query($this->db, $sql)) {
            // Fetch all records and return as an associative array
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false; // Error executing the query
        }
    }

    // Method to get a service category by ID (useful for editing)
    public function getServiceCategoryById($category_id) {
        $sql = "SELECT * FROM service_categories WHERE category_id = ?";
        
        // Prepare the statement
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            // Bind parameter
            mysqli_stmt_bind_param($stmt, 'i', $category_id);
            
            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                // Get the result
                $result = mysqli_stmt_get_result($stmt);
                
                // Fetch and return the record as an associative array
                $serviceCategory = mysqli_fetch_assoc($result);
                mysqli_stmt_close($stmt);
                return $serviceCategory;
            } else {
                mysqli_stmt_close($stmt);
                return false; // Error executing the statement
            }
        } else {
            return false; // Error preparing the statement
        }
    }

    public function addProvider($data) {
        $sql = "INSERT INTO service_providers (user_id, provider_service_category) 
                VALUES ('{$data['user_id']}', '{$data['provider_service_category']}')";
        return $this->db_query($sql);
    }
}
?>
