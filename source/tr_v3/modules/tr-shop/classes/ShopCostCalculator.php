<?php

/**

// Currently supports:
Items: array of item names with quantity and price per item
Shipping Method: standard, express, overnight
Tax: float (percentage, e.g., 0.08 for 8%)
Discount: boolean, discount rate will be applied if true

// Example usage:
$items = [
    ['name' => 'Laptop', 'quantity' => 1, 'price' => 1200],
    ['name' => 'Headphones', 'quantity' => 2, 'price' => 150]
];
$shippingMethod = 'express';
$taxRate = 0.08;  // 8% tax
$discount = true;

$totalCost = ShopCostCalculator::calculateTotalCost($items, $shippingMethod, $taxRate, $discount);

echo "Total Cost: $" . $totalCost . "\n";

*/

class ShopCostCalculator
{
    // Static function to calculate the total cost
    public static function calculateTotalCost($items, $shippingMethod = 'standard', $taxRate = 0.0, $discount = false)
    {
        $subtotal = self::calculateSubtotal($items);
        
        // Apply discount if applicable (e.g., 10% off)
        if ($discount) {
            $subtotal *= 0.9;
        }

        // Add shipping costs
        $shippingCost = self::calculateShippingCost($shippingMethod);

        // Calculate tax
        $taxAmount = $subtotal * $taxRate;

        // Calculate final total cost
        return $subtotal + $shippingCost + $taxAmount;
    }

    // Static function to calculate the subtotal of items
    public static function calculateSubtotal($items)
    {
        $subtotal = 0;
        foreach ($items as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }

    // Static function to calculate shipping cost based on method
    private static function calculateShippingCost($shippingMethod)
    {
        switch (strtolower($shippingMethod)) {
            case 'standard':
                return 5;
            case 'express':
                return 15;
            case 'overnight':
                return 25;
            default:
                throw new Exception("Invalid shipping method provided.");
        }
    }
}

?>
