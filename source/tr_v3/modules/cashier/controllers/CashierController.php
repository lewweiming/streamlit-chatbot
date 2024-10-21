<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class CashierController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function admin()
    {
        $cashier_receipts = CashierReceipt::all();

        return $this->twig->render('cashier/views/admin/index.html', ['cashier_receipts' => $cashier_receipts]);
    }

    function adminEdit($id)
    {
        $receipt = CashierReceipt::find($id);

        return $this->twig->render('cashier/views/admin/edit.html', ['receipt' => $receipt]);
    }

    function adminUpdateRow($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        if(empty($payload['stripe_fee'])) {
            $payload['stripe_fee'] = null;
        }

        CashierReceipt::update($id, $payload);

        Flash::add('success', 'Cashier row updated!');

        return new RedirectResponse('/framework/admin/cashier');
    }

    function myCashierReceipts()
    {
        $auth = Delight::getAuth();

        $user_id = $auth->getUserId();

        $receipts = CashierReceipt::where('user_id', $user_id);
        
        return $this->twig->render('cashier/views/user/my_cashier_receipts.html', ['receipts' => $receipts]);
    }

    // Cashier accepts a param to indicate which item is being purchased
    function showCashier()
    {
        $mode = PAYPAL_MODE;

        $paypal_client_id = $mode == 'sandbox' ? PAYPAL_SANBOX_CLIENT_ID : PAYPAL_LIVE_CLIENT_ID;

        return $this->twig->render('cashier/views/paypal.html', ['mode' => $mode, 'paypal_client_id' => $paypal_client_id]);
    }

    function checkoutSponsoredAds(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        // VALIDATE
        if(empty($data['job_id'])) {

            Flash::add('error', 'Job id must be provided!');

            return new RedirectResponse('/user/jobs');
        }

        $job_id = $data['job_id'];

        $job = JobDB::find($job_id);

        if($job->is_featured == 1) {
            Flash::add('error', "Job listing (ID: $job_id) is already featured.");
            return new RedirectResponse('/user/jobs');
        }

        // CONTINUE

        $mode = PAYPAL_MODE;

        $paypal_client_id = $mode == 'sandbox' ? PAYPAL_SANBOX_CLIENT_ID : PAYPAL_LIVE_CLIENT_ID;

        return $this->twig->render('cashier/views/paypal_sponsored_ads.html', [
            'mode' => $mode, 
            'job' => $job,
            'paypal_client_id' => $paypal_client_id
        ]);
    }
}
?>