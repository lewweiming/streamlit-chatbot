<?php

/**
All methods:
- showWelcome
- showInventory
- showPersonalDetails
- submitPersonalDetails
- showReviewPayment
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleShopCheckoutController extends CoreController
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
        return $this->twig->render('tr-shop/views/welcome.html');
    }

    function showInventory()
    {
        $rows = ShopInventory::fetchContext();

        return $this->twig->render('tr-shop/views/inventory.html', ['rows' => $rows]);
    }

    function showItemDetail($id)
    {
        $item = ShopInventory::find($id);

        return $this->twig->render('tr-shop/views/item_detail.html', ['item' => $item]);
    }

    function showCart()
    {
        $shopSession = new ShopSessionManager();

        $items = $shopSession->getAllItems();

        $total = ShopCostCalculator::calculateSubtotal($items);
        
        return $this->twig->render('tr-shop/views/cart.html', ['rows' => $items, 'total' => $total]);
    }

    /* Uses ShopSessionManager */
    function addToCart(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $item_id = $data['id'];

        $item = ShopInventory::find($item_id);

        // Setup Payload
        $payload = [
            'name' => $item->name,
            'price' => $item->price, 
            'quantity' => 1, // Set to 1 for the time being until better support
            // 'variations' => ['size' => 'M', 'color' => 'blue']
            'variations' => [] // Set to empty for the time being until better support
        ];

        // Update Session data
        $shopSession = new ShopSessionManager();

        try {

            $shopSession->addItem($item_id, $payload);

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // Redirect
        Flash::add('success', 'Cart updated.');

        return new RedirectResponse($request->getHeaderLine('Referer'));
    }

    /* Uses ShopSessionManager */
    function removeFromCart(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $item_id = $data['id'];

        // Update Session data
        $shopSession = new ShopSessionManager();

        try {

            $shopSession->removeItem($item_id);

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // Redirect
        Flash::add('success', 'Cart updated.');

        return new RedirectResponse($request->getHeaderLine('Referer'));
    }

    function showPersonalDetails(ServerRequest $request)
    {
        // Check session manager
        $shopSession = new ShopSessionManager();
        $data = $shopSession->getAllItems();

        if (empty($data)) {

            Flash::add('error', 'Your cart is empty!');
            return new RedirectResponse('/modules/shop');
        }

        return $this->twig->render('tr-shop/views/stepper_personal_details.html');
    }

    function submitPersonalDetails(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        # Validate
        $v = new Valitron\Validator($data);
        $v->rule('required', 'name');
        $v->rule('required', 'email');
        $v->rule('required', 'phone');

        if (!$v->validate()) {
            Flash::setValidationErrors($v->errors());
            return new RedirectResponse('/modules/shop/checkout/personal-details');
        }

        $shopSession = new ShopSessionManager();

        try {

            $payload = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone']
            ];

            $shopSession->updateOrderDetails($payload);

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // print_r($carRentalSession->getBooking(1));

        Flash::add('success', 'Order updated!');

        return new RedirectResponse('/modules/shop/checkout/delivery-details');
    }

    function showDeliveryDetails(ServerRequest $request)
    {
        // Check session manager
        $shopSession = new ShopSessionManager();
        $data = $shopSession->getAllItems();

        if (empty($data)) {

            Flash::add('error', 'Your cart is empty!');
            return new RedirectResponse('/modules/shop');
        }

        return $this->twig->render('tr-shop/views/stepper_delivery_details.html');
    }

    function submitDeliveryDetails(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        # Validate
        $v = new Valitron\Validator($data);
        $v->rule('required', 'address');
        $v->rule('required', 'city');
        $v->rule('required', 'country');
        $v->rule('required', 'postalCode');

        if (!$v->validate()) {
            Flash::setValidationErrors($v->errors());
            return new RedirectResponse('/modules/shop/checkout/delivery-details');
        }

        $shopSession = new ShopSessionManager();

        try {

            $payload = [
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => $data['state'],
                'country' => $data['country'],
                'postalCode' => $data['postalCode'],
            ];
            $shopSession->updateOrderDetails($payload);

        } catch (Exception $e) {

            Flash::add('error', $e->getMessage());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        // print_r($carRentalSession->getBooking(1));

        Flash::add('success', 'Order updated!');

        return new RedirectResponse('/modules/shop/checkout/review-payment');
    }

    function showReviewPayment(ServerRequest $request)
    {
        // Check session manager
        $shopSession = new ShopSessionManager();
        $cartData = $shopSession->getAllItems();
        $orderData = $shopSession->getOrderDetails();

        if (empty($cartData)) {

            Flash::add('error', 'Your cart is empty!');
            return new RedirectResponse('/modules/shop');
        }

        if (empty($orderData)) {

            Flash::add('error', 'You need to provide order details!');
            return new RedirectResponse('/modules/shop');
        }

        // Load Paypal
        $mode = PAYPAL_MODE;
        $paypal_client_id = $mode == 'sandbox' ? PAYPAL_SANBOX_CLIENT_ID : PAYPAL_LIVE_CLIENT_ID;

        // Passed to View Layer
        $cartTotal = ShopCostCalculator::calculateSubtotal($cartData);

        return $this->twig->render('tr-shop/views/stepper_review_payment.html', ['orderData' => $orderData, 'cartData' => $cartData, 'cartTotal' => $cartTotal, 'mode' => $mode, 'paypal_client_id' => $paypal_client_id]);
    }
}
