<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AppBundle\Entity\Room;
use AppBundle\Entity\Reservation;

use AppBundle\Utils\Day;

class FrontController extends Controller
{
    /**
     * @Route("/", name="front_homepage")
     */
    public function indexAction(Request $request)
    {
        
        return $this->render(':front:index.html.twig', [
            
        ]);
        
    }
    
    
    
    /**
     * @Route("/planning", name="front_planning")
     */
    public function planningAction(Request $request)
    {
        $dateTimesManager   = $this->get('app.datetimes_manager');
        $roomManager        = $this->get('app.room_manager');
        
        $month      = new \Datetime();
        $month->modify('first day of this month');
        $prevMonth  = $dateTimesManager->getPrevMonth($month);
        $nextMonth  = $dateTimesManager->getNextMonth($month);
        
        $room = $roomManager->getRandomRoom();
        
        $reservations = $this->get('app.reservation_manager')->getFutureReservationsByRoomAndMonth($room[0], $month);
        
        // Nous avons besoin du lundi précédent le mois et du dimanche suivant
        // le mois. pour ensuite récupérer les jours entre ces deux dates.
        $firstDayWeekBeforeMonth    = $dateTimesManager->getFirstDayWeekBeforeCurrentMonth();
        $lastDayWeekAfterMonth      = $dateTimesManager->getLastDayWeekAfterCurrentMonth();
        
        $interval   = \DateInterval::createFromDateString('1 day');
        $period     = new \DatePeriod($firstDayWeekBeforeMonth, $interval, $lastDayWeekAfterMonth->modify('+1 day')); // ->modify('+1 day') : Pour inclure le dernier jour de l'interval
        
        // Nous allons créer et remplir notre tableau des jours à afficher
        $days = [];
        foreach ($period as $dt){
            $reservationsDuJour = [];
            foreach ($reservations as $reservation){
                // Si la date de la réservation en cours égale le jour bouclé
                if($reservation->getDate() == $dt){
                    $reservationsDuJour[] = $reservation;
                }
            }
            $days[] = new Day($dt, $reservationsDuJour);
        }
        
        $allRooms       = $roomManager->getAll();
        
        return $this->render(':front:calendar_room_month.html.twig', [
            'room'      => $room[0],
            'days'      => $days,
            'month'     => $month,
            'prevMonth' => $prevMonth,
            'nextMonth' => $nextMonth,
            'allRooms'  => $allRooms,
        ]);
    }
    
    
    /**
     * @Route("/planning/{roomSlug}/{month}", name="front_planning_room_month")
     */
    public function planningByRoomAndMonthAction(Request $request, $roomSlug, $month)
    {
        $dateTimesManager   = $this->get('app.datetimes_manager');
        $roomManager        = $this->get('app.room_manager');
        
        // A voir si on arrive a faire passer seulement année-mois (ex: "2018-05") dans l'url..
        $month      = new \Datetime($month);
        
        $prevMonth  = $dateTimesManager->getPrevMonth($month);
        $nextMonth  = $dateTimesManager->getNextMonth($month);
        
        $room = $roomManager->getRoomBySlug($roomSlug);
        
        $reservations = $this->get('app.reservation_manager')->getFutureReservationsByRoomAndMonth($room, $month);
        
        // Nous avons besoin du lundi précédent le mois et du dimanche suivant
        // le mois. pour ensuite récupérer les jours entre ces deux dates.
        $firstDayWeekBeforeMonth    = $dateTimesManager->getFirstDayWeekBeforeMonth($month);
        $lastDayWeekAfterMonth      = $dateTimesManager->getLastDayWeekAfterMonth($month);
        //var_dump($firstDayWeekBeforeMonth, $lastDayWeekAfterMonth);die;
        $interval = \DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($firstDayWeekBeforeMonth, $interval, $lastDayWeekAfterMonth->modify('+1 day')); // ->modify('+1 day') : Pour inclure le dernier jour de l'interval
        
        // Nous allons créer et remplir notre tableau des jours à afficher
        $days = [];
        foreach ($period as $dt){
            $reservationsDuJour = [];
            foreach ($reservations as $reservation){
                // Si la date de la réservation en cours égale le jour bouclé
                if($reservation->getDate() == $dt){
                    $reservationsDuJour[] = $reservation;
                }
            }
            $days[] = new Day($dt, $reservationsDuJour);
        }
        
        $allRooms       = $roomManager->getAll();
        
        return $this->render(':front:calendar_room_month.html.twig', [
            'room'      => $room,
            'days'      => $days,
            'month'     => $month,
            'prevMonth' => $prevMonth,
            'nextMonth' => $nextMonth,
            'allRooms'  => $allRooms,
        ]);
    }
    
    
    /**
     * @Route("/my-reservations", name="front_myreservations")
     * 
     * @Security("has_role('ROLE_USER')")
     */
    public function myReservationsAction(Request $request)
    {
        $myReservations = $this->get('app.reservation_manager')->getFutureReservationsByUser($this->getUser());
        
        return $this->render(':front:my_reservations.html.twig', [
            'myReservations' => $myReservations,
        ]);
    }
    
    
    /**
     * @Route("/room/{roomSlug}/{date}", name="front_reservations_room_date")
     */
    public function reservationsByRoomAndDateAction(Request $request, $roomSlug, \DateTime $date)
    {
        $roomManager = $this->get('app.room_manager');
        
        $room           = $roomManager->getRoomBySlug($roomSlug);
        $reservations   = $this->get('app.reservation_manager')->getReservationsByRoomAndDay($room, $date);
        
        $allRooms       = $roomManager->getAll();
        
        return $this->render(':front:reservations_room_date.html.twig', [
            'room'          => $room,
            'reservations'  => $reservations,
            'date'          => $date,
            'allRooms'      => $allRooms,
        ]);
    }
    
    
}
