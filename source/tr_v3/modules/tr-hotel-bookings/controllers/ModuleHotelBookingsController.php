<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleHotelBookingsController extends CoreController
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
        return $this->twig->render('tr-hotel-bookings/views/welcome.html');
    }

    function showReceipt()
    {
        return $this->twig->render('tr-hotel-bookings/views/receipt.html');
    }

    function showAvailableRooms()
    {
        return $this->twig->render('tr-hotel-bookings/views/available_rooms.html');
    }    

    function showBookRoom()
    {
        return $this->twig->render('tr-hotel-bookings/views/book_room.html');
    }

    function showBookingDetails()
    {
        return $this->twig->render('tr-hotel-bookings/views/booking_details.html');
    }

    function showModifyBooking()
    {
        return $this->twig->render('tr-hotel-bookings/views/modify_booking.html');
    }    

    function showCheckout()
    {
        return $this->twig->render('tr-hotel-bookings/views/checkout.html');
    }

    function submitCheckout(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        // Pre-process and generate data such as dates
        $start_date = str_replace('/', '-', $payload['checkin-date']);
        $start_date = date("Y-m-d", strtotime($start_date));

        $end_date = str_replace('/', '-', $payload['checkout-date']);
        $end_date = date("Y-m-d", strtotime($end_date));

        // Finalise the booking data to be inserted into table
        $booking = [
            'booking_ref' => HotelBooking::getNewBookingReference(), // A short 7 character alpha numeric code in CAPS
            'guest_id' => null,
            'room_id' => null,
            'check_in_date' => $start_date,
            'check_out_date' => $end_date,
            'status' => 'Pending', // Default
            'total_amount' => 100.00 // Test
        ];

        HotelBooking::insert($booking);

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
        $rows = HotelBooking::all();

        return $this->twig->render('tr-hotel-bookings/views/admin/bookings_dashboard.html', ['rows' => $rows]);   
    }

    function adminBookingDetails()
    {
        return $this->twig->render('tr-hotel-bookings/views/admin/booking_details.html');   
    }

    function adminAddBooking()
    {
        return $this->twig->render('tr-hotel-bookings/views/admin/add_booking.html');
    }

    function adminSubmitBooking(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        HotelBooking::insert($payload);

        Flash::add('success', 'New booking added!');
        
        return new RedirectResponse('/framework/admin/hotel-bookings/bookings-dashboard');
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
        return $this->twig->render('tr-hotel-bookings/views/admin/reports.html');   
    }

    function adminHotelsDashboard()
    {
        return $this->twig->render('tr-hotel-bookings/views/admin/hotels_dashboard.html');   
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