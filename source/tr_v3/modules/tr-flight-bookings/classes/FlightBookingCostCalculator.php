<?php

/**

// Currently supports:
Departure Date: yyyy-mm-dd
Return Date: yyyy-mm-dd
Insurance: boolean,
Luggage: boolean,
Travel Class: economy, business, first

// Example usage:
$departureDate = '2024-10-03';
$returnDate = '2024-10-08';
$travelClass = 'business';
$insurance = true;
$luggage = true;

$duration = FlightBookingCostCalculator::calculateFlightDuration($departureDate, $returnDate);
$totalCost = FlightBookingCostCalculator::calculateTotalCost($travelClass, $duration, $insurance, $luggage);

echo "Flight Duration: " . $duration . " days\n";
echo "Total Cost: $" . $totalCost . "\n";

*/

class FlightBookingCostCalculator
{
    // Static function to calculate the flight duration in days
    public static function calculateFlightDuration($departureDate, $returnDate)
    {
        $start = new DateTime($departureDate);
        $end = new DateTime($returnDate);
        $interval = $start->diff($end);

        // Add one day to ensure full days are counted, as with car rentals
        return $interval->days + 1;
    }

    // Static function to calculate the total flight cost
    public static function calculateTotalCost($travelClass, $duration, $insurance = false, $luggage = false)
    {
        // Set base price depending on travel class
        switch (strtolower($travelClass)) {
            case 'economy':
                $basePrice = 100;
                break;
            case 'business':
                $basePrice = 300;
                break;
            case 'first':
                $basePrice = 500;
                break;
            default:
                throw new Exception("Invalid travel class provided.");
        }

        // Calculate total base price for the flight (e.g., round-trip)
        $totalPrice = $basePrice * $duration;

        // Add costs for insurance and luggage if selected
        if ($insurance) {
            $totalPrice += 50 * $duration; // Assume $50 per day for insurance
        }

        if ($luggage) {
            $totalPrice += 20 * $duration; // Assume $20 per day for luggage
        }

        return $totalPrice;
    }
}

?>
