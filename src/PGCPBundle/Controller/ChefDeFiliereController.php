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
            'id'=>''
        ]);    
    
    
    }
}
