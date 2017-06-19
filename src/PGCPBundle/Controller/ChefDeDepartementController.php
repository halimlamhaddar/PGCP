<?php

namespace PGCPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChefDeDepartementController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
