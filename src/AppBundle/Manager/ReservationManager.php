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
     * @param \DateTime $date
     * @param \DateTime $timeBegin
     * @param \DateTime $timeEnd
     * 
     * @return int
     */
    public function getNbReservationsBySlotHours($date, $timeBegin, $timeEnd)
    {
        return $this->entityManager->getRepository(Reservation::class)->getNbReservationsBySlotHours($date, $timeBegin, $timeEnd);
    }
    
    /**
     * @param \DateTime $date
     * @param \DateTime $timeBegin
     * @param \DateTime $timeEnd
     * 
     * @return Reservation[]
     */
    public function getReservationsBySlotHours($date, $timeBegin, $timeEnd)
    {
        return $this->entityManager->getRepository(Reservation::class)->getReservationsBySlotHour($date, $timeBegin, $timeEnd);
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
