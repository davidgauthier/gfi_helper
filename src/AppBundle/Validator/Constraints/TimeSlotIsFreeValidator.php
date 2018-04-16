<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Manager\ReservationManager;

use AppBundle\Entity\Reservation;

class TimeSlotIsFreeValidator extends ConstraintValidator
{
    /**
     * @var EntityManager
     */
    protected $em;
//    protected $reservationManager;
    
    public function __construct(EntityManagerInterface $entityManager)
//    public function __construct(ReservationManager $reservationManager)
    {
        $this->em = $entityManager;
//        $this->reservationManager = $reservationManager;
    }
   
    public function validate($reservation, Constraint $constraint)
    {
//        var_dump($this->em);die;
//        var_dump($this->reservationManager);die;
        
        $reservations = $this->em->getRepository(Reservation::class)
                                ->getReservationsBySlotHours($reservation->getDate(),
                                                            $reservation->getTimeBegin(),
                                                            $reservation->getTimeEnd());
        var_dump("les reservations:", $reservations);die;
        
        if ($protocol->getFoo() != $protocol->getBar()) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ timeBegin }}', $value1)
                ->setParameter('{{ timeEnd }}', $value2)
                //->atPath('foo')
                ->addViolation();
        }
    }
}
