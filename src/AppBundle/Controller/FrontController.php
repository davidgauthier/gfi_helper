<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AppBundle\Entity\Room;
use AppBundle\Entity\Reservation;

class FrontController extends Controller
{
    
    /**
     * @Route("/", name="front_homepage")
     */
    public function indexAction(Request $request)
    {
//        $result = $this->getDoctrine()->getRepository(Reservation::class)
//            ->createQueryBuilder('r')
//            ->select('r.id, r.dateBegin, r.dateEnd, r.user, r.room, MONTH(r.dateBegin) AS rDateBeginMonth, DAY(r.dateBegin) AS rDateBeginDay')
//            ->where('r.dateBegin IS NOT NULL')
//            ->groupBy('rDateBeginMonth')
//            ->addGroupBy('rDateBeginDay')
//            ->getQuery()
//            ->getResult();
//        var_dump($result);die;
        // ---------------------------------------------------------------------------------------------
        
        $rooms          = $this->getDoctrine()->getRepository(Room::class)->findAll();
        $reservations   = $this->getDoctrine()->getRepository(Reservation::class)->findAll();
        //$reservations = $this->getDoctrine()->getRepository(Reservation::class)->getReservationsOfAYearMonth(new \DateTime());
        
        
//        foreach ($rooms as $room){
//            $reservations   = $this->getDoctrine()->getRepository(Reservation::class)->getFutureReservationsByRoom($room);
//            var_dump($reservations);die;
//        }
        
        
        // Nous avons besoin du lundi précédant le mois actuel et du dimanche suivant
        // le mois actuel. pour ensuite récupérer les jours entre ces deux dates.
        $firstDayWeekBeforeCurrentMonth = $this->get('app.datetimes_manager')->getFirstDayWeekBeforeCurrentMonth();
        $lastDayWeekAfterCurrentMonth   = $this->get('app.datetimes_manager')->getLastDayWeekAfterCurrentMonth();
        
        // Nous allons créer et remplir notre tableau des jours à afficher
        $jours = [];
        $compteurJours = $firstDayWeekBeforeCurrentMonth;
        while($compteurJours <= $lastDayWeekAfterCurrentMonth){
            $jours[]              = new \DateTime($compteurJours->format('Y-m-d 00:00:00'));
            //$jours['nbReservations']    = $this->getDoctrine()->getRepository(Reservation::class)->getNbReservationsByRoomAndDay($room, $now);
            $compteurJours  = $compteurJours->modify('+1 day');
        }
        
        // replace this example code with whatever you need
        return $this->render('front/index.html.twig', [
            'rooms'         => $rooms,
            'reservations'  => $reservations,
            'jours'         => $jours,
        ]);
    }
    
    
    /**
     * @Route("/my-reservations", name="front_myreservations")
     * 
     * @Security("has_role('ROLE_USER')")
     */
    public function myReservationsAction(Request $request)
    {
        $myReservations = $this->get('app.reservation_manager')->getReservationsByUser($this->getUser());
        
        return $this->render(':front:my_reservations.html.twig', [
            'myReservations' => $myReservations,
        ]);
    }
    
    
}
