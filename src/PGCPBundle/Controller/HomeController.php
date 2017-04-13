<?php

namespace PGCPBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{

    public function indexAction()
    {
        return $this->render('@PGCP/Default/index.html.twig', array(
            
        ));
    }

    public function adminAction()
    {
        return $this->render('@PGCP/Admin/admin.html.twig', array(
            
        ));
    }
}
