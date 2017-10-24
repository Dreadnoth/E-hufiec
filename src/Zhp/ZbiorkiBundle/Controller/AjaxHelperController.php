<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 03.10.17
 * Time: 20:11
 */

namespace Zhp\ZbiorkiBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class AjaxHelperController extends Controller
{

    /**
     * @Route("/getMyGatheringsAjax")
     * @Method(methods={"POST"})
     */
    public function myFundraisingsAction() {
        return new JsonResponse(array('data' => ''));
    }

}