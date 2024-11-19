<?php
// Include the service category class
include_once('../classes/service_category.php');

// Function to add a new service category
function addServiceCategoryController($category_name, $description, $image) {
    $serviceCategory = new ServiceCategory();
    return $serviceCategory->addServiceCategory($category_name, $description, $image);
}

// Function to delete a service category
function deleteServiceCategoryController($category_id) {
    $serviceCategory = new ServiceCategory();
    return $serviceCategory->deleteServiceCategory($category_id);
}

// Function to edit a service category
function editServiceCategoryController($category_id, $category_name, $description, $image_path = null) {
    $serviceCategory = new ServiceCategory();
    return $serviceCategory->editServiceCategory($category_id, $category_name, $description, $image_path);
}

// Function to get a service category by ID
function getServiceCategoryByIdController($category_id) {
    $serviceCategory = new ServiceCategory();
    return $serviceCategory->getServiceCategoryById($category_id);
}
