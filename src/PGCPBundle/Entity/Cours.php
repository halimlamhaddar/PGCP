<?php

namespace PGCPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="PGCPBundle\Repository\CoursRepository")
 */
class Cours
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=255, unique=true)
     */
    private $intitule;


    /**
     * @var boolean
     *
     * @ORM\Column(name="valide", type="boolean", nullable=true,options={"default":false})
     */
    private $valide;




    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="objectifs", type="text", nullable=true)
     */
    private $objectifs;


    /********************************************/
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="S'il vous plait, uploader le cours en tant que fichier PDF.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $lien;

    public function getLien()
    {
        return $this->lien;
    }

    public function setLien($ln)
    {
        $this->lien = $ln;

        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="cours")
     * @ORM\JoinColumn(name="proprietaire_id", referencedColumnName="id",nullable=true)
     */
    private $proprietaire;


    /********************************************/



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     *
     * @return Cours
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cours
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set objectifs
     *
     * @param string $objectifs
     *
     * @return Cours
     */
    public function setObjectifs($objectifs)
    {
        $this->objectifs = $objectifs;

        return $this;
    }

    /**
     * Get objectifs
     *
     * @return string
     */
    public function getObjectifs()
    {
        return $this->objectifs;
    }

    /**
     * Set proprietaire
     *
     * @param \UserBundle\Entity\User $proprietaire
     *
     * @return Cours
     */
    public function setProprietaire(\UserBundle\Entity\User $proprietaire = null)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return \UserBundle\Entity\User
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     *
     * @return Cours
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return boolean
     */
    public function getValide()
    {
        return $this->valide;
    }
}
