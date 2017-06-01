<?php

namespace PGCPBundle\Controller;

use PGCPBundle\Entity\Cours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChefDeFiliereController extends Controller
{
    public function indexAction()
    {
        $courses=$this->getDoctrine()->getRepository(Cours::class)->findAll();

        return $this->render('@PGCP/ChefDeFiliere/listCours.html.twig',[
            'courses'=>$courses,
            'id'=>'',
            'valider'=>false,

        ]);    
    
    
    }

    public function validerCoursAction($id)
    {
        $cours=$this->getDoctrine()->getRepository(Cours::class)->findOneBy(['id'=>$id]);
        $em=$this->getDoctrine()->getManager();
        $cours->setValide(true);
        $em->persist($cours);
        $em->flush();
        $courses=$this->getDoctrine()->getRepository(Cours::class)->findAll();

        return $this->render('@PGCP/ChefDeFiliere/listCours.html.twig',[
            'courses'=>$courses,
            'id'=>'',
            'valider'=>true,
            'cours'=>$cours,

        ]);

    }

    
}
