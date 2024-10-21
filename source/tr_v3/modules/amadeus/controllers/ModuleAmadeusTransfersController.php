<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleAmadeusTransfersController extends CoreController
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
        return $this->twig->render('amadeus/views/admin/transfers_main.html');
    }

    // function showHotelApp()
    // {
    //     return $this->twig->render('amadeus/views/hotel-booking/main.html');
    // }

    // function showTourSearch()
    // {
    //     return $this->twig->render('amadeus/views/admin/trips/tour_search.html');
    // }

}
?>