<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 21:49
 */

namespace Zhp\FrontendBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zhp\BackendBundle\Entity\Zbiorka;

class ZbiorkiTableController extends Controller
{
    public function getZbiorkiAction($page = 1, $itemsPerPage = 10){

        $repository = $this->getDoctrine()->getRepository(Zbiorka::class);
        $zbiorki = $repository->findAllForPage($page, $itemsPerPage);

        return $this->render(
            "@ZhpFrontend/Partials/zbiorka_table_partial.twig",
            array('zbiorki' => $zbiorki)
        );
    }
}