<?php

namespace spec\BddWorkshop\Controller;

use PHPSpec2\ObjectBehavior;

class SecurityController extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('BddWorkshop\Controller\SecurityController');
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @param \Silex\Application $application
     * @param \Twig_Extension $twig
     */
    function its_login_action_renders_login_form_action($request, $response, $application, $twig)
    {
        $application->offsetGet('twig')->willReturn($twig); 
        $twig->render('login.twig', [])->shouldBeCalled()->willReturn($response);
        $error  = $application->offsetGet('security.last_error')->willReturn(function ($request) {
            return false;
        });

        $this->loginAction($request, $application)->shouldBe($response);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @param \Silex\Application $application
     * @param \Twig_Extension $twig
     */
    function its_login_action_renders_login_form_with_error($request, $response, $application, $twig)
    {
        $application->offsetGet('twig')->willReturn($twig);
        $twig->render('login.twig', ['error' => 'some error'])->shouldBeCalled()->willReturn($response);
        $error  = $application->offsetGet('security.last_error')->willReturn(function ($request) {
            return 'some error';
        });

        $this->loginAction($request, $application)->shouldBe($response);
    }
}
