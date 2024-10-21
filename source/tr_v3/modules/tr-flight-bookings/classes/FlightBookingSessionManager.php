<?php

// Example Usage
// $flightBookingSession = new FlightBookingSessionManager();
// $flightBookingSession->addBooking(1, ['flightNumber' => 'AB123', 'price' => 300, 'departure' => '2024-12-20', 'duration' => '5 hours']);
// $flightBookingSession->updateBooking(1, ['price' => 350, 'departure' => '2024-12-21']);
// print_r($flightBookingSession->getBooking(1));
// $flightBookingSession->removeBooking(1);

class FlightBookingSessionManager
{
    private $sessionKey = 'flight_booking';

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

    // Add a flight booking to the session
    public function addBooking($flightId, $flightDetails)
    {
        $_SESSION[$this->sessionKey][$flightId] = $flightDetails;
    }

    // Update a flight booking in the session
    public function updateBooking($flightId, $updatedDetails)
    {
        if (isset($_SESSION[$this->sessionKey][$flightId])) {
            $_SESSION[$this->sessionKey][$flightId] = array_merge($_SESSION[$this->sessionKey][$flightId], $updatedDetails);
        } else {
            throw new Exception("Flight booking with ID {$flightId} does not exist.");
        }
    }

    // Retrieve a flight booking by flight ID
    public function getBooking($flightId)
    {
        return $_SESSION[$this->sessionKey][$flightId] ?? null;
    }

    // Retrieve all flight bookings in the session
    public function getAllBookings()
    {
        return $_SESSION[$this->sessionKey];
    }

    // Remove a flight booking from the session
    public function removeBooking($flightId)
    {
        if (isset($_SESSION[$this->sessionKey][$flightId])) {
            unset($_SESSION[$this->sessionKey][$flightId]);
        }
    }

    // Clear all flight bookings from the session
    public function clearBookings()
    {
        $_SESSION[$this->sessionKey] = [];
    }

    // Check if a specific flight booking exists
    public function bookingExists($flightId)
    {
        return isset($_SESSION[$this->sessionKey][$flightId]);
    }

    // Destroy the session
    public function destroySession()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }
}

?>
