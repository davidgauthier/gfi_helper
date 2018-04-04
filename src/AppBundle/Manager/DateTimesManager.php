<?php

namespace AppBundle\Manager;



class DateTimesManager
{
    /**
     * @return \DateTime
     */
    public function getFirstDayOfCurrentMonth()
    {
        $now = new \DateTime();
        return new \DateTime($now->format('Y-m-01 00:00:00'));
    }
    /**
     * @return \DateTime
     */
    public function getFirstDayWeekBeforeCurrentMonth()
    {
        $firstDayWeekBeforeCurrentMonth = new \DateTime($this->getFirstDayOfCurrentMonth()->format('Y-m-d 00:00:00'));
        
        switch ($firstDayWeekBeforeCurrentMonth->format('w')){
            case 0: // Dimanche
                $firstDayWeekBeforeCurrentMonth->modify('-6 day');break;
            case 1: // Lundi
                $firstDayWeekBeforeCurrentMonth->modify('+0 day');break;
            case 2: // Mardi
                $firstDayWeekBeforeCurrentMonth->modify('-1 day');break;
            case 3: // Mercredi
                $firstDayWeekBeforeCurrentMonth->modify('-2 day');break;
            case 4: // Jeudi
                $firstDayWeekBeforeCurrentMonth->modify('-3 day');break;
            case 5: // Vendredi
                $firstDayWeekBeforeCurrentMonth->modify('-4 day');break;
            case 6: // Samedi
                $firstDayWeekBeforeCurrentMonth->modify('-5 day');break;
        }
        return $firstDayWeekBeforeCurrentMonth;
    }
    
    
    /**
     * @return \DateTime
     */
    public function getLastDayOfCurrentMonth()
    {
        $now = new \DateTime();
        return new \DateTime($now->format('Y-m-t 00:00:00'));
    }
    /**
     * @return \DateTime
     */
    public function getLastDayWeekAfterCurrentMonth()
    {
        $lastDayWeekAfterCurrentMonth = new \DateTime($this->getLastDayOfCurrentMonth()->format('Y-m-d 00:00:00'));
        
        switch ($lastDayWeekAfterCurrentMonth->format('w')){
            case 0: // Dimanche
                $lastDayWeekAfterCurrentMonth->modify('+0 day');break;
            case 1: // Lundi
                $lastDayWeekAfterCurrentMonth->modify('+6 day');break;
            case 2: // Mardi
                $lastDayWeekAfterCurrentMonth->modify('+5 day');break;
            case 3: // Mercredi
                $lastDayWeekAfterCurrentMonth->modify('+4 day');break;
            case 4: // Jeudi
                $lastDayWeekAfterCurrentMonth->modify('+3 day');break;
            case 5: // Vendredi
                $lastDayWeekAfterCurrentMonth->modify('+2 day');break;
            case 6: // Samedi
                $lastDayWeekAfterCurrentMonth->modify('+1 day');break;
        }
        return $lastDayWeekAfterCurrentMonth;
    }
    
    
    
    
    /**
     * @return \DateTime
     */
    public function getCurrentHour()
    {
        $now = new \DateTime();
        return new \DateTime($now->format('Y-m-d h:00:00'));
    }
    
    
    
}