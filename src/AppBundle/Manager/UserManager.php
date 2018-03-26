<?php

namespace AppBundle\Manager;


use AppBundle\Entity\User;

class UserManager
{
    /**
     * @return User
     */
    public function getAllUsers()
    {
        return $this->getRepository()->getAllUsers();
    }

    public function getRepository()
    {
        return $this->entityManager->getRepository(User::class);
    }

}
