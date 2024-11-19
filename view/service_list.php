<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Services</title>
    <link rel="stylesheet" href="../css/service_list.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="logo">HomeFix Pro</a>
            <ul class="navbar-links">
                <li><a href="services.php">Services</a></li>
                <li><a href="booking_history.php">Booking History</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Available Service Categories</h2>

        <!-- Service Categories and Services -->
        <div class="service-category-list">
            <?php
                include_once('../classes/service_category.php');
                include_once('../classes/service.php');
                
                $categoryClass = new ServiceCategory();
                $categories = $categoryClass->getAllServiceCategories();

                foreach ($categories as $category) {
                    echo "<div class='category-item'>
                            <h3>{$category['category_name']}</h3>
                            <p>{$category['description']}</p>";
                    
                    // Get services for this category
                    $serviceClass = new Service();
                    $services = $serviceClass->getServicesByCategoryId($category['category_id']);
                    
                    echo "<ul class='service-list'>";
                    foreach ($services as $service) {
                        echo "<li>
                                <p><strong>{$service['service_name']}</strong> - {$service['service_description']}</p>
                                <p><strong>Cost:</strong> {$service['service_cost']} USD</p>
                                <a href='describe_service.php?service_id={$service['service_id']}' class='btn btn-success'>Select Service</a>
                              </li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>
