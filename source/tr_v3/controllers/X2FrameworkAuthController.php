<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;
use Brick\Event\EventDispatcher;

class X2FrameworkAuthController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function login(ServerRequest $request)
    {
        $g_oauth_client_id = GOOGLE_CLIENT_ID;

        $g_oauth_redirect_uri = GOOGLE_OAUTH_REDIRECT_SIGN_IN_URI;

        $data = $request->getQueryParams();

        $page = null;
        if(isset($data['page']) && !empty($data['page'])) {
            $page = $data['page'];
        }

        return $this->twig->render('/framework/auth/login.html', ['page' => $page, 'g_oauth_redirect_uri' => $g_oauth_redirect_uri, 'g_oauth_client_id' => $g_oauth_client_id]);
    }

    function forceLogin(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        Delight::impersonateLogin($data['user_id']);

        Flash::add('success', 'Login successful!');     

        return new RedirectResponse($request->getHeaderLine('Referer'));
    }

    function postLogin(ServerRequest $request)
    {        
        $data = $request->getParsedBody();

        $url_login = '/login';

        $url_success = '/';

        if(array_key_exists('page', $data)) {
            $page = $data['page']; // The url to redirect to
            $url_login = "/login?page=$page";
            $url_success = $page;
        }

        $response = Delight::attemptLogin($data);

        if($response['status'] == 'error') {

            Flash::add('error', $response['message']);
            return new RedirectResponse($url_login);

        }

        Flash::add('success', 'Login successful!');            

        return new RedirectResponse($url_success);
        
    }

    function register()
    {
        $g_recaptcha_site_key = G_RECAPTCHA_SITE_KEY;

        $g_oauth_client_id = GOOGLE_CLIENT_ID;

        $g_oauth_redirect_uri = GOOGLE_OAUTH_REDIRECT_SIGN_UP_URI;
        
        return $this->twig->render('/framework/auth/register.html', ['g_oauth_redirect_uri' => $g_oauth_redirect_uri, 'g_oauth_client_id' => $g_oauth_client_id, 'g_recaptcha_site_key' => $g_recaptcha_site_key]);
    }

    function postRegister(ServerRequest $request)
    {
        # Validate Recaptcha
        // $g_recaptcha_token = $_POST['g_recaptcha_token'];

        // $gRes = Curl::curlGRecaptchaValidate($g_recaptcha_token);
        // $gRes_decoded = json_decode($gRes, true);

        // if($gRes_decoded['success'] == false) {
            
        //     Flash::add('error', 'Recaptcha invalid!');            
        //     // Flash::addAlert('red', $r);
        //     return new RedirectResponse($request->getHeaderLine('Referer'));
        // }

        # Continue
        $data = $request->getParsedBody();

        $r = Delight::registerWithoutEmailVerification($data);

        if($r) {
            Flash::add('error', $r);            
            // Flash::addAlert('red', $r);
            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        Flash::add('success', 'Registration successful!');            

        return new RedirectResponse('/');
    }

    function changeEmail()
    {
        $d = Delight::getAuth();
        $email = $d->getEmail();

        return $this->twig->render('/framework/auth/change_email.html', ['email' => $email]);
    }

    function postChangeEmail(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $old_email = $data['old_email'];

        $new_email = $data['new_email'];

        $r = Delight::changeEmail($old_email, $new_email);

        if($r) {

            Flash::add('error', $r);            

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        Flash::add('success', 'Email change successful. Please re-login to view reflected changes.');            

        return new RedirectResponse('/');
    }

    function changeUsername()
    {
        $profile = UserProfile::getCurrentUser();
        
        return $this->twig->render('/framework/auth/change_username.html', ['profile' => $profile]);
    }

    function postChangeUsername(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $old_username = $data['old_username'];

        $new_username = $data['new_username'];

        $r = Delight::changeUsername($old_username, $new_username);
        
        if($r) {

            Flash::add('error', $r);            

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        # Success!
        Bus::emit('usernameChange', $old_username, $new_username);

        Flash::add('success', 'Username changed successful!');            

        return new RedirectResponse('/');
    }

    function changePassword()
    {
        return $this->twig->render('/framework/auth/change_password.html');
    }

    function postChangePassword(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $old_password = $data['old_password'];

        $new_password = $data['new_password'];

        $r = Delight::changePassword($old_password, $new_password);

        if($r) {
            Flash::add('error', $r);            

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        Flash::add('success', 'Password change successful!');            

        return new RedirectResponse('/');
    }

    function forgotPassword()
    {
        return $this->twig->render('/framework/auth/forgot_password.html');
    }

    function postForgotPassword(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $email = $data['email'];

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            
            Flash::add('error', 'Invalid email provided!');   
            
            return new RedirectResponse('/password/forgot');
        }

        $o = Delight::forgotPassword($email);

        Flash::add($o['status'], $o['message']);

        return new RedirectResponse('/');
    }

    function resetPassword(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $selector = $data['selector'];

        $token = $data['token'];

        return $this->twig->render('/framework/auth/reset_password.html', ['selector' => $selector, 'token' => $token]);
    }

    function postResetPassword(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $password = $data['password'];

        $selector = $data['selector'];

        $token = $data['token'];

        $r = Delight::resetPassword($selector, $token, $password);

        if($r) {
            Flash::add('error', $r);            

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        Flash::add('success', 'Your password has been successfully reset');            

        return new RedirectResponse('/');
    }

    function logout()
    {
        Delight::getAuth()->logOut();
        Flash::add('success', 'Logout successful!');
        Flash::save();
        return new RedirectResponse('/');
    }

}
?>