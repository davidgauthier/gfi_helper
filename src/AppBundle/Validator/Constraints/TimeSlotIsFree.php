<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class TimeSlotIsFree extends Constraint
{
    public $message = 'L\'heure de début "{{ timeBegin }}" et/ou l\'heure de fin "{{ timeEnd }}" de la réservation ..blabla..blabla..';
    
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
    
    public function validatedBy()
    {
        return 'app.reservation_validator.time_slot_is_free';
    }
}
