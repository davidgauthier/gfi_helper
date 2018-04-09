<?php

namespace AppBundle\Utils;

use AppBundle\Entity\Reservation;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Day
 */
class Day
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var Reservation[]
     */
    private $reservations = [];
    
    
    
    public function __construct($date, $reservations)
    {
//        if(null === $date){
//            $date = new \DateTime();
//        }
        $this->date         = $date;
        $this->reservations = $reservations;
    }
    
    
    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Day
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Get reservations
     *
     * @return ArrayCollection
     */
    public function getReservations()
    {
        return $this->reservations;
    }
}

