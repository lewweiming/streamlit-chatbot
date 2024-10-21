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

class ModuleTripBookingsCheckoutController extends CoreController
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
        // destination => string (5) "tokyo"
        // departureDate => string (10) "2024-10-25"
        // returnDate => string (10) "2024-10-29"
        // travelers => string (1) "1"
        // hotelBooking => string (5) "false"
        // carRental => string (5) "false"

        // Update Session data
        $tripBookingSession = new TripBookingSessionManager();

        try {

            $tripBookingSession->addBooking(1, $data); // For current business use case, set hotel id to 1 as default, since we only support one hotel booking request per session.

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // Redirect
        Flash::add('success', 'Preference updated.');

        return new RedirectResponse('/modules/trip-bookings/checkout/personal-details');
    }

    function showPersonalDetails(ServerRequest $request)
    {
        // Check session manager
        $tripBookingSession = new TripBookingSessionManager();
        $data = $tripBookingSession->getBooking(1);

        if($data === null) {

            Flash::add('error', 'Your booking request is empty!');
            return new RedirectResponse('/modules/trip-bookings');    
        }

        return $this->twig->render('tr-trip-bookings/views/stepper_personal_details.html');
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
            return new RedirectResponse('/modules/trip-bookings');    
        }

        $tripBookingSession = new TripBookingSessionManager();

        try {

            $tripBookingSession->updateBooking(1, ['name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone']]);

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // print_r($carRentalSession->getBooking(1));

        Flash::add('success', 'Booking updated!');

        return new RedirectResponse('/modules/trip-bookings/checkout/review-payment');
    }

    function showReviewPayment(ServerRequest $request)
    {
        // Check session manager
        $tripBookingSession = new TripBookingSessionManager();
        $data = $tripBookingSession->getBooking(1);

        if($data === null) {

            Flash::add('error', 'Your booking request is empty!');

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // Load Paypal
        $mode = PAYPAL_MODE;
        $paypal_client_id = $mode == 'sandbox' ? PAYPAL_SANBOX_CLIENT_ID : PAYPAL_LIVE_CLIENT_ID;

        // Get data from session for use in calculator
        $startDate = '2024-10-03';
        $endDate = '2024-10-08';
        $numberOfTravelers = 2;
        $transportationType = 'flight';
        $accommodationType = 'hotel';
        $activities = ['city tour', 'museum entry'];

        // Passed to View Layer
        $duration = TripBookingCostCalculator::calculateTripDuration($startDate, $endDate);
        $totalCost = TripBookingCostCalculator::calculateTotalCost($transportationType, $accommodationType, $duration, $numberOfTravelers, $activities);

        $totalCost = (float) $totalCost;

        return $this->twig->render('tr-trip-bookings/views/stepper_review_payment.html', ['bookingData' => $data, 'duration' => $duration, 'totalCost' => $totalCost, 'mode' => $mode, 'paypal_client_id' => $paypal_client_id]);
    }
}
?>