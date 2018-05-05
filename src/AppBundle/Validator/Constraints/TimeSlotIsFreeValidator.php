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
        
        $nbReservations = $this->reservationManager
//        $nbReservations = $this->em->getRepository(Reservation::class)
                                ->getNbReservationsByRoomAndSlotHours($reservation->getRoom(),
                                                            $reservation->getDate(),
                                                            $reservation->getTimeBegin(),
                                                            $reservation->getTimeEnd());
        // S'il y à une et une seule réservation, nous
        // allons vérifier le cas d'une édition ..
        if ($nbReservations == 1) {
            $laReservation = $this->reservationManager
                                ->getReservationsByRoomAndSlotHours($reservation->getRoom(),
                                                            $reservation->getDate(),
                                                            $reservation->getTimeBegin(),
                                                            $reservation->getTimeEnd());
            // $laReservation est un array, nous accèdons donc à l'objet Reservation avec '[0]'
            // Si résas différentes, donc pas edition, error
            if($laReservation[0]->getId() !== $reservation->getId()){
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{nbReservations}}', $nbReservations)
                    ->setParameter('{{room}}', $reservation->getRoom()->getName())
                    ->setParameter('{{date}}', $reservation->getDate()->format('d/m/Y'))
                    ->setParameter('{{timeBegin}}', $reservation->getTimeBegin()->format('H:i:s'))
                    ->setParameter('{{timeEnd}}', $reservation->getTimeEnd()->format('H:i:s'))
                    //->atPath('foo')
                    ->addViolation();
            }
        }
        // Sinon s'il y à au moins 2 reservations, error
        else if ($nbReservations >= 2) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{nbReservations}}', $nbReservations)
                ->setParameter('{{room}}', $reservation->getRoom()->getName())
                ->setParameter('{{date}}', $reservation->getDate()->format('d/m/Y'))
                ->setParameter('{{timeBegin}}', $reservation->getTimeBegin()->format('H:i:s'))
                ->setParameter('{{timeEnd}}', $reservation->getTimeEnd()->format('H:i:s'))
                //->atPath('foo')
                ->addViolation();
        }
    }
}
