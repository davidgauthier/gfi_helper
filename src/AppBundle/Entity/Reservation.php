<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use AppBundle\Validator\Constraints as CustomAssert;

/**
 * Reservation
 * 
 * @CustomAssert\TimeSlotIsFree
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @var \DateTime
     * 
     * @Assert\NotBlank()
     * @Assert\DateTime()
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @var \DateTime
     *
     * @Assert\NotBlank()
     * @Assert\Time()
     *
     * @ORM\Column(name="time_begin", type="time")
     */
    private $timeBegin;
    
    /**
     * @var \DateTime
     *
     * @Assert\NotBlank()
     * @Assert\Time()
     *
     * @ORM\Column(name="time_end", type="time")
     */
    private $timeEnd;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    
    /**
     * @Assert\NotBlank()
     * 
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Room")
     * @ORM\JoinColumn(nullable=false)
     */
    private $room;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Reservation
     */
    public function setDate(\DateTime $date)
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
     * Set timeBegin
     *
     * @param \DateTime $timeBegin
     *
     * @return Reservation
     */
    public function setTimeBegin(\DateTime $timeBegin)
    {
        $this->timeBegin = $timeBegin;
        
        return $this;
    }
    
    /**
     * Get timeBegin
     *
     * @return \DateTime
     */
    public function getTimeBegin()
    {
        return $this->timeBegin;
    }
    
    /**
     * Set timeEnd
     *
     * @param \DateTime $timeEnd
     *
     * @return Reservation
     */
    public function setTimeEnd(\DateTime $timeEnd)
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    /**
     * Get timeEnd
     *
     * @return \DateTime
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }
    
    /**
     * Set user.
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Reservation
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set room.
     *
     * @param \AppBundle\Entity\Room $room
     *
     * @return Reservation
     */
    public function setRoom(\AppBundle\Entity\Room $room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room.
     *
     * @return \AppBundle\Entity\Room
     */
    public function getRoom()
    {
        return $this->room;
    }
}

