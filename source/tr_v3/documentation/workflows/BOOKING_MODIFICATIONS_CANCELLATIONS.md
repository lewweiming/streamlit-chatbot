# Booking Modifications / Cancellations Based on Customer Request Module

- The user cannot modify/cancel the booking directly only through a request form.
- Only be sending a customer request form.
- Also show booking page after payment (handle booking confirmations)
- Custom table (customer_requests)

## Customer requests
- Only registered customers can make a customer request.
- Returns a joint table with users table
- For the modifications and cancellations table, use 
- 3 categories, “modifications, cancellations, others”
- Admin can change the status of customer requests by marking it as “pending” or “approved” or “rejected” or “in progress”
- Admin can write notes on each request
- By marking a modification as “approved”, the manager still needs to manually modify the booking table.
- You’ll need a specialised modification / cancellation form for each of the booking services
    - These forms will be in the I.e user-account/dashboards/car-rental folder
