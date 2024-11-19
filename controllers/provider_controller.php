<?php
require '../classes/service.php';

$serviceModel = new Service();

function addProvider($data) {
    global $serviceModel;
    return $serviceModel->addProvider($data);
}
