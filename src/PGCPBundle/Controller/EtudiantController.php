<?php

namespace PGCPBundle\Controller;

use PGCPBundle\Entity\Cours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtudiantController extends Controller
{
    public function indexAction()
    {
        //bloquage d'acces par controlleur
        //$this->denyAccessUnlessGranted('ROLE_ETUDIANT');

        $courses=$this->getDoctrine()->getRepository(Cours::class)->findAll();

        return $this->render('@PGCP/Etudiant/etudiant.html.twig', array(
            'courses'=>$courses,
        ));
    }
}
