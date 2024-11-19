<?php
// manageUsersAction.php

// Include the necessary files
include_once('../settings/db_class.php');

function getUsers() {
    // Create an instance of the database connection class
    $db = new db_connection();

    // SQL query to fetch all users
    $sql = "SELECT * FROM users";

    // Execute the query and fetch the results
    $users = $db->db_fetch_all($sql);

    // Return the fetched users
    return $users;
}
?>
