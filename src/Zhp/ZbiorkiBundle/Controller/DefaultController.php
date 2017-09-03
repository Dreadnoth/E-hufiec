<?php

namespace Zhp\ZbiorkiBundle\Controller;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Zhp\BackendBundle\Entity\Jednostka;
use Zhp\BackendBundle\Entity\Zbiorka;
use Zhp\ZbiorkiBundle\Form\ZbiorkaType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="zhp_zbiorki")
     */
    public function indexAction()
    {
        return $this->render('ZhpZbiorkiBundle:Default:index.html.twig');
    }
}
