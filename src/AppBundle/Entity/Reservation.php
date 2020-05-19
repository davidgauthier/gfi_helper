<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Gedmo\Mapping\Annotation as Gedmo;

use AppBundle\Validator\Constraints as CustomAssert;

/**
 * Reservation
 * 
 * @CustomAssert\TimeSlotIsFree
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var text
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;
    
    
    /**
     * nbCreneaux
     */
    private $nbCreneaux;

    /**
     * updatedAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
    
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
    
    /**
     * Set ccomment
     *
     * @param string $comment
     *
     * @return Reservation
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
    
    

    /**
     * Set nb creneaux.
     *
     * @param int $nbCreneaux
     *
     * @return Reservation
     */
    public function setNbCreneaux($nbCreneaux)
    {
        $this->nbCreneaux = $nbCreneaux;

        return $this;
    }
    /**
     * @return int
     */
    public function getNbCreneaux()
    {
        return $this->nbCreneaux;
    }


    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    
    /**
     * Get nombre de "créneaux" (ici, 30minutes le créneau).
     * (A voir comment passer le 30min en param de l'appli modifiable à 15min, etc.)
     * 
     * @ORM\PostLoad
     */
    public function doStuffOnPostLoad()
    {
        $nbMinutesCreneau = 30;
        
        $this->nbCreneaux = 0;
        
        // Construisoin deux DateTime pour pouvoir les comparer (DateInterval, DatePeriod)
        $stringDebut    = $this->date->format('Y-m-d')." ".$this->timeBegin->format("H:i:s");
        $stringFin      = $this->date->format('Y-m-d')." ".$this->timeEnd->format("H:i:s");
        $datetimeDebut  = new \DateTime($stringDebut);
        $datetimeFin    = new \DateTime($stringFin);
        
        //var_dump($stringDebut, $stringFin, $datetimeDebut, $datetimeFin);die;
        
        $interval = \DateInterval::createFromDateString($nbMinutesCreneau.' minutes');
        $period = new \DatePeriod($datetimeDebut,
                $interval,
                $datetimeFin);
        
        foreach ($period as $dt){
            // rien a faire avec $dt.. :)
            $this->nbCreneaux++;
        }
    }
    
    
    /**
     * Methode toString
     * 
     * @return String
     */
    public function __toString(){
        if(!$this->user || !$this->room){
            $s = '';
        } else {
            $s = $this->user->getusername() . '_' . $this->room->getName() . '_' . $this->date->format('d/m/Y')
                . '(' . $this->timeBegin->format('H:i') . '->' . $this->timeEnd->format('H:i') . ')';
        }
        
        return $s;
    }
    
}

