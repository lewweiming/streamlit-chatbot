<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleFlightBookingsController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function showReceipt()
    {
        return $this->twig->render('tr-flight-bookings/views/receipt.html');
    }

    function showBookingConfirmmation()
    {
        return $this->twig->render('tr-flight-bookings/views/booking_confirmation.html');
    }

    function showFlightSearch()
    {
        return $this->twig->render('tr-flight-bookings/views/flight_search.html');
    }

    function showManageBookings()
    {
        return $this->twig->render('tr-flight-bookings/views/manage_bookings.html');
    }

    function showCheckout()
    {
        return $this->twig->render('tr-flight-bookings/views/checkout.html');
    }

    function submitCheckout(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        // Pre-process and generate data such as dates
        // $start_date = str_replace('/', '-', $payload['checkin-date']);
        // $start_date = date("Y-m-d", strtotime($start_date));

        // $end_date = str_replace('/', '-', $payload['checkout-date']);
        // $end_date = date("Y-m-d", strtotime($end_date));

        // Finalise the booking data to be inserted into table
        $booking = [
            'booking_ref' => FlightBooking::getNewBookingReference(), // A short 7 character alpha numeric code in CAPS
            'customer_id' => null,
            'flight_id' => null,
            'seat_class' => $payload['seat_class'],
            'status' => 'Pending', // Default
            'total_amount' => 100.00 // Test
        ];

        FlightBooking::insert($booking);

        Flash::add('success', 'New booking added!');
        
        return new RedirectResponse('/');
    }

    function submitBookingModification()
    {

    }

    function submitBookingCancellation()
    {

    }

    function admin()
    {
        $rows = X2FrameworkItem::fetchContext();

        return $this->twig->render('framework/admin.html', ['rows' => $rows]);
    }

    function adminBookingsDashboard()
    {
        $rows = FlightBooking::all();

        return $this->twig->render('tr-flight-bookings/views/admin/bookings_dashboard.html', ['rows' => $rows]);   
    }

    function adminBookingDetails()
    {
        return $this->twig->render('tr-flight-bookings/views/admin/booking_details.html');   
    }

    function adminAddBooking()
    {
        return $this->twig->render('tr-flight-bookings/views/admin/add_booking.html');
    }

    function adminSubmitBooking(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        FlightBooking::insert($payload);

        Flash::add('success', 'New booking added!');
        
        return new RedirectResponse('/framework/admin/flight-bookings/bookings-dashboard');
    }

    function adminModifyBooking()
    {

    }

    function adminSubmitBookingModification()
    {

    }

    function adminCancelBooking()
    {

    }

    function adminSubmitBookingCancellation()
    {
        
    }

    function adminReports()
    {
        return $this->twig->render('tr-flight-bookings/views/admin/reports.html');   
    }

    function adminFlightsDashboard()
    {
        return $this->twig->render('tr-flight-bookings/views/admin/flights_dashboard.html');   
    }

    function editItem($id)
    {
        $item = X2FrameworkItem::find($id);

        return $this->twig->render('framework/edit_item.html', ['item' => $item]);
    }

    /* CRUD START */
    function insertItem(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        X2FrameworkItem::insert($payload);

        Flash::add('success', 'New item added!');

        return new RedirectResponse('/framework/admin/main');
    }

    function updateItem($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        X2FrameworkItem::update($id, $payload);
        
        foreach($payload as $key => $value) {

            Flash::add('success', "{$key} set to ${value}");
        }

        return new RedirectResponse('/framework/admin/main');
    }

    function deleteItem($id)
    {
        X2FrameworkItem::delete($id);

        Flash::add('success', 'Item removed!');

        return new RedirectResponse('/framework/admin/main');
    }
    /* CRUD END */
}
?>