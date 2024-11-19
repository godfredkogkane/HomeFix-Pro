<?php
// manageUsersController.php

session_start();

// Check if the user is an admin
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
    header('Location: ../view/login.php');
    exit();
}

// Include the action file
include_once('../actions/manageUsersAction.php');

// Call the action to get users
$users = getUsers();

// Pass the users data to the view (manage_users.php)
include_once('../admin/manage_users.php');
?>
