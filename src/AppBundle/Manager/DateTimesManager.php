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
        $now = new \DateTime();
        return $this->getFirstDayWeekBeforeMonth($now);
    }
    
    /**
     * @param \DateTime $month
     * 
     * @return \DateTime
     */
    public function getFirstDayOfMonth($month)
    {
        return new \DateTime($month->format('Y-m-01 00:00:00'));
    }
    /**
     * @param \DateTime $month
     * 
     * @return \DateTime
     */
    public function getFirstDayWeekBeforeMonth($month)
    {
        $firstDayWeekBeforeMonth = new \DateTime($this->getFirstDayOfMonth($month)->format('Y-m-d 00:00:00'));
        
        switch ($firstDayWeekBeforeMonth->format('w')){
            case 0: // Dimanche
                $firstDayWeekBeforeMonth->modify('-6 day');break;
            case 1: // Lundi
                $firstDayWeekBeforeMonth->modify('+0 day');break;
            case 2: // Mardi
                $firstDayWeekBeforeMonth->modify('-1 day');break;
            case 3: // Mercredi
                $firstDayWeekBeforeMonth->modify('-2 day');break;
            case 4: // Jeudi
                $firstDayWeekBeforeMonth->modify('-3 day');break;
            case 5: // Vendredi
                $firstDayWeekBeforeMonth->modify('-4 day');break;
            case 6: // Samedi
                $firstDayWeekBeforeMonth->modify('-5 day');break;
        }
        return $firstDayWeekBeforeMonth;
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
        $now = new \DateTime();
        return $this->getLastDayWeekAfterMonth($now);
    }
    
    /**
     * @param \DateTime $month
     * 
     * @return \DateTime
     */
    public function getLastDayOfMonth($month)
    {
        return new \DateTime($month->format('Y-m-t 00:00:00'));
    }
    /**
     * @param \DateTime $month
     * 
     * @return \DateTime
     */
    public function getLastDayWeekAfterMonth($month)
    {
        $lastDayWeekAfterMonth = new \DateTime($this->getLastDayOfMonth($month)->format('Y-m-d 00:00:00'));
        
        switch ($lastDayWeekAfterMonth->format('w')){
            case 0: // Dimanche
                $lastDayWeekAfterMonth->modify('+0 day');break;
            case 1: // Lundi
                $lastDayWeekAfterMonth->modify('+6 day');break;
            case 2: // Mardi
                $lastDayWeekAfterMonth->modify('+5 day');break;
            case 3: // Mercredi
                $lastDayWeekAfterMonth->modify('+4 day');break;
            case 4: // Jeudi
                $lastDayWeekAfterMonth->modify('+3 day');break;
            case 5: // Vendredi
                $lastDayWeekAfterMonth->modify('+2 day');break;
            case 6: // Samedi
                $lastDayWeekAfterMonth->modify('+1 day');break;
        }
        return $lastDayWeekAfterMonth;
    }
    
    
    
    /**
     * @return \DateTime
     */
    public function getCurrentHour()
    {
        $now = new \DateTime();
        return new \DateTime($now->format('Y-m-d h:00:00'));
    }
    
    
    
    
    /**
     * @param \DateTime $month
     * 
     * @return \DateTime
     */
    public function getPrevMonth($month)
    {
        $prevMonth = new \DateTime($month->format('Y-m-d'));
        $prevMonth->modify('-1 day');
        $prevMonth->modify('first day of this month');
        
        return $prevMonth;
    }
    /**
     * @param \DateTime $month
     * 
     * @return \DateTime
     */
    public function getNextMonth($month)
    {
        $nextMonth = new \DateTime($month->format('Y-m-d'));
        $nextMonth->modify('last day of this month');
        $nextMonth->modify('+1 day');
        
        return $nextMonth;
    }

    /**
     * @param \DateTime $date
     *
     * @return boolean
     */
    public function isDayWeekend($date)
    {
        if($date->format('w') === '0' || $date->format('w') === '6'){
            return true;
        }
        return false;
    }

    /**
     * @param \DateTime $date
     *
     * @return \DateTime
     */
    public function getNextMonday($date)
    {
        return $date->modify('next monday');
    }
    
    
    
}