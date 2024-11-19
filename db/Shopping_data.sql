-- Use or create the database
USE mysql;
DROP DATABASE IF EXISTS Shopping_data;
CREATE DATABASE Shopping_data;
USE Shopping_data;

-- Enable UTF-8 encoding
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Table for user roles (customer, provider, admin)
CREATE TABLE `roles` (
  `role_id` INT(11) NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for users (customers, providers, admins)
CREATE TABLE `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(100) NOT NULL,
  `user_email` VARCHAR(50) NOT NULL,
  `user_password` VARCHAR(255) NOT NULL,
  `user_contact` VARCHAR(15) NOT NULL,
  `user_country` VARCHAR(50) NOT NULL,
  `user_city` VARCHAR(50) NOT NULL,
  `user_address` VARCHAR(255) DEFAULT NULL,
  `role_id` INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for service categories (e.g., Plumbing, Electrical), updated with image field
CREATE TABLE `service_categories` (
  `category_id` INT(11) NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `image` VARCHAR(255) DEFAULT NULL,  -- Path to the image for category representation
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for service providers (linked to users table)
CREATE TABLE `service_providers` (
  `provider_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `provider_service_category` INT(11) NOT NULL,
  `provider_rating` DOUBLE DEFAULT NULL,
  PRIMARY KEY (`provider_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`provider_service_category`) REFERENCES `service_categories` (`category_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for services (linked to service categories and providers)
CREATE TABLE `services` (
  `service_id` INT(11) NOT NULL AUTO_INCREMENT,
  `category_id` INT(11) NOT NULL,
  `provider_id` INT(11) DEFAULT NULL,
  `service_name` VARCHAR(100) NOT NULL,
  `service_description` TEXT NOT NULL,
  `service_cost` DOUBLE NOT NULL,
  `service_duration` INT(11) NOT NULL,
  PRIMARY KEY (`service_id`),
  FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`category_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`provider_id`) REFERENCES `service_providers` (`provider_id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for user locations (each user can have multiple saved locations)
CREATE TABLE `user_locations` (
  `location_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `location_name` VARCHAR(100) DEFAULT NULL,
  `location_address` VARCHAR(255) NOT NULL,
  `location_city` VARCHAR(50) NOT NULL,
  `location_state` VARCHAR(50) DEFAULT NULL,
  `location_zip` VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (`location_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for tracking provider availability
CREATE TABLE `provider_availability` (
  `availability_id` INT(11) NOT NULL AUTO_INCREMENT,
  `provider_id` INT(11) NOT NULL,
  `availability_date` DATE NOT NULL,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  PRIMARY KEY (`availability_id`),
  FOREIGN KEY (`provider_id`) REFERENCES `service_providers` (`provider_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for service bookings
CREATE TABLE `service_bookings` (
  `booking_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `service_id` INT(11) NOT NULL,
  `provider_id` INT(11) NOT NULL,
  `location_id` INT(11) NOT NULL,
  `problem_description` TEXT NOT NULL,
  `booking_date` DATE NOT NULL,
  `service_date` DATE NOT NULL,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  `booking_status` VARCHAR(50) NOT NULL DEFAULT 'Pending',
  `service_cost` DOUBLE NOT NULL,
  PRIMARY KEY (`booking_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`provider_id`) REFERENCES `service_providers` (`provider_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`location_id`) REFERENCES `user_locations` (`location_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for customer reviews of service providers
CREATE TABLE `reviews` (
  `review_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `provider_id` INT(11) NOT NULL,
  `service_id` INT(11) NOT NULL,
  `booking_id` INT(11) NOT NULL,
  `rating` INT(11) NOT NULL CHECK (`rating` BETWEEN 1 AND 5),
  `review_text` VARCHAR(255) DEFAULT NULL,
  `review_date` DATE NOT NULL,
  PRIMARY KEY (`review_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`provider_id`) REFERENCES `service_providers` (`provider_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`booking_id`) REFERENCES `service_bookings` (`booking_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for tracking payments
CREATE TABLE `payments` (
  `payment_id` INT(11) NOT NULL AUTO_INCREMENT,
  `booking_id` INT(11) NOT NULL,
  `amount_paid` DOUBLE NOT NULL,
  `payment_date` DATE NOT NULL,
  `payment_method` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`payment_id`),
  FOREIGN KEY (`booking_id`) REFERENCES `service_bookings` (`booking_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert initial roles into the `roles` table
INSERT INTO `roles` (`role_name`) VALUES ('customer'), ('provider'), ('admin');

-- Auto-increment settings
ALTER TABLE `roles` MODIFY `role_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users` MODIFY `user_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `service_categories` MODIFY `category_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `service_providers` MODIFY `provider_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `services` MODIFY `service_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `provider_availability` MODIFY `availability_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `service_bookings` MODIFY `booking_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `user_locations` MODIFY `location_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `reviews` MODIFY `review_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `payments` MODIFY `payment_id` INT(11) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
