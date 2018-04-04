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
        
        $rooms          = $this->getDoctrine()->getRepository(Room::class)->findAll();
        $reservations   = $this->getDoctrine()->getRepository(Reservation::class)->findAll();

        // Nous avons besoin du lundi précédent le mois actuel et du dimanche suivant
        // le mois actuel. pour ensuite récupérer les jours entre ces deux dates.
        $firstDayWeekBeforeCurrentMonth = $this->get('app.datetimes_manager')->getFirstDayWeekBeforeCurrentMonth();
        $lastDayWeekAfterCurrentMonth   = $this->get('app.datetimes_manager')->getLastDayWeekAfterCurrentMonth();
        
        // Nous allons créer et remplir notre tableau des jours à afficher
        $jours = [];
        $compteurJours = $firstDayWeekBeforeCurrentMonth;
        while($compteurJours <= $lastDayWeekAfterCurrentMonth){
            $jours[]        = new \DateTime($compteurJours->format('Y-m-d'));
            $compteurJours  = $compteurJours->modify('+1 day');
        }
        
        return $this->render('front/index.html.twig', [
            'rooms'         => $rooms,
            'reservations'  => $reservations,
            'days'          => $jours,
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
