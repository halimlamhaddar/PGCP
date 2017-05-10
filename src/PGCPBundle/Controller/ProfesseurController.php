<?php

namespace PGCPBundle\Controller;

use PGCPBundle\Entity\Cours;
use PGCPBundle\Form\CoursType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProfesseurController extends Controller
{
    public function indexAction(){
        $courses=$this->getDoctrine()->getRepository(Cours::class)->findAll();

        return $this->render('@PGCP/Professeur/listCours.html.twig',[
            'courses'=>$courses,
            'id'=>''
        ]);
    }




    public function ajouterCoursAction(Request $request)
    {
        $cours=new Cours();
        $form = $this->get('form.factory')->create(CoursType::class, $cours);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            /** @var UploadedFile $file */
            $file =$cours->getLien();


            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('cours_directory'),
                $fileName
            );

            $cours->setLien($fileName);

            $em->persist($cours);
            $em->flush();


            $courses=$this->getDoctrine()->getRepository(Cours::class)->findAll();


            return $this->render('@PGCP/Professeur/listCours.html.twig', array(
                'courses'=>$courses,
                'id'=>$cours->getId()
            ));
        }



        return $this->render('@PGCP/Professeur/professeur.html.twig', array(
            'form'=>$form->createView(),
        ));
    }
}
