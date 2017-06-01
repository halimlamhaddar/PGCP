<?php

namespace PGCPBundle\Controller;


use PGCPBundle\Entity\Actualite;
use PGCPBundle\Entity\Slide;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends Controller
{

    public function indexAction()
    {
        $actualites=$this->getDoctrine()->getRepository(Actualite::class)->findAll();
        $slides=$this->getDoctrine()->getRepository(Slide::class)->findAll();





            return $this->render('@PGCP/Default/index.html.twig', array(
            'actualites' => $actualites,
            'slides'=>$slides,


        ));
    }

    public function actuAction($id)
    {
        $actu=$this->getDoctrine()->getRepository(Actualite::class)->findOneBy(['id'=>$id]);
        $actualites=$this->getDoctrine()->getRepository(Actualite::class)->findAll();




        return $this->render('@PGCP/Actualites/actu.html.twig', array(
            'actu' => $actu,
            'actualites'=>$actualites,


        ));
    }
}
