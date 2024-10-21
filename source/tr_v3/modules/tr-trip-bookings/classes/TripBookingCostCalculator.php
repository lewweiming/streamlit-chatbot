<?php

/**
 * Currently supports:
 * Start Date: yyyy-mm-dd
 * End Date: yyyy-mm-dd
 * Number of Travelers: integer
 * Transportation Type: bus, train, flight
 * Accommodation Type: hotel, hostel, rental
 * Activities: array of strings (e.g., ['city tour', 'museum entry'])
 *
 * Example usage:
 * $startDate = '2024-10-03';
 * $endDate = '2024-10-08';
 * $numberOfTravelers = 2;
 * $transportationType = 'flight';
 * $accommodationType = 'hotel';
 * $activities = ['city tour', 'museum entry'];
 *
 * $duration = TripBookingCostCalculator::calculateTripDuration($startDate, $endDate);
 * $totalCost = TripBookingCostCalculator::calculateTotalCost($transportationType, $accommodationType, $duration, $numberOfTravelers, $activities);
 *
 * echo "Trip Duration: " . $duration . " days\n";
 * echo "Total Cost: $" . $totalCost . "\n";
 */

class TripBookingCostCalculator
{
    // Static function to calculate trip duration in days
    public static function calculateTripDuration($startDate, $endDate)
    {
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        $interval = $start->diff($end);

        // Return the number of days
        return $interval->days + 1; // Include the end date
    }

    // Static function to calculate the total trip cost
    public static function calculateTotalCost($transportationType, $accommodationType, $duration, $numberOfTravelers, $activities)
    {
        // Set base price depending on transportation type
        switch (strtolower($transportationType)) {
            case 'bus':
                $transportationCost = 50 * $numberOfTravelers;
                break;
            case 'train':
                $transportationCost = 100 * $numberOfTravelers;
                break;
            case 'flight':
                $transportationCost = 300 * $numberOfTravelers;
                break;
            default:
                throw new Exception("Invalid transportation type provided.");
        }

        // Set base price depending on accommodation type
        switch (strtolower($accommodationType)) {
            case 'hotel':
                $accommodationCost = 100 * $duration;
                break;
            case 'hostel':
                $accommodationCost = 50 * $duration;
                break;
            case 'rental':
                $accommodationCost = 150 * $duration;
                break;
            default:
                throw new Exception("Invalid accommodation type provided.");
        }

        // Calculate total activities cost (example: $20 per activity per traveler)
        $activitiesCost = count($activities) * 20 * $numberOfTravelers;

        // Calculate total cost
        $totalCost = $transportationCost + $accommodationCost + $activitiesCost;

        return $totalCost;
    }
}

?>