<?php

namespace UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"user" = "User","admin"="Admin", "etudiant" = "Etudiant", "enseignant" = "Enseignant"})
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    public function __construct()
    {
        parent::__construct();
        $this->cours = new ArrayCollection();
    }


    /**
     * @ORM\OneToMany(targetEntity="PGCPBundle\Entity\Cours", mappedBy="proprietaire")
     */
    private $cours;

    


    /**
     * Add cour
     *
     * @param \PGCPBundle\Entity\Cours $cour
     *
     * @return User
     */
    public function addCour(\PGCPBundle\Entity\Cours $cour)
    {
        $this->cours[] = $cour;

        return $this;
    }

    /**
     * Remove cour
     *
     * @param \PGCPBundle\Entity\Cours $cour
     */
    public function removeCour(\PGCPBundle\Entity\Cours $cour)
    {
        $this->cours->removeElement($cour);
    }

    /**
     * Get cours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCours()
    {
        return $this->cours;
    }
}
