<?php

namespace PGCPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
