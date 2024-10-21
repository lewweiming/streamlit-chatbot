<?php

/**
All methods:
- home
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleCarRentalsController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function showAvailableCars()
    {
        return $this->twig->render('tr-car-rentals/views/available_cars.html');
    }

    function showUserBookingsDashboard()
    {
        $rows = CarRentalsBooking::all();

        return $this->twig->render('tr-car-rentals/views/user/bookings_dashboard.html', ['rows' => $rows]);
    }

    function showReceipt()
    {
        return $this->twig->render('tr-car-rentals/views/receipt.html');
    }

    function showBookingModification($booking_ref)
    {
        $booking = CarRentalsBooking::findWhere('booking_ref', $booking_ref);

        return $this->twig->render('tr-car-rentals/views/user/booking_modification.html', ['booking' => $booking]);
    }

    function showBookingCancellation($booking_ref)
    {
        $booking = CarRentalsBooking::findWhere('booking_ref', $booking_ref);

        return $this->twig->render('tr-car-rentals/views/user/booking_cancellation.html', ['booking' => $booking]);
    }

    function showCheckout()
    {
        return $this->twig->render('tr-car-rentals/views/checkout.html');
    }

    function submitCheckout(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        // Pre-process and generate data such as dates
        $start_date = str_replace('/', '-', $payload['pickup-date']);
        $start_date = date("Y-m-d", strtotime($start_date));

        $end_date = str_replace('/', '-', $payload['dropoff-date']);
        $end_date = date("Y-m-d", strtotime($end_date));

        // Finalise the booking data to be inserted into table
        $booking = [
            'booking_ref' => CarRentalsBooking::getNewBookingReference(), // A short 7 character alpha numeric code in CAPS
            'user_id' => null,
            'car_id' => null,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => 'pending', // Default
            'total_amount' => 100.00 // Test
        ];

        CarRentalsBooking::insert($booking);

        Flash::add('success', 'New booking added!');

        return new RedirectResponse('/');
    }

    function submitBookingModification(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        $modification = [
            'booking_id' => 1,
            'modified_by' => 'Customer', // OR Manager 
            'previous_start_date' => '', // Autopopulated based on extracting from booking id
            'previous_end_date' => '', // Autopopulated based on extracting from booking id
            'new_start_date' => $payload['new_start_date'],
            'new_end_date' => $payload['new_end_date'],
            'modification_reason' => ''
        ];

        CarRentalsBooking::insertModification($modification);

        Flash::add('success', 'New booking modification request submitted!');

        return new RedirectResponse('/');
    }

    function submitBookingCancellation(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        $cancellation = [
            'booking_id' => 1,
            'cancelled_by' => 'Customer', // OR Manager 
            'cancellation_reason' => ''
        ];

        CarRentalsBooking::insertCancellation($cancellation);

        Flash::add('success', 'New booking cancellation request submitted!');

        return new RedirectResponse('/');
    }

    function admin()
    {
        $rows = X2FrameworkItem::fetchContext();

        return $this->twig->render('framework/admin.html', ['rows' => $rows]);
    }

    function adminReceipts()
    {
        $rows = CarRentalsReceipt::all();

        return $this->twig->render('tr-car-rentals/views/admin/receipts/index.html', ['rows' => $rows]);
    }

    function adminShowReceiptAsPdf($receipt_number)
    {
        CarRentalsReceipt::streamPDF($receipt_number);
    }

    function adminBookingsDashboard()
    {
        $rows = CarRentalsBooking::all();

        return $this->twig->render('tr-car-rentals/views/admin/bookings/bookings_dashboard.html', ['rows' => $rows]);
    }

    function adminBookingDetails($id)
    {
        $booking = CarRentalsBooking::find($id);

        return $this->twig->render('tr-car-rentals/views/admin/bookings/booking_details.html', ['booking' => $booking]);
    }

    function adminAddBooking()
    {
        return $this->twig->render('tr-car-rentals/views/admin/bookings/add_booking.html');
    }

    function adminSubmitBooking(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        CarRentalsBooking::insert($payload);

        Flash::add('success', 'New booking added!');

        return new RedirectResponse('/framework/admin/car-rentals/bookings-dashboard');
    }

    function adminDeleteBooking($id)
    {
        CarRentalsBooking::delete($id);

        Flash::add('success', 'Booking removed!');

        return new RedirectResponse('/framework/admin/car-rentals/bookings-dashboard');
    }

    function adminModifyBooking($id)
    {
        $booking = CarRentalsBooking::find($id);

        $modifications = CarRentalsBooking::getModificationsByBookingId($id);

        return $this->twig->render('tr-car-rentals/views/admin/bookings/modify_booking.html', ['modifications' => $modifications, 'booking' => $booking]);
    }

    function adminSubmitBookingModification($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        CarRentalsBooking::insertModification($payload);

        // Also update the table "car_rentals_bookings" with updates
        CarRentalsBooking::update($id, [
            'status' => 'modified',
            'start_date' => $payload['new_start_date'],
            'end_date' => $payload['new_end_date'],
        ]);

        Flash::add('success', 'Booking modifified!');

        return new RedirectResponse('/framework/admin/car-rentals/bookings-dashboard');
    }

    function adminCancelBooking($id)
    {
        $booking = CarRentalsBooking::find($id);

        return $this->twig->render('tr-car-rentals/views/admin/bookings/cancel_booking.html', ['booking' => $booking]);
    }

    function adminSubmitBookingCancellation($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        CarRentalsBooking::insertCancellation($payload);

        // Also update the table "car_rentals_bookings" with updates
        CarRentalsBooking::update($id, [
            'status' => 'cancelled'
        ]);

        Flash::add('success', 'Booking modifified!');

        return new RedirectResponse('/framework/admin/car-rentals/bookings-dashboard');
    }

    function adminConfirmBooking($id)
    {
        $booking = CarRentalsBooking::find($id);

        return $this->twig->render('tr-car-rentals/views/admin/bookings/confirm_booking.html', ['booking' => $booking]);
    }

    function adminSubmitBookingConfirmation($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        /* VALIDATION */
        // Check if the cashier payment id exists or throw error
        $cashier_payment_id = $payload['cashier_payment_id'];

        if(!CashierReceipt::exists($cashier_payment_id)) {

            Flash::add('error', "The cashier payment id $cashier_payment_id does not exist!");

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        CarRentalsBooking::insertConfirmation($payload);

        // Also update the table "car_rentals_bookings" with updates
        CarRentalsBooking::update($id, [
            'status' => 'confirmed'
        ]);

        // Finally generate a receipt, create from booking id and cashier payment id
        CarRentalsReceipt::generateNewReceipt($id, $cashier_payment_id);

        Flash::add('success', 'Booking confirmed!');

        return new RedirectResponse('/framework/admin/car-rentals/bookings-dashboard');
    }

    function adminCarsDashboard()
    {
        return $this->twig->render('tr-car-rentals/views/admin/cars_dashboard.html');
    }

    function adminReports()
    {
        return $this->twig->render('tr-car-rentals/views/admin/reports.html');
    }

    function editItem($id)
    {
        $item = X2FrameworkItem::find($id);

        return $this->twig->render('framework/edit_item.html', ['item' => $item]);
    }

    /* CRUD START */
    // function insertItem(ServerRequest $request)
    // {
    //     $payload = $request->getParsedBody();

    //     X2FrameworkItem::insert($payload);

    //     Flash::add('success', 'New item added!');

    //     return new RedirectResponse('/framework/admin/main');
    // }

    // function updateItem($id, ServerRequest $request)
    // {
    //     $payload = $request->getParsedBody();

    //     X2FrameworkItem::update($id, $payload);

    //     foreach ($payload as $key => $value) {

    //         Flash::add('success', "{$key} set to ${value}");
    //     }

    //     return new RedirectResponse('/framework/admin/main');
    // }

    // function deleteItem($id)
    // {
    //     X2FrameworkItem::delete($id);

    //     Flash::add('success', 'Item removed!');

    //     return new RedirectResponse('/framework/admin/main');
    // }
    /* CRUD END */
}
