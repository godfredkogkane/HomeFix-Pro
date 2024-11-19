<?php
include_once('../classes/booking_class.php');

class BookingController {
    
    private $booking;

    public function __construct() {
        $this->booking = new Booking();
    }

    // Add booking method
    public function addBooking($user_id, $service_id, $service_date, $service_cost) {
        return $this->booking->addBooking($user_id, $service_id, $service_date, $service_cost);
    }

    // Get user bookings method
    public function getUserBookings($user_id) {
        return $this->booking->getUserBookings($user_id);
    }

    // Get booking by ID
    public function getBookingById($booking_id) {
        return $this->booking->getBookingById($booking_id);
    }

    // Update booking method
    public function updateBooking($booking_id, $service_date) {
        return $this->booking->updateBooking($booking_id, $service_date);
    }

    // Delete booking method
    public function deleteBooking($booking_id) {
        return $this->booking->deleteBooking($booking_id);
    }
}
