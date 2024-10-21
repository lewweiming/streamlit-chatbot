<?php

/**
 * Currently supports:
 * Check-in Date: yyyy-mm-dd
 * Check-out Date: yyyy-mm-dd
 * Number of Guests: integer
 * Room Type: single, double, suite
 * Breakfast: boolean
 * Wifi: boolean
 *
 * Example usage:
 * $checkinDate = '2024-10-03';
 * $checkoutDate = '2024-10-08';
 * $roomType = 'suite';
 * $numberOfGuests = 2;
 * $breakfast = true;
 * $wifi = true;
 *
 * $duration = HotelBookingCostCalculator::calculateStayDuration($checkinDate, $checkoutDate);
 * $totalCost = HotelBookingCostCalculator::calculateTotalCost($roomType, $duration, $numberOfGuests, $breakfast, $wifi);
 *
 * echo "Stay Duration: " . $duration . " nights\n";
 * echo "Total Cost: $" . $totalCost . "\n";
 */

class HotelBookingCostCalculator
{
    // Static function to calculate stay duration in nights
    public static function calculateStayDuration($checkinDate, $checkoutDate)
    {
        $start = new DateTime($checkinDate);
        $end = new DateTime($checkoutDate);
        $interval = $start->diff($end);

        // Return the number of nights
        return $interval->days;
    }

    // Static function to calculate the total booking cost
    public static function calculateTotalCost($roomType, $duration, $numberOfGuests, $breakfast = false, $wifi = false)
    {
        // Set base price depending on room type
        switch (strtolower($roomType)) {
            case 'standard':
                $basePrice = 80;
                break;
            case 'deluxe':
                $basePrice = 80;
                break;
            case 'single':
                $basePrice = 80;
                break;
            case 'double':
                $basePrice = 100;
                break;
            case 'suite':
                $basePrice = 150;
                break;
            default:
                throw new Exception("Invalid room type provided.");
        }

        // Calculate total base price
        $totalPrice = $basePrice * $duration;

        // Add costs for additional guests
        if ($numberOfGuests > 2) {
            $totalPrice += 20 * ($numberOfGuests - 2) * $duration; // Extra charge for additional guests
        }

        // Add costs for breakfast and wifi if selected
        if ($breakfast) {
            $totalPrice += 10 * $duration; // Daily breakfast charge
        }

        if ($wifi) {
            $totalPrice += 5 * $duration; // Daily wifi charge
        }

        return $totalPrice;
    }
}

?>