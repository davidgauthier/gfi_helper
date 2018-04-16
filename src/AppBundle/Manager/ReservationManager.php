<?php

namespace AppBundle\Manager;


use AppBundle\Entity\Reservation;
use AppBundle\Entity\Room;
use AppBundle\Entity\User;

class ReservationManager extends AbstractDoctrineManager
{
    /**
     * @return Reservation
     */
    public function getReservationById($id)
    {
        return $this->entityManager->getRepository(Reservation::class)->findOneById($id);
    }
    
    /**
     * @param Room $room
     * @param \DateTime $day
     * 
     * @return int
     */
    public function getNbReservationsByRoomAndDay($room, $day)
    {
        return $this->entityManager->getRepository(Reservation::class)->getNbReservationsByRoomAndDay($room, $day);
    }
    
    /**
     * @param Room $room
     * @param \DateTime $day
     * 
     * @return Reservation[]
     */
    public function getReservationsByRoomAndDay($room, $day)
    {
        return $this->entityManager->getRepository(Reservation::class)->getReservationsByRoomAndDay($room, $day);
    }
    
    /**
     * @param \DateTime $day
     * 
     * @return Reservation[]
     */
    public function getReservationsByDay($day)
    {
        return $this->entityManager->getRepository(Reservation::class)->getReservationsByDay($day);
    }
    
    
    /**
     * @param User $user
     * 
     * @return Reservation[]
     */
    public function getReservationsByUser($user)
    {
        return $this->entityManager->getRepository(Reservation::class)->getReservationsByUser($user);
    }
    
    /**
     * @param User $user
     * 
     * @return Reservation[]
     */
    public function getFutureReservationsByUser($user)
    {
        return $this->entityManager->getRepository(Reservation::class)->getFutureReservationsByUser($user);
    }
    
    
    /**
     * @param \DateTime $hour
     * 
     * @return Reservation[]
     */
    protected function getReservationsBySlotHours($hourBegin, $hourEnd)
    {
        return $this->entityManager->getRepository(Reservation::class)->getReservationsBySlotHour($hourBegin, $hourEnd);
    }
    
    
    


    /**
     * @param User $user
     * 
     * @return Reservation
     */
    public function create(User $user)
    {
        $reservation = new Reservation();
        $reservation->setUser($user);
        
        return $reservation;
    }
    



    /**
     * @return \AppBundle\Repository\ReservationRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(Reservation::class);
    }
    
}
