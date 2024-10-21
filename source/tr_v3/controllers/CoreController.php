<?php

/**
- Simple Auth support
- Initialises Twig
- Setup Flash Sessions as Global Variables for Twig
**/

class CoreController
{
    protected $twig; // Twig Instance

    public function __construct()
    {
        $auth = Delight::getAuth(); // Always instantiates a session or similar session
        
        // if (session_status() !== PHP_SESSION_ACTIVE) {
        //     @session_start();
        // }

        ## Create new Twig instance
        $this->twig = Twig::getTwig();

        /* 
        Setup Auth & Flash Session
        - Always init delight instance with Delight::getAuth() to check if user is still logged in!
        */
        
        if($auth->check()) {

            $this->twig->addGlobal('auth', $auth);
        }

        if(Delight::isAdmin()) {
            
            $this->twig->addGlobal('isAdmin', true);
        }

        if(Delight::isUser()) {
            
            $this->twig->addGlobal('isUser', true);
            $this->twig->addGlobal('username', $auth->getUsername());

            // $this->twig->addGlobal('notificationCount', UserNotification::getUnreadCountByUserId($auth->getUserId()));
        }

        $this->twig->addGlobal('session', $_SESSION);

        $this->twig->addGlobal('flash', Flash::all());
        $this->twig->addGlobal('errors', Flash::validationErrors());

        // $this->twig->addGlobal('g_recaptcha_site_key', G_RECAPTCHA_SITE_KEY);
        // $this->twig->addGlobal('stripe_mode', STRIPE_MODE);
        // $this->twig->addGlobal('stripe_test_public_key', STRIPE_TEST_PUBLIC_KEY);
        // $this->twig->addGlobal('stripe_live_public_key', STRIPE_LIVE_PUBLIC_KEY);
        
        Flash::clear();
    }
}
