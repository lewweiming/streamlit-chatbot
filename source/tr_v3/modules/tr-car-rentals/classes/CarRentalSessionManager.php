<?php

// Example Usage
// $carRentalSession = new CarRentalSessionManager();
// $carRentalSession->addBooking(1, ['model' => 'Toyota Camry', 'price' => 80, 'duration' => '3 days']);
// $carRentalSession->updateBooking(1, ['duration' => '5 days', 'price' => 130]);
// print_r($carRentalSession->getBooking(1));
// $carRentalSession->removeBooking(1);

class CarRentalSessionManager
{
    private $sessionKey = 'car_rental_booking';

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

    // Add a car rental booking to the session
    public function addBooking($carId, $carDetails)
    {
        $_SESSION[$this->sessionKey][$carId] = $carDetails;
    }

    // Update a car rental booking in the session
    public function updateBooking($carId, $updatedDetails)
    {
        if (isset($_SESSION[$this->sessionKey][$carId])) {
            $_SESSION[$this->sessionKey][$carId] = array_merge($_SESSION[$this->sessionKey][$carId], $updatedDetails);
        } else {
            throw new Exception("Car rental booking with ID {$carId} does not exist.");
        }
    }

    // Retrieve a car rental booking by car ID
    public function getBooking($carId)
    {
        return $_SESSION[$this->sessionKey][$carId] ?? null;
    }

    // Retrieve all car rental bookings in the session
    public function getAllBookings()
    {
        return $_SESSION[$this->sessionKey];
    }

    // Remove a car rental booking from the session
    public function removeBooking($carId)
    {
        if (isset($_SESSION[$this->sessionKey][$carId])) {
            unset($_SESSION[$this->sessionKey][$carId]);
        }
    }

    // Clear all car rental bookings from the session
    public function clearBookings()
    {
        $_SESSION[$this->sessionKey] = [];
    }

    // Check if a specific car rental booking exists
    public function bookingExists($carId)
    {
        return isset($_SESSION[$this->sessionKey][$carId]);
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
