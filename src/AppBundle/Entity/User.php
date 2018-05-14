<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    private $newPass;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    
    /**
     * Set newPass
     *
     * @param string $newPass
     *
     * @return User
     */
    public function setNewPass($newPass)
    {
        $this->newPass = $newPass;

        return $this;
    }
    /**
     * Get newPass
     *
     * @return string
     */
    public function getNewPass()
    {
        return $this->newPass;
    }
}
