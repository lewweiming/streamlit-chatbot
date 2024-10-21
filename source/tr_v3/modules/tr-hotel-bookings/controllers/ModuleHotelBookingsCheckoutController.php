<?php

/**
 * Assist the user to make a checkout for car rentals
 * 
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleHotelBookingsCheckoutController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function showWelcome()
    {

    }

    function submitSelection(ServerRequest $request)
    {
        $data = $request->getQueryParams();
        
        // EXAMPLE PAYLOAD
        // hotel => string (13) "seasideresort"
        // checkInDate => string (10) "2024-10-31"
        // checkOutDate => string (10) "2024-10-29"
        // guests => string (1) "1"
        // roomType => string (8) "standard"
        // breakfast => string (5) "false"
        // parking => string (5) "false"
        // wifi => string (5) "false"

        // Update Session data
        $hotelBookingSession = new HotelBookingSessionManager();

        try {

            $hotelBookingSession->addBooking(1, $data); // For current business use case, set hotel id to 1 as default, since we only support one hotel booking request per session.

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // Redirect
        Flash::add('success', 'Preference updated.');

        return new RedirectResponse('/modules/hotel-bookings/checkout/personal-details');
    }

    function showPersonalDetails(ServerRequest $request)
    {
        // Check session manager
        $hotelBookingSession = new HotelBookingSessionManager();
        $data = $hotelBookingSession->getBooking(1);

        if($data === null) {

            Flash::add('error', 'Your booking request is empty!');
            return new RedirectResponse('/modules/hotel-bookings');    
        }

        return $this->twig->render('tr-hotel-bookings/views/stepper_personal_details.html');
    }

    function submitPersonalDetails(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        # Validate
        $v = new Valitron\Validator($data);
        $v->rule('required', 'name');
        $v->rule('required', 'email');
        $v->rule('required', 'phone');

        if(!$v->validate()) {
            Flash::setValidationErrors($v->errors());
            return new RedirectResponse('/modules/hotel-bookings');    
        }

        $hotelBookingSession = new HotelBookingSessionManager();

        try {

            $hotelBookingSession->updateBooking(1, ['name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone']]);

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // print_r($carRentalSession->getBooking(1));

        Flash::add('success', 'Booking updated!');

        return new RedirectResponse('/modules/hotel-bookings/checkout/review-payment');
    }

    function showReviewPayment(ServerRequest $request)
    {
        // Check session manager
        $hotelBookingSession = new HotelBookingSessionManager();
        $data = $hotelBookingSession->getBooking(1);

        if($data === null) {

            Flash::add('error', 'Your booking request is empty!');

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // Load Paypal
        $mode = PAYPAL_MODE;
        $paypal_client_id = $mode == 'sandbox' ? PAYPAL_SANBOX_CLIENT_ID : PAYPAL_LIVE_CLIENT_ID;

        // Get data from session for use in calculator
        $checkinDate = $data['checkInDate'];
        $checkoutDate = $data['checkOutDate'];
        $roomType = $data['roomType'];
        $numberOfGuests = $data['guests'];
        $breakfast = $data['breakfast'];
        $wifi = $data['wifi'];

        // Passed to View Layer
        $duration = HotelBookingCostCalculator::calculateStayDuration($checkinDate, $checkoutDate);
        $totalCost = HotelBookingCostCalculator::calculateTotalCost($roomType, $duration, $numberOfGuests, $breakfast, $wifi);

        $totalCost = (float) $totalCost;

        return $this->twig->render('tr-hotel-bookings/views/stepper_review_payment.html', ['bookingData' => $data, 'duration' => $duration, 'totalCost' => $totalCost, 'mode' => $mode, 'paypal_client_id' => $paypal_client_id]);

    }
}
?>