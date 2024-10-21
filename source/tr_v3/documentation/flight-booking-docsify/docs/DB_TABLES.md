# DB Tables


For a flight booking application, the database needs to be structured efficiently to manage various aspects of flight data, users, bookings, payments, and more. Below are the key database tables that would be required:

### 1.  **Users Table**

-   **Fields:**
    -   `user_id`  (Primary Key)
    -   `first_name`
    -   `last_name`
    -   `email`
    -   `password_hash`
    -   `phone_number`
    -   `address`
    -   `passport_number`
    -   `date_of_birth`
    -   `nationality`
    -   `loyalty_program_id`  (Foreign Key linking to loyalty programs)
    -   `created_at`
    -   `updated_at`
    -   `is_admin`  (Boolean to identify if the user is an admin)

### 2.  **Flights Table**

-   **Fields:**
    -   `flight_id`  (Primary Key)
    -   `airline_id`  (Foreign Key linking to airlines)
    -   `flight_number`
    -   `departure_airport_id`  (Foreign Key linking to airports)
    -   `arrival_airport_id`  (Foreign Key linking to airports)
    -   `departure_time`
    -   `arrival_time`
    -   `flight_duration`
    -   `price`
    -   `seats_available`
    -   `layover_info`  (If applicable)
    -   `created_at`
    -   `updated_at`

### 3.  **Airports Table**

-   **Fields:**
    -   `airport_id`  (Primary Key)
    -   `airport_code`  (IATA code)
    -   `airport_name`
    -   `city`
    -   `country`
    -   `latitude`
    -   `longitude`

### 4.  **Airlines Table**

-   **Fields:**
    -   `airline_id`  (Primary Key)
    -   `airline_name`
    -   `airline_code`  (IATA/ICAO code)
    -   `country`
    -   `phone_number`
    -   `email`
    -   `website`

### 5.  **Bookings Table**

-   **Fields:**
    -   `booking_id`  (Primary Key)
    -   `user_id`  (Foreign Key linking to users)
    -   `flight_id`  (Foreign Key linking to flights)
    -   `booking_reference`  (Unique reference code)
    -   `total_price`
    -   `payment_status`  (Pending, Completed, Failed, Refunded)
    -   `booking_status`  (Confirmed, Cancelled, Rescheduled)
    -   `created_at`
    -   `updated_at`

### 6.  **Passengers Table**

-   **Fields:**
    -   `passenger_id`  (Primary Key)
    -   `booking_id`  (Foreign Key linking to bookings)
    -   `first_name`
    -   `last_name`
    -   `date_of_birth`
    -   `passport_number`
    -   `nationality`
    -   `seat_number`
    -   `baggage_info`
    -   `special_request`  (Optional: meal preferences, wheelchair, etc.)

### 7.  **Payments Table**

-   **Fields:**
    -   `payment_id`  (Primary Key)
    -   `booking_id`  (Foreign Key linking to bookings)
    -   `payment_method`  (Credit card, PayPal, etc.)
    -   `amount`
    -   `currency`
    -   `payment_status`  (Pending, Completed, Failed)
    -   `transaction_id`  (External payment provider's reference)
    -   `created_at`

### 8.  **Seats Table**

-   **Fields:**
    -   `seat_id`  (Primary Key)
    -   `flight_id`  (Foreign Key linking to flights)
    -   `seat_number`
    -   `seat_type`  (Economy, Business, First Class)
    -   `is_available`  (Boolean)

### 9.  **Loyalty Programs Table**  (Optional)

-   **Fields:**
    -   `loyalty_program_id`  (Primary Key)
    -   `user_id`  (Foreign Key linking to users)
    -   `airline_id`  (Foreign Key linking to airlines)
    -   `points_balance`
    -   `tier_level`
    -   `created_at`
    -   `updated_at`

### 10.  **Flight Status Table**  (Optional)

-   **Fields:**
    -   `flight_status_id`  (Primary Key)
    -   `flight_id`  (Foreign Key linking to flights)
    -   `status`  (Scheduled, On Time, Delayed, Cancelled)
    -   `status_update_time`
    -   `gate_number`
    -   `terminal`

### 11.  **Notifications Table**

-   **Fields:**
    -   `notification_id`  (Primary Key)
    -   `user_id`  (Foreign Key linking to users)
    -   `booking_id`  (Foreign Key linking to bookings)
    -   `message`
    -   `notification_type`  (Email, SMS, Push Notification)
    -   `sent_at`
    -   `status`  (Sent, Pending)

### 12.  **Reviews Table**

-   **Fields:**
    -   `review_id`  (Primary Key)
    -   `user_id`  (Foreign Key linking to users)
    -   `flight_id`  (Foreign Key linking to flights)
    -   `rating`  (1-5 stars)
    -   `review_text`
    -   `created_at`
    -   `updated_at`

### 13.  **Invoices Table**

-   **Fields:**
    -   `invoice_id`  (Primary Key)
    -   `booking_id`  (Foreign Key linking to bookings)
    -   `invoice_number`
    -   `total_amount`
    -   `currency`
    -   `issued_at`

### 14.  **Coupons/Discounts Table**  (Optional)

-   **Fields:**
    -   `coupon_id`  (Primary Key)
    -   `code`
    -   `discount_percentage`
    -   `valid_from`
    -   `valid_to`
    -   `max_usage`
    -   `usage_count`

### 15.  **Admin Logs Table**  (Optional for Admin Actions)

-   **Fields:**
    -   `log_id`  (Primary Key)
    -   `admin_id`  (Foreign Key linking to users)
    -   `action_taken`  (Description of action)
    -   `timestamp`

These tables form the core of a well-structured flight booking application, ensuring smooth handling of flights, bookings, users, payments, and related entities.