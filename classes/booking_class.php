<?php
include_once('../settings/db_class.php');

class Booking extends db_connection {

    public function addBooking($user_id, $service_id, $service_date, $service_cost) {
        $sql = "INSERT INTO service_bookings (user_id, provider_id, service_date, service_cost, booking_status)
                VALUES ('$user_id', (SELECT provider_id FROM services WHERE service_id = '$service_id'), 
                '$service_date', '$service_cost', 'Pending')";
        return $this->db_query($sql);
    }

    public function getUserBookings($user_id) {
        $sql = "SELECT b.booking_id, s.service_name, b.service_date, b.service_cost, b.booking_status, u.user_name AS provider_name 
                FROM service_bookings b
                INNER JOIN services s ON b.provider_id = s.provider_id
                INNER JOIN service_providers sp ON sp.provider_id = b.provider_id
                INNER JOIN users u ON sp.user_id = u.user_id
                WHERE b.user_id = '$user_id'";
        return $this->db_fetch_all($sql);
    }
    

    public function getBookingById($booking_id) {
        $sql = "SELECT b.booking_id, s.service_name, b.service_date, b.service_cost, b.booking_status
                FROM service_bookings b
                INNER JOIN services s ON b.provider_id = s.provider_id
                WHERE b.booking_id = '$booking_id'";
        return $this->db_fetch_one($sql);
    }

    public function updateBooking($booking_id, $service_date) {
        $sql = "UPDATE service_bookings SET service_date = '$service_date' WHERE booking_id = '$booking_id'";
        return $this->db_query($sql);
    }

    public function deleteBooking($booking_id) {
        $sql = "DELETE FROM service_bookings WHERE booking_id = '$booking_id'";
        return $this->db_query($sql);
    }
}
