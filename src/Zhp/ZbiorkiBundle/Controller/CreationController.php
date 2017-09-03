<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 02.09.17
 * Time: 18:06
 */

namespace Zhp\ZbiorkiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Zhp\BackendBundle\Entity\OperatorDane;
use Zhp\BackendBundle\Entity\Zbiorka;
use Zhp\ZbiorkiBundle\Form\ZbiorkaType;

class CreationController extends Controller
{
    /**
     * @Route("/new")
     */
    public function newAction(Request $request){
        $zbiorka = new Zbiorka();

        $form = $this->createForm(ZbiorkaType::class, $zbiorka);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $zbiorka = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($zbiorka);
            $em->flush();
        }

        return $this->render('@ZhpZbiorki/Creation/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/getPersonalInfo", name="zhp_zbiorki_get_personal_info", condition="request.isXmlHttpRequest()")
     */
    public function getCurrentUserPersonalInfoAction(){
        $logger = $this->get('logger');

        $user = $this->getUser()->getId();
        $logger->info("Searching for userid:" . $user);

        $repository = $this->getDoctrine()->getRepository(OperatorDane::class);
        $data = $repository->findByOperator($user);
        $response = new JsonResponse(array('data'));
        $logger->info($data[0]);
        try{
            $response->setData(array('data' => array(
                'imie' => $data[0]->getImie(),
                'nazwisko' => $data[0]->getNazwisko(),
                'telefon' => $data[0]->getTelefon(),
            )));
        } catch (FatalThrowableError $e) {
            $logger->error("Error during get personal data : " . $e->getMessage());
        }


        return $response;
    }
}