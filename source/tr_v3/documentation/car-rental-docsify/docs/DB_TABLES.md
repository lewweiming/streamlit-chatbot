# DB Tables


To support the functionality of a car rental application for a travel platform, you will need several key database tables. Below are the vital tables and their structure:

### 1. **Users Table**

Stores information about users, including both customers and rental agencies.

-   `user_id` (Primary Key)
-   `name`
-   `email`
-   `phone_number`
-   `password_hash`
-   `user_type` (customer, admin, rental agency)
-   `address`
-   `driver_license_number`
-   `driver_license_expiration_date`
-   `created_at`
-   `updated_at`

### 2. **Cars Table**

Contains information about the cars available for rent.

-   `car_id` (Primary Key)
-   `agency_id` (Foreign Key to rental agency or owner)
-   `make` (e.g., Toyota, Ford)
-   `model`
-   `year`
-   `car_type` (e.g., SUV, sedan, convertible)
-   `license_plate`
-   `vin` (Vehicle Identification Number)
-   `color`
-   `fuel_type` (e.g., gasoline, electric)
-   `transmission_type` (manual/automatic)
-   `seating_capacity`
-   `mileage`
-   `rental_price_per_day`
-   `status` (available, rented, maintenance)
-   `location` (pickup/drop-off location)
-   `created_at`
-   `updated_at`

### 3. **Rental Agencies Table**

Stores information about the car rental agencies.

-   `agency_id` (Primary Key)
-   `agency_name`
-   `contact_person`
-   `email`
-   `phone_number`
-   `address`
-   `created_at`
-   `updated_at`

### 4. **Reservations Table**

Tracks car rental reservations.

-   `reservation_id` (Primary Key)
-   `user_id` (Foreign Key to Users table)
-   `car_id` (Foreign Key to Cars table)
-   `pickup_location`
-   `dropoff_location`
-   `pickup_date`
-   `dropoff_date`
-   `total_cost`
-   `payment_status` (paid, pending, refunded)
-   `reservation_status` (confirmed, cancelled, completed)
-   `created_at`
-   `updated_at`

### 5. **Payments Table**

Tracks payments made by users for car rentals.

-   `payment_id` (Primary Key)
-   `reservation_id` (Foreign Key to Reservations table)
-   `user_id` (Foreign Key to Users table)
-   `payment_method` (credit card, PayPal, etc.)
-   `amount_paid`
-   `payment_date`
-   `payment_status` (successful, failed, refunded)
-   `transaction_id`
-   `created_at`
-   `updated_at`

### 6. **Reviews Table**

Stores reviews and ratings provided by users for cars and rental services.

-   `review_id` (Primary Key)
-   `user_id` (Foreign Key to Users table)
-   `car_id` (Foreign Key to Cars table)
-   `rating` (1 to 5)
-   `review_text`
-   `created_at`
-   `updated_at`

### 7. **Insurance Table**

Tracks insurance packages available and chosen by users.

-   `insurance_id` (Primary Key)
-   `insurance_type` (comprehensive, liability, etc.)
-   `coverage_amount`
-   `daily_cost`
-   `agency_id` (Foreign Key to Rental Agencies table)
-   `created_at`
-   `updated_at`

### 8. **Reservations_Insurance Table**

Links a reservation with an insurance package.

-   `reservation_id` (Foreign Key to Reservations table)
-   `insurance_id` (Foreign Key to Insurance table)

### 9. **Coupons Table**

Stores discount codes and special promotions.

-   `coupon_id` (Primary Key)
-   `code`
-   `discount_percentage`
-   `expiry_date`
-   `status` (active, expired)
-   `created_at`
-   `updated_at`

### 10. **Geolocation Table**

Stores pickup and drop-off location data.

-   `location_id` (Primary Key)
-   `location_name` (e.g., Airport, City)
-   `latitude`
-   `longitude`
-   `created_at`
-   `updated_at`

### 11. **Fleet Management Table**

Stores data related to the management of the car fleet, including maintenance and servicing.

-   `maintenance_id` (Primary Key)
-   `car_id` (Foreign Key to Cars table)
-   `last_maintenance_date`
-   `next_maintenance_date`
-   `mileage_at_last_service`
-   `created_at`
-   `updated_at`

### 12. **Notifications Table**

Stores notifications sent to users.

-   `notification_id` (Primary Key)
-   `user_id` (Foreign Key to Users table)
-   `notification_type` (reservation reminder, payment confirmation, etc.)
-   `message`
-   `status` (read, unread)
-   `sent_at`

### 13. **Driver Verification Table**

Stores the driver license and verification details of users.

-   `verification_id` (Primary Key)
-   `user_id` (Foreign Key to Users table)
-   `driver_license_number`
-   `driver_license_expiration_date`
-   `verification_status` (pending, verified, rejected)
-   `created_at`
-   `updated_at`

### 14. **Transactions Table**

Tracks all financial transactions made on the platform.

-   `transaction_id` (Primary Key)
-   `user_id` (Foreign Key to Users table)
-   `reservation_id` (Foreign Key to Reservations table)
-   `transaction_type` (payment, refund)
-   `transaction_amount`
-   `transaction_date`
-   `status` (successful, failed)
-   `payment_method`

This database schema provides the foundation to manage users, cars, reservations, payments, insurance, and reviews, supporting the core operations of a car rental application.

