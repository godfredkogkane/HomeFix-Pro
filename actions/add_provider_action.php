<?php
require '../controllers/provider_controller.php';

$data = [
    'user_id' => $_POST['user_id'],
    'provider_service_category' => $_POST['provider_service_category'],
    'provider_rating' => $_POST['provider_rating'] ?? null
];

if (addProvider($data)) {
    echo "Service provider added successfully.";
} else {
    echo "Error adding service provider.";
}
?>
