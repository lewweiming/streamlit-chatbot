<?php

// Example Usage
// $shopSession = new ShopSessionManager();
// $shopSession->addItem(1, ['name' => 'T-Shirt', 'price' => 20, 'quantity' => 1, 'variations' => ['size' => 'M', 'color' => 'blue']]);
// $shopSession->updateItem(1, ['quantity' => 2]);
// print_r($shopSession->getItem(1));
// $shopSession->removeItem(1);

class ShopSessionManager
{
    private $sessionKey = 'shop_cart_items';
    private $orderDetailsKey = 'shop_order_details';

    // Start the session if not already started
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION[$this->sessionKey])) {
            $_SESSION[$this->sessionKey] = [];
        }

        if (!isset($_SESSION[$this->orderDetailsKey])) {
            $_SESSION[$this->orderDetailsKey] = [];
        }
    }

    // Add an item to the cart with support for variations
    public function addItem($itemId, $itemDetails)
    {
        // Generate a unique key based on itemId and variations if they exist
        $uniqueKey = $this->generateUniqueKey($itemId, $itemDetails['variations'] ?? []);

        // Add the item with its variations to the session
        $_SESSION[$this->sessionKey][$uniqueKey] = $itemDetails;
    }

    // Update an item in the cart, including variations
    public function updateItem($itemId, $updatedDetails, $variations = [])
    {
        // Generate the unique key based on itemId and variations
        $uniqueKey = $this->generateUniqueKey($itemId, $variations);

        if (isset($_SESSION[$this->sessionKey][$uniqueKey])) {
            $_SESSION[$this->sessionKey][$uniqueKey] = array_merge($_SESSION[$this->sessionKey][$uniqueKey], $updatedDetails);
        } else {
            throw new Exception("Item with ID {$itemId} and specified variations does not exist in the cart.");
        }
    }

    // Retrieve an item from the cart using itemId and variations
    public function getItem($itemId, $variations = [])
    {
        // Generate the unique key based on itemId and variations
        $uniqueKey = $this->generateUniqueKey($itemId, $variations);
        return $_SESSION[$this->sessionKey][$uniqueKey] ?? null;
    }

    // Retrieve all items in the cart
    public function getAllItems()
    {
        return $_SESSION[$this->sessionKey];
    }

    // Remove an item from the cart using itemId and variations
    public function removeItem($itemId, $variations = [])
    {
        // Generate the unique key based on itemId and variations
        $uniqueKey = $this->generateUniqueKey($itemId, $variations);

        if (isset($_SESSION[$this->sessionKey][$uniqueKey])) {
            unset($_SESSION[$this->sessionKey][$uniqueKey]);
        }
    }

    // Clear all items from the cart
    public function clearCart()
    {
        $_SESSION[$this->sessionKey] = [];
    }

    // Check if an item exists in the cart with specific variations
    public function itemExists($itemId, $variations = [])
    {
        // Generate the unique key based on itemId and variations
        $uniqueKey = $this->generateUniqueKey($itemId, $variations);
        return isset($_SESSION[$this->sessionKey][$uniqueKey]);
    }

    // Generate a unique key based on itemId and variations
    private function generateUniqueKey($itemId, $variations)
    {
        if (!empty($variations)) {
            // Sort variations to ensure consistent key generation
            ksort($variations);
            $variationString = http_build_query($variations);
            return $itemId . '_' . md5($variationString);
        }
        return $itemId;
    }

    // Destroy the session (useful when a user logs out or completes a checkout)
    public function destroySession()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }

    // New Method: Update Order Details like name, email, phone, address, city...
    public function updateOrderDetails($payload)
    {
        $data = $this->getOrderDetails();

        if(!empty($data)) {

            $payload = array_merge($data, $payload);
        }
        
        $_SESSION[$this->orderDetailsKey] = $payload;
    }

    // Retrieve the stored order details
    public function getOrderDetails()
    {
        return $_SESSION[$this->orderDetailsKey] ?? null;
    }

    // Clear order details such as name, email, phone and delivery address
    public function clearOrderDetails()
    {
        $_SESSION[$this->orderDetailsKey] = [];
    }
}

?>
