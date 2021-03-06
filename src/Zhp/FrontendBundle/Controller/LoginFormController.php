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
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginFormController extends Controller
{

    /**
     * @Route("/login",name="login")
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request){

        $authUtils = $this->get('security.authentication_utils');
        if(!($this->get('security.token_storage')->getToken() instanceof AnonymousToken)){
            return $this->redirectToRoute('homepage');
        }

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