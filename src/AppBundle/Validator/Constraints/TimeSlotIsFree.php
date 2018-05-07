<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class TimeSlotIsFree extends Constraint
{
    public $message = 'Il y à {{nbReservations}} réservation(s) en conflit avec votre créneau (le {{date}} de {{timeBegin}} à {{timeEnd}} pour la salle {{room}}).';
    
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
    
    public function validatedBy()
    {
        return 'app.reservation_validator.time_slot_is_free';
    }
}
