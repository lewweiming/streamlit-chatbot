<?php

class TripBookingSessionManager
{
    private $sessionKey = 'trip_booking';

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

    // Add a trip booking to the session
    public function addBooking($tripId, $tripDetails)
    {
        $_SESSION[$this->sessionKey][$tripId] = $tripDetails;
    }

    // Update a trip booking in the session
    public function updateBooking($tripId, $updatedDetails)
    {
        if (isset($_SESSION[$this->sessionKey][$tripId])) {
            $_SESSION[$this->sessionKey][$tripId] = array_merge($_SESSION[$this->sessionKey][$tripId], $updatedDetails);
        } else {
            throw new Exception("Trip booking with ID {$tripId} does not exist.");
        }
    }

    // Retrieve a trip booking by trip ID
    public function getBooking($tripId)
    {
        return $_SESSION[$this->sessionKey][$tripId] ?? null;
    }

    // Retrieve all trip bookings in the session
    public function getAllBookings()
    {
        return $_SESSION[$this->sessionKey];
    }

    // Remove a trip booking from the session
    public function removeBooking($tripId)
    {
        if (isset($_SESSION[$this->sessionKey][$tripId])) {
            unset($_SESSION[$this->sessionKey][$tripId]);
        }
    }

    // Clear all trip bookings from the session
    public function clearBookings()
    {
        $_SESSION[$this->sessionKey] = [];
    }

    // Check if a specific trip booking exists
    public function bookingExists($tripId)
    {
        return isset($_SESSION[$this->sessionKey][$tripId]);
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
// $tripSession = new TripSessionManager();
// $tripSession->addBooking(1, ['destination' => 'Paris', 'price' => 1200, 'duration' => '5 days']);
// $tripSession->updateBooking(1, ['duration' => '7 days', 'price' => 1500]);
// print_r($tripSession->getBooking(1));
// $tripSession->removeBooking(1);
?>
