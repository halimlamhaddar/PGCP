<?php



namespace UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les utilisateurs à créer
        $etudiant=new User();
        $etudiant->setUsername("etudiant");
        $etudiant->setPassword("etudiantpass");
        $etudiant->setSalt("");
        $etudiant->setRoles(['ROLE_ETUDIANT']);

        $prof=new User();
        $prof->setUsername("prof");
        $prof->setPassword("profpass");
        $prof->setSalt("");
        $prof->setRoles(['ROLE_PROFESSEUR']);

        $admin=new User();
        $admin->setUsername("admin");
        $admin->setPassword("adminpass");
        $admin->setSalt("");
        $admin->setRoles(['ROLE_ADMIN']);

        // On les persiste
        $manager->persist($etudiant);
        $manager->persist($prof);
        $manager->persist($admin);
        

        // On déclenche l'enregistrement
        $manager->flush();
    }
}