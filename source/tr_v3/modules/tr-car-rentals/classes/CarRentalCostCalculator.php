<?php

/**

// Currently supports:
Pickup Date: yyyy-mm-dd
Return Date: yyyy-mm-dd
Insurace: boolean,
GPS: boolean,
Car Type: economy, compact, midsize, fullsize, suv

// Example usage:
$pickupDate = '2024-10-03';
$returnDate = '2024-10-08';
$carType = 'suv';
$insurance = true;
$gps = true;

$duration = CarRentalCostCalculator::calculateRentalDuration($pickupDate, $returnDate);
$totalCost = CarRentalCostCalculator::calculateTotalCost($carType, $duration, $insurance, $gps);

echo "Rental Duration: " . $duration . " days\n";
echo "Total Cost: $" . $totalCost . "\n";

*/

class CarRentalCostCalculator
{
    // Static function to calculate rental duration in days
    public static function calculateRentalDuration($pickupDate, $returnDate)
    {
        $start = new DateTime($pickupDate);
        $end = new DateTime($returnDate);
        $interval = $start->diff($end);

        // Add one day to ensure full days are counted, ceil in JS example
        return $interval->days + 1;
    }

    // Static function to calculate the total rental cost
    public static function calculateTotalCost($carType, $duration, $insurance = false, $gps = false)
    {
        // Set base price depending on car type
        switch (strtolower($carType)) {
            case 'economy':
                $basePrice = 30;
                break;
            case 'compact':
                $basePrice = 35;
                break;
            case 'midsize':
                $basePrice = 40;
                break;
            case 'fullsize':
                $basePrice = 45;
                break;
            case 'suv':
                $basePrice = 50;
                break;
            default:
                throw new Exception("Invalid car type provided.");
        }

        // Calculate total base price
        $totalPrice = $basePrice * $duration;

        // Add costs for insurance and GPS if selected
        if ($insurance) {
            $totalPrice += 15 * $duration;
        }

        if ($gps) {
            $totalPrice += 5 * $duration;
        }

        return $totalPrice;
    }
}

?>
