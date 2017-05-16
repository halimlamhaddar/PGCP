<?php

namespace PGCPBundle\Controller;


use PGCPBundle\Entity\Actualite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{

    public function indexAction()
    {
        $actualites=$this->getDoctrine()->getRepository(Actualite::class)->findAll();


        $request = $this->get('request_stack')->getMasterRequest();

        $googleCalendar = $this->get('fungio.google_calendar');
        $googleCalendar->setRedirectUri('http://localhost/PGCP/web/app_dev.php');


        if ($request->query->has('code') && $request->get('code')) {
            $client = $googleCalendar->getClient($request->get('code'));
        } else {
            
            $client = $googleCalendar->getClient();
        }

        if (is_string($client)) {
            return new RedirectResponse($client);
        }

        $events = $googleCalendar->getEventsForDate('primary', new \DateTime('now'));




        return $this->render('@PGCP/Default/index.html.twig', array(
            'actualites' => $actualites,
            'events'=>$events,

        ));
    }
}
