<?php

namespace PGCPBundle\Controller;

use PGCPBundle\Entity\Actualite;
use PGCPBundle\Entity\Slide;
use PGCPBundle\Form\ActualiteType;
use PGCPBundle\Form\SlideType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        $userManager=$this->container->get('fos_user.user_manager');

        $users=$userManager->findUsers();

        return $this->render('@PGCP/Admin/admin.html.twig', array(
            'users'=>$users,
            'role' => '',
            'commande'=>'',
            'nom' => ''
        ));
    }

    public function etudiantAction($username)
    {
        $userManager=$this->container->get('fos_user.user_manager');

        $user=$userManager->findUserByUsername($username);
        $user->setRoles(array('ROLE_ETUDIANT'));
        $userManager->updateUser($user);

        $users=$userManager->findUsers();


        return $this->render('@PGCP/Admin/admin.html.twig', array(
            'users'=>$users,
            'role'=>'ETUDIANT',
            'commande'=>'',
            'nom' => $user->getUsername()

        ));
    }
    public function professeurAction($username)
    {
        $userManager=$this->container->get('fos_user.user_manager');

        $user=$userManager->findUserByUsername($username);
        $user->setRoles(array('ROLE_PROFESSEUR'));
        $userManager->updateUser($user);

        $users=$userManager->findUsers();


        return $this->render('@PGCP/Admin/admin.html.twig', array(
            'users'=>$users,
            'role'=>'PROFESSEUR',
            'commande'=>'',
            'nom' => $user->getUsername()
        ));
    }
    public function adminAction($username)
    {
        $userManager=$this->container->get('fos_user.user_manager');

        $user=$userManager->findUserByUsername($username);
        $user->setRoles(array('ROLE_ADMIN'));
        $userManager->updateUser($user);

        $users=$userManager->findUsers();


        return $this->render('@PGCP/Admin/admin.html.twig', array(
            'users'=>$users,
            'role'=>'ADMIN',
            'commande'=>'',
            'nom' => $user->getUsername()
        ));
    }

    public function ajouterActualiteAction(Request $request)
    {
        $actualite=new Actualite();
        $form=$this->createForm(ActualiteType::class,$actualite);

        //die(dump($actualite));
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // $file stores the uploaded PDF file
            /**
             * @var UploadedFile $file
             */
            $file = $actualite->getImage();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('actualites_directory'),
                $fileName
            );

            $actualite->setImage($fileName);
            $em->persist($actualite);
            $em->flush();

            return $this->redirectToRoute('pgcp_homepage');
        }

        return $this->render('@PGCP/Admin/addActu.html.twig',[
            'form'=>$form->createView(),
        ]);
    }

    public function ajouterSlideAction(Request $request )
    {
        $slide = new Slide();
        $form = $this->createForm(SlideType::class, $slide);

        //die(dump($actualite));
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // $file stores the uploaded PDF file
            /**
             * @var UploadedFile $file
             */
            $file = $slide->getImage();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('slides_directory'),
                $fileName
            );

            $slide->setImage($fileName);
            $em->persist($slide);
            $em->flush();

            return $this->redirectToRoute('pgcp_homepage');
        }

        return $this->render('@PGCP/Admin/addSlide.html.twig',[
            'form'=>$form->createView(),
        ]);
        
        
    }

    public function chefdefiliereAction($username)
    {
        $userManager=$this->container->get('fos_user.user_manager');

        $user=$userManager->findUserByUsername($username);
        $user->setRoles(array('ROLE_CHEF_DE_FILIERE'));
        $userManager->updateUser($user);

        $users=$userManager->findUsers();


        return $this->render('@PGCP/Admin/admin.html.twig', array(
            'users'=>$users,
            'role'=>'CHEF DE FILIERE',
            'commande'=>'',
            'nom' => $user->getUsername()
        ));
    }

    

    public function deleteAction($username)
    {
        $userManager=$this->container->get('fos_user.user_manager');

        $user=$userManager->findUserByUsername($username);
        $nom=$user->getUsername();
        $userManager->deleteUser($user);

        $users=$userManager->findUsers();


        return $this->render('@PGCP/Admin/admin.html.twig', array(
            'users'=>$users,
            'role'=>'',
            'commande'=>'delete',
            'nom' => $nom
        ));
    }
}
