<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleTripBookingsController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function welcome()
    {
        return $this->twig->render('tr-trip-bookings/views/welcome.html');
    }

    function showReceipt()
    {
        return $this->twig->render('tr-trip-bookings/views/receipt.html');
    }

    function showAvailableTrips()
    {
        return $this->twig->render('tr-trip-bookings/views/available_trips.html');
    }

    function showBookingDetails()
    {
        return $this->twig->render('tr-trip-bookings/views/booking_details.html');
    }

    function showCheckout()
    {
        return $this->twig->render('tr-trip-bookings/views/checkout.html');
    }

    function submitCheckout(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        // Pre-process and generate data such as dates
        $start_date = str_replace('/', '-', $payload['start-date']);
        $start_date = date("Y-m-d", strtotime($start_date));

        $end_date = str_replace('/', '-', $payload['end-date']);
        $end_date = date("Y-m-d", strtotime($end_date));

        // Finalise the booking data to be inserted into table
        $booking = [
            'booking_ref' => TripBooking::getNewBookingReference(), // A short 7 character alpha numeric code in CAPS
            'customer_id' => null,
            'trip_id' => null,
            'activity' => $payload['activity'],
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => 'Booked', // Default
            'total_amount' => 100.00 // Test
        ];

        TripBooking::insert($booking);

        Flash::add('success', 'New booking added!');
        
        return new RedirectResponse('/');
    }

    function showTripBooking()
    {
        return $this->twig->render('tr-trip-bookings/views/trip_booking.html');
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
        $rows = TripBooking::all();

        return $this->twig->render('tr-trip-bookings/views/admin/bookings_dashboard.html', ['rows' => $rows]);   
    }

    function adminBookingDetails()
    {
        return $this->twig->render('tr-trip-bookings/views/admin/booking_details.html');   
    }

    function adminAddBooking()
    {
        return $this->twig->render('tr-trip-bookings/views/admin/add_booking.html');
    }

    function adminSubmitBooking(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        TripBooking::insert($payload);

        Flash::add('success', 'New booking added!');
        
        return new RedirectResponse('/framework/admin/trip-bookings/bookings-dashboard');
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
        return $this->twig->render('tr-trip-bookings/views/admin/reports.html');   
    }

    function adminTripsDashboard()
    {
        return $this->twig->render('tr-trip-bookings/views/admin/trips_dashboard.html');   
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