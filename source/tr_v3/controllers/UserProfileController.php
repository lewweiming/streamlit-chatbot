<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class UserProfileController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function show($username)
    {
        $profile = UserProfile::findByUsername($username);

        return $this->twig->render('/pages/user_profile.html', ['profile' => $profile]);
    }

    function myProfile()
    {
        $profile = UserProfile::getCurrentUser();

        return $this->twig->render('/user-account/my_profile.html', ['profile' => $profile]);
    }

    function update(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        UserProfile::update($payload);

        Flash::add('success', 'Profile updated!');

        return new RedirectResponse('/user/my-profile');
    }

    function removeProfileImage()
    {
        UserProfile::deleteProfileImage(true);

        Flash::add('success', 'Profile image removed!');

        return new RedirectResponse('/user/my-profile-image');
    }


    function uploadProfileImage(ServerRequest $request)
    {
        # Validate File only
        $v = new Valitron\Validator($_FILES['image']);
        $v->rule('in', 'type', ['image/jpeg', 'image/pjpeg', 'image/png'])->message('Only png and jpeg files can be uploaded!');
        $v->rule('max', 'size', 500000);
        if(!$v->validate()) {

            Flash::setValidationErrors($v->errors());

            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        # Continue
        $uploads = $request->getUploadedFiles();

        ## Validate for files
        if($_FILES['image']['size'] == 0) {

            Flash::add('error', 'Nothing to upload!');
            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        if($_FILES['image']['size'] > 0) {

            UserProfile::deleteProfileImage(false);
            UserProfile::saveProfileImage($uploads['image']);
        };

        // SUCCESS
        Flash::add('success', 'Profile image uploaded!');

        return new RedirectResponse($request->getHeaderLine('Referer'));
    }
}