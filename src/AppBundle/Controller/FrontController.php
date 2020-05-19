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
        $today = new \Datetime();
        $nxtMonday = new \Datetime();
        $nxtTuesday = new \Datetime();
        $nxtWednesday = new \Datetime();
        $nxtThursday = new \Datetime();
        $nxtFriday = new \Datetime();
        $nxtMonday->modify('next Monday');
        $nxtTuesday->modify('next Tuesday');
        $nxtWednesday->modify('next Wednesday');
        $nxtThursday->modify('next Thursday');
        $nxtFriday->modify('next Friday');

//        var_dump($today);
//        var_dump("toto");
//        var_dump($nxtMonday, $nxtTuesday, $nxtWednesday, $nxtThursday, $nxtFriday);die;

        $ville = $this->container->getParameter('openweathermap_api_city');
        
        return $this->render(':front:index.html.twig', [
            'ville' => $ville,
        ]);
        
    }
    
    
    
    /**
     * @Route("/planning", name="front_planning")
     */
    public function planningAction(Request $request)
    {
        // Pour test la fixture .... [A SUPPR]
//        $nxtFridayPlusSeven         = new \Datetime();
//        $azerty1                    = new \Datetime();
//        $nxtFridayPlusFourteen      = new \Datetime();
//        $nxtFridayPlusSeven->modify('next Friday')->modify('+7 days');
//        $azerty1->modify('next Friday')->modify('+10 days');
//        $nxtFridayPlusFourteen->modify('next Friday')->modify('+14 days');
//        // a
//        var_dump($nxtFridayPlusSeven, $azerty1, $nxtFridayPlusFourteen);die;

        $dateTimesManager   = $this->get('app.datetimes_manager');
        $roomManager        = $this->get('app.room_manager');

        $openweathermapService      = $this->get('app.openweathermap');
        $fiveDaysForecastWeather    = $openweathermapService->getFiveDaysForecastWeather();

        
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

                if($reservation->getDate()->format('Y-m-d') == $dt->format('Y-m-d')){
                    //$reservationsDuJour[] = $reservation;
                    array_push($reservationsDuJour, $reservation);
                }
            }
            $days[] = new Day($dt, $reservationsDuJour);
            unset($reservationsDuJour);
        }
        
        $allRooms       = $roomManager->getAll();
        
        return $this->render(':front:calendar_room_month.html.twig', [
            'room'      => $room[0],
            'days'      => $days,
            'reservations' => $reservations,
            'month'     => $month,
            'prevMonth' => $prevMonth,
            'nextMonth' => $nextMonth,
            'allRooms'  => $allRooms,
            'fiveDaysForecastWeather0' => array_slice($fiveDaysForecastWeather, 0, 8),
            'fiveDaysForecastWeather1' => array_slice($fiveDaysForecastWeather, 8, 8),
            'fiveDaysForecastWeather2' => array_slice($fiveDaysForecastWeather, 16, 8),
            'fiveDaysForecastWeather3' => array_slice($fiveDaysForecastWeather, 24, 8),
            'fiveDaysForecastWeather4' => array_slice($fiveDaysForecastWeather, 32, 8),
        ]);
    }
    
    
    /**
     * @Route("/planning/{roomSlug}/{month}", name="front_planning_room_month")
     */
    public function planningByRoomAndMonthAction(Request $request, $roomSlug, $month)
    {
        $dateTimesManager   = $this->get('app.datetimes_manager');
        $roomManager        = $this->get('app.room_manager');

        $openweathermapService      = $this->get('app.openweathermap');
        $fiveDaysForecastWeather    = $openweathermapService->getFiveDaysForecastWeather();


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
                if($reservation->getDate()->format('Y-m-d') == $dt->format('Y-m-d')){
                    $reservationsDuJour[] = $reservation;
                }
            }
            $days[] = new Day($dt, $reservationsDuJour);
        }
        
        $allRooms       = $roomManager->getAll();
        
        return $this->render(':front:calendar_room_month.html.twig', [
            'room'      => $room,
            'days'      => $days,
            'reservations' => $reservations,
            'month'     => $month,
            'prevMonth' => $prevMonth,
            'nextMonth' => $nextMonth,
            'allRooms'  => $allRooms,
            'fiveDaysForecastWeather0' => array_slice($fiveDaysForecastWeather, 0, 8),
            'fiveDaysForecastWeather1' => array_slice($fiveDaysForecastWeather, 8, 8),
            'fiveDaysForecastWeather2' => array_slice($fiveDaysForecastWeather, 16, 8),
            'fiveDaysForecastWeather3' => array_slice($fiveDaysForecastWeather, 24, 8),
            'fiveDaysForecastWeather4' => array_slice($fiveDaysForecastWeather, 32, 8),
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


    /**
     * @Route("/weather", name="front_weather")
     *
     */
    public function weatherAction(Request $request)
    {
        $openweathermapService      = $this->get('app.openweathermap');
        $currentWeather             = $openweathermapService->getCurrentWeather();

        $ville = $this->container->getParameter('openweathermap_api_city');

        return $this->render(':front:weather.html.twig', [
            'currentWeather'    => $currentWeather,
            'ville'             => $ville,
        ]);
    }

    
    
}
