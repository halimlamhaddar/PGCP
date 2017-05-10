<?php
/**
 * Created by PhpStorm.
 * User: halim
 * Date: 07/05/2017
 * Time: 03:57
 */

namespace UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="admin")
 */
class Admin extends User
{
    public function getType()
    {
        return "admin";
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}