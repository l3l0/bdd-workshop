<?php

namespace BddWorkshop\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class SecurityController
{
    public function loginAction(Request $request, Application $app)
    {
        $parameters = [];

        if ($error = $app['security.last_error']($request)) {
            $parameters = ['error' => $error];
        }
        return $app['twig']->render('login.twig', $parameters);
    }
}
