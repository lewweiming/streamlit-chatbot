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

class ModuleFlightBookingsCheckoutController extends CoreController
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
        return $this->twig->render('tr-flight-bookings/views/welcome.html');
    }

    function submitSelection(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        // Pre-process and generate data such as dates
        $departureDate = str_replace('/', '-', $data['departureDate']);
        $data['departureDate'] = date("Y-m-d", strtotime($departureDate));

        $returnDate = str_replace('/', '-', $data['returnDate']);
        $data['returnDate'] = date("Y-m-d", strtotime($returnDate));

        // Update Session data
        $flightBookingSession = new FlightBookingSessionManager();

        try {

            $flightBookingSession->addBooking(1, $data); // For current business use case, set car id to 1 as default, since we only support one car booking request per session.

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // Redirect
        Flash::add('success', 'Preference updated.');

        return new RedirectResponse('/modules/flight-bookings/checkout/personal-details');
    }

    function showPersonalDetails(ServerRequest $request)
    {
        // Check session manager
        $flightBookingSession = new FlightBookingSessionManager();
        $data = $flightBookingSession->getBooking(1);

        if($data === null) {

            Flash::add('error', 'Your booking request is empty!');
            return new RedirectResponse('/modules/flight-bookings');    
        }

        return $this->twig->render('tr-flight-bookings/views/stepper_personal_details.html');
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
            return new RedirectResponse('/modules/flight-bookings');    
        }

        $flightBookingSession = new FlightBookingSessionManager();

        try {

            $flightBookingSession->updateBooking(1, ['name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone']]);

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // print_r($carRentalSession->getBooking(1));

        Flash::add('success', 'Booking updated!');

        return new RedirectResponse('/modules/flight-bookings/checkout/review-payment');
    }

    function showReviewPayment(ServerRequest $request)
    {
        // Check session manager
        $flightBookingSession = new FlightBookingSessionManager();
        $data = $flightBookingSession->getBooking(1);

        if($data === null) {

            Flash::add('error', 'Your booking request is empty!');

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // Load Paypal
        $mode = PAYPAL_MODE;
        $paypal_client_id = $mode == 'sandbox' ? PAYPAL_SANBOX_CLIENT_ID : PAYPAL_LIVE_CLIENT_ID;

        // Get data from session for use in calculator
        $departureDate = $data['departureDate'];
        $returnDate = $data['returnDate'];
        $travelClass = $data['flightClass'];
        $insurance = true;
        $luggage = true;

        // Passed to View Layer
        $duration = FlightBookingCostCalculator::calculateFlightDuration($departureDate, $returnDate);
        $totalCost = FlightBookingCostCalculator::calculateTotalCost($travelClass, $duration, $insurance, $luggage);

        $totalCost = (float) $totalCost;

        return $this->twig->render('tr-flight-bookings/views/stepper_review_payment.html', ['bookingData' => $data, 'duration' => $duration, 'totalCost' => $totalCost, 'mode' => $mode, 'paypal_client_id' => $paypal_client_id]);

    }
}
?>