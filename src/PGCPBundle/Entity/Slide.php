<?php

namespace PGCPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * Slide
 *
 * @ORM\Table(name="slide")
 * @ORM\Entity(repositoryClass="PGCPBundle\Repository\SlideRepository")
 */
class Slide
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;


    /**
     * @ORM\Column(type="string",nullable=true)
     *
     * @Assert\NotBlank(message="Please, upload the image News as a JPG file.")
     * @Assert\File(mimeTypes={ "image/jpeg" ,"image/pjpeg","image/png"})
     * @Assert\Image(
     *     minWidth="500",
     *     minHeight="315"
     * )
     */

    private $image;

    public function setImage($img)
    {
        $this->image = $img;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

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
     * Set titre
     *
     * @param string $titre
     *
     * @return Slide
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
}
