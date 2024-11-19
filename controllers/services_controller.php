<?php
// Include the Service class
include_once('../classes/service.php');

// Function to add a new service
function addServiceController($service_name, $category_id, $provider_id, $description, $cost, $duration) {
    $service = new Service();
    return $service->addService($service_name, $category_id, $provider_id, $description, $cost, $duration);
}

// Function to delete a service
function deleteServiceController($service_id) {
    $service = new Service();
    return $service->deleteService($service_id);
}

// Function to edit a service
function editServiceController($service_id, $service_name, $category_id, $provider_id, $description, $cost, $duration) {
    $service = new Service();
    return $service->editService($service_id, $service_name, $category_id, $provider_id, $description, $cost, $duration);
}

// Function to get a service by ID
function getServiceByIdController($service_id) {
    $service = new Service();
    return $service->getServiceById($service_id);
}
?>
