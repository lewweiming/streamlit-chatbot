<?php

class HotelBookingSessionManager
{
    private $sessionKey = 'hotel_booking';

    // Start the session if not already started
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION[$this->sessionKey])) {
            $_SESSION[$this->sessionKey] = [];
        }
    }

    // Add a hotel booking to the session
    public function addBooking($hotelId, $hotelDetails)
    {
        $_SESSION[$this->sessionKey][$hotelId] = $hotelDetails;
    }

    // Update a hotel booking in the session
    public function updateBooking($hotelId, $updatedDetails)
    {
        if (isset($_SESSION[$this->sessionKey][$hotelId])) {
            $_SESSION[$this->sessionKey][$hotelId] = array_merge($_SESSION[$this->sessionKey][$hotelId], $updatedDetails);
        } else {
            throw new Exception("Hotel booking with ID {$hotelId} does not exist.");
        }
    }

    // Retrieve a hotel booking by hotel ID
    public function getBooking($hotelId)
    {
        return $_SESSION[$this->sessionKey][$hotelId] ?? null;
    }

    // Retrieve all hotel bookings in the session
    public function getAllBookings()
    {
        return $_SESSION[$this->sessionKey];
    }

    // Remove a hotel booking from the session
    public function removeBooking($hotelId)
    {
        if (isset($_SESSION[$this->sessionKey][$hotelId])) {
            unset($_SESSION[$this->sessionKey][$hotelId]);
        }
    }

    // Clear all hotel bookings from the session
    public function clearBookings()
    {
        $_SESSION[$this->sessionKey] = [];
    }

    // Check if a specific hotel booking exists
    public function bookingExists($hotelId)
    {
        return isset($_SESSION[$this->sessionKey][$hotelId]);
    }

    // Destroy the session
    public function destroySession()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }
}

// Example Usage
// $hotelSession = new HotelSessionManager();
// $hotelSession->addBooking(1, ['name' => 'Hotel California', 'price' => 200, 'duration' => '3 nights']);
// $hotelSession->updateBooking(1, ['duration' => '5 nights', 'price' => 330]);
// print_r($hotelSession->getBooking(1));
// $hotelSession->removeBooking(1);
?>
