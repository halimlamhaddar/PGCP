<?php

namespace PGCPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtudiantController extends Controller
{
    public function indexAction()
    {
        //bloquage d'acces par controlleur
        //$this->denyAccessUnlessGranted('ROLE_ETUDIANT');
        return $this->render('@PGCP/Etudiant/etudiant.html.twig', array());
    }
}
