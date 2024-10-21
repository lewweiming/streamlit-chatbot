<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleShopUserController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function showUserOrdersDashboard()
    {
        $rows = ShopOrder::all();

        return $this->twig->render('tr-shop/views/user/orders_dashboard.html', ['rows' => $rows]);
    }

    function showReceipt()
    {
        return $this->twig->render('tr-car-rentals/views/receipt.html');
    }

    function showOrderModification($order_ref)
    {
        $booking = CarRentalsBooking::findWhere('booking_ref', $booking_ref);

        return $this->twig->render('tr-car-rentals/views/user/booking_modification.html', ['booking' => $booking]);
    }

    function showOrderCancellation($order_ref)
    {
        $booking = CarRentalsBooking::findWhere('booking_ref', $booking_ref);

        return $this->twig->render('tr-car-rentals/views/user/booking_cancellation.html', ['booking' => $booking]);
    }

    function submitOrderModification(ServerRequest $request)
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

    function submitOrderCancellation(ServerRequest $request)
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
}
?>