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
     * var EntityManager
     * @var ReservationManager
     */
//    protected $em;
    protected $reservationManager;
    
//    public function __construct(EntityManagerInterface $entityManager)
    public function __construct(ReservationManager $reservationManager)
    {
//        $this->em = $entityManager;
        $this->reservationManager = $reservationManager;
    }
   
    public function validate($reservation, Constraint $constraint)
    {
//        var_dump($this->em);die;
//        var_dump($this->reservationManager);die;

        $reservations = $this->reservationManager
//        $nbReservations = $this->em->getRepository(Reservation::class)
                                ->getReservationsByRoomAndSlotHours($reservation->getRoom(),
                                                            $reservation->getDate(),
                                                            $reservation->getTimeBegin(),
                                                            $reservation->getTimeEnd());
        //var_dump($nbReservations);die;
        $reservationsFiltered = [];
        foreach ($reservations as $r) {
            // Pour exclure celle qu'on est en train d'éditer, si édition
            if($r->getId() !== $reservation->getId()) {
                $reservationsFiltered[] = $r;
            }
        }
        $nbReservations = count($reservationsFiltered);
        if($nbReservations > 0){

            $this->context->buildViolation($constraint->message)
                ->setParameter('{{reservations}}', ($nbReservations>1) ? $nbReservations.' réservations': $nbReservations.' réservation')
                ->setParameter('{{room}}', $reservation->getRoom()->getName())
                ->setParameter('{{date}}', $reservation->getDate()->format('d/m/Y'))
                ->setParameter('{{timeBegin}}', $reservation->getTimeBegin()->format('H:i'))
                ->setParameter('{{timeEnd}}', $reservation->getTimeEnd()->format('H:i'))
                //->atPath('foo')
                ->addViolation();
        }

    }

}
