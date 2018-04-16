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
        
        $nbReservations = $this->em->getRepository(Reservation::class)
                                ->getNbReservationsBySlotHours($reservation->getDate(),
                                                            $reservation->getTimeBegin(),
                                                            $reservation->getTimeEnd());
        //var_dump("les reservations:", $reservations);die;
        
        // S'il y à au moins 1 reservation, error
        if ($nbReservations > 0) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{nbReservations}}', $nbReservations)
                ->setParameter('{{date}}', $reservation->getDate()->format('d/m/Y'))
                ->setParameter('{{timeBegin}}', $reservation->getTimeBegin()->format('H:i:s'))
                ->setParameter('{{timeEnd}}', $reservation->getTimeEnd()->format('H:i:s'))
                //->atPath('foo')
                ->addViolation();
        }
    }
}
