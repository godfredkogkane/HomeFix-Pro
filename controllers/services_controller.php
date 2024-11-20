<?php
// Include the necessary Service class
include_once('../classes/service.php');

// Controller function to add a new service
function addServiceController($service_name, $category_id, $provider_id, $description, $cost, $duration) {
    $service = new Service();

    // Ensure the provider ID exists in the service_providers table
    $isProviderValid = $service->validateProvider($provider_id);
    if (!$isProviderValid) {
        return ['error' => "The selected provider does not exist or is invalid."];
    }

    // Add the service
    $result = $service->addService($service_name, $category_id, $provider_id, $description, $cost, $duration);
    if ($result) {
        return ['success' => "Service successfully added."];
    } else {
        return ['error' => "Failed to add the service. Please try again."];
    }
}

// Controller function to delete a service
function deleteServiceController($service_id) {
    $service = new Service();
    return $service->deleteService($service_id);
}

// Controller function to edit a service
function editServiceController($service_id, $service_name, $category_id, $provider_id, $description, $cost, $duration) {
    $service = new Service();

    // Ensure the provider ID exists in the service_providers table
    $isProviderValid = $service->validateProvider($provider_id);
    if (!$isProviderValid) {
        return ['error' => "The selected provider does not exist or is invalid."];
    }

    // Edit the service
    $result = $service->editService($service_id, $service_name, $category_id, $provider_id, $description, $cost, $duration);
    if ($result) {
        return ['success' => "Service successfully updated."];
    } else {
        return ['error' => "Failed to update the service. Please try again."];
    }
}

// Controller function to get a service by ID
function getServiceByIdController($service_id) {
    $service = new Service();
    return $service->getServiceById($service_id);
}

// Controller function to get all services
function getAllServicesController() {
    $service = new Service();
    return $service->getAllServices();
}
