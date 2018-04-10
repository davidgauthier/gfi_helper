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
        $dateTimesManager   = $this->get('app.datetimes_manager');
        $reservationManager = $this->get('app.reservation_manager');
        
        $rooms          = $this->getDoctrine()->getRepository(Room::class)->findAll();
//        $reservations   = $this->getDoctrine()->getRepository(Reservation::class)->findAll();

        // Nous avons besoin du lundi précédent le mois actuel et du dimanche suivant
        // le mois actuel. pour ensuite récupérer les jours entre ces deux dates.
        $firstDayWeekBeforeCurrentMonth = $dateTimesManager->getFirstDayWeekBeforeCurrentMonth();
        $lastDayWeekAfterCurrentMonth   = $dateTimesManager->getLastDayWeekAfterCurrentMonth();
        
        $interval = \DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($firstDayWeekBeforeCurrentMonth,
                $interval,
                $lastDayWeekAfterCurrentMonth->modify('+1 day')); // ->modify('+1 day') : Pour inclure le dernier jour de l'interval
        
        
        foreach ($rooms as $room){
        
            // Nous allons créer et remplir notre tableau des jours à afficher
            $days = [];
            foreach ($period as $dt){
                $reservationsDuJour = $reservationManager->getReservationsByRoomAndDay($room, $dt);
                $days[] = new Day($dt, $reservationsDuJour);
            }
            
            $room->setDays($days);
        }
        
        return $this->render('front/index.html.twig', [
            'rooms'         => $rooms,
//            'reservations'  => $reservations,
//            'days'          => $days,
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
        $room           = $this->get('app.room_manager')->getRoomBySlug($roomSlug);
        $reservations   = $this->get('app.reservation_manager')->getReservationsByRoomAndDay($room, $date);
        
        return $this->render(':front:reservations_room_date.html.twig', [
            'room'          => $room,
            'reservations'  => $reservations,
            'date'          => $date
        ]);
    }
    
    
}
