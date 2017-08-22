<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 30.07.17
 * Time: 20:31
 */

namespace Zhp\FrontendBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginFormController extends Controller
{

    public function renderAction() {
        return $this->render('@ZhpFrontend/Partials/login_form_partial.html.twig');
    }

    /**
     * @Route("/login",name="login")
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request){

        $authUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        //last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('@ZhpFrontend/Login/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
}