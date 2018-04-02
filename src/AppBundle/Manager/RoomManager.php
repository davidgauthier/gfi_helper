<?php

namespace AppBundle\Manager;


use AppBundle\Entity\Room;

class RoomManager extends AbstractDoctrineManager
{
    /**
     * @return Room
     */
    public function getRoomById($id)
    {
        return $this->entityManager->getRepository(Room::class)->findOneById($id);
    }
    
    
    /**
     * @return Room
     */
    public function create()
    {
        return new Room();
    }
    



    /**
     * @return \AppBundle\Repository\RoomRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(Room::class);
    }

}