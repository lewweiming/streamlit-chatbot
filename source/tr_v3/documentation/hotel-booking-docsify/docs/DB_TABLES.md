# DB Tables


For a hotel booking application, the database schema needs to capture all the necessary data related to hotels, users, bookings, payments, etc. Below are the key database tables required:

### 1.  **Users Table**

-   **user_id (PK)**: Unique identifier for each user.
-   **first_name**: User's first name.
-   **last_name**: User's last name.
-   **email**: User's email address.
-   **password_hash**: Encrypted user password.
-   **phone_number**: Contact number.
-   **profile_image**: (Optional) URL to the user's profile picture.
-   **loyalty_points**: (Optional) Points for loyalty programs.
-   **created_at**: Date and time when the account was created.
-   **updated_at**: Last update time for user details.

### 2.  **Hotels Table**

-   **hotel_id (PK)**: Unique identifier for each hotel.
-   **name**: Hotel name.
-   **description**: Hotel description.
-   **location**: Address or geolocation (city, country).
-   **latitude**: Geographical latitude.
-   **longitude**: Geographical longitude.
-   **contact_info**: Hotel contact information.
-   **rating**: Average user rating (1-5 stars).
-   **amenities**: List of amenities offered (Wi-Fi, pool, etc.).
-   **created_at**: Hotel listing creation timestamp.
-   **updated_at**: Last update timestamp.

### 3.  **Rooms Table**

-   **room_id (PK)**: Unique identifier for each room.
-   **hotel_id (FK)**: References the hotel in which the room is available.
-   **room_type**: Type of room (Single, Double, Suite, etc.).
-   **price_per_night**: Cost of the room per night.
-   **capacity**: Number of guests the room can accommodate.
-   **availability**: Availability status (Boolean or available/unavailable).
-   **created_at**: Date when the room was added to the system.
-   **updated_at**: Date when the room information was last modified.

### 4.  **Bookings Table**

-   **booking_id (PK)**: Unique identifier for each booking.
-   **user_id (FK)**: References the user who made the booking.
-   **hotel_id (FK)**: References the booked hotel.
-   **room_id (FK)**: References the room booked.
-   **check_in_date**: Check-in date.
-   **check_out_date**: Check-out date.
-   **booking_status**: Status of booking (Confirmed, Pending, Canceled).
-   **total_price**: Total cost of the booking.
-   **payment_status**: Payment status (Paid, Unpaid, Refund).
-   **created_at**: Date and time when the booking was created.
-   **updated_at**: Date and time when the booking was updated.

### 5.  **Payments Table**

-   **payment_id (PK)**: Unique identifier for each payment.
-   **booking_id (FK)**: References the booking for which the payment was made.
-   **payment_method**: Method of payment (Credit Card, PayPal, etc.).
-   **amount**: Total amount paid.
-   **payment_status**: Payment completion status (Success, Failed, Pending).
-   **transaction_id**: Unique transaction ID from payment gateway.
-   **payment_date**: Date and time of payment.

### 6.  **Hotel Reviews Table**

-   **review_id (PK)**: Unique identifier for each review.
-   **hotel_id (FK)**: References the hotel being reviewed.
-   **user_id (FK)**: References the user who wrote the review.
-   **rating**: Rating given by the user (1 to 5 stars).
-   **review_text**: Text of the user's review.
-   **created_at**: Timestamp when the review was created.

### 7.  **Hotel Amenities Table**

-   **amenity_id (PK)**: Unique identifier for each amenity.
-   **hotel_id (FK)**: References the hotel offering the amenity.
-   **amenity_name**: Name of the amenity (e.g., Free Wi-Fi, Parking, Pool).
-   **created_at**: Timestamp when the amenity was added.

### 8.  **Hotel Images Table**

-   **image_id (PK)**: Unique identifier for each image.
-   **hotel_id (FK)**: References the hotel to which the image belongs.
-   **image_url**: URL path to the hotel image.
-   **is_primary**: Boolean to indicate if it's the primary image.
-   **created_at**: Timestamp when the image was added.

### 9.  **Discounts/Promotions Table**

-   **discount_id (PK)**: Unique identifier for each discount or promotion.
-   **hotel_id (FK)**: References the hotel offering the discount.
-   **promo_code**: Promotional code for the discount.
-   **discount_percentage**: Percentage discount applied.
-   **start_date**: Date when the discount becomes active.
-   **end_date**: Date when the discount expires.

### 10.  **Transaction Logs Table**

-   **transaction_id (PK)**: Unique identifier for each transaction.
-   **user_id (FK)**: References the user involved in the transaction.
-   **operation**: Type of transaction (e.g., booking, cancellation, refund).
-   **amount**: Amount involved in the transaction.
-   **transaction_date**: Date of the transaction.
-   **description**: Description or notes about the transaction.

### 11.  **Notifications Table**

-   **notification_id (PK)**: Unique identifier for each notification.
-   **user_id (FK)**: References the user receiving the notification.
-   **notification_type**: Type of notification (e.g., Booking Confirmation, Reminder).
-   **message**: Text content of the notification.
-   **sent_at**: Timestamp of when the notification was sent.

### 12.  **Support Tickets Table**

-   **ticket_id (PK)**: Unique identifier for each support ticket.
-   **user_id (FK)**: References the user who created the support ticket.
-   **issue_description**: Details about the issue.
-   **status**: Status of the ticket (Open, In Progress, Closed).
-   **created_at**: Timestamp when the ticket was created.
-   **updated_at**: Timestamp when the ticket was last updated.

### 13.  **Sessions Table**  (Optional for User Authentication)

-   **session_id (PK)**: Unique identifier for each session.
-   **user_id (FK)**: References the user whose session it is.
-   **login_time**: Timestamp when the user logged in.
-   **logout_time**: Timestamp when the user logged out.
-   **session_token**: Token for session management (for security).

These tables form the core schema for a hotel booking application. Each table is linked through foreign key relationships, ensuring data consistency and supporting key features like bookings, payments, and reviews.