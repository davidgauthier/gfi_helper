<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AppBundle\Entity\Reservation;

class FrontController extends Controller
{
    
    /**
     * @Route("/", name="front_homepage")
     */
    public function indexAction(Request $request)
    {
        $reservations = $this->getDoctrine()->getRepository(Reservation::class)->findAll();
        
        //$reservations = $this->getDoctrine()->getRepository(Reservation::class)->getReservationsOfAYearMonth(new \DateTime());
        
        // replace this example code with whatever you need
        return $this->render('front/index.html.twig', [
            'reservations' => $reservations,
        ]);
    }
    
    
    /**
     * @Route("/my-reservations", name="front_myreservations")
     * 
     * @Security("has_role('ROLE_USER')")
     */
    public function myReservationsAction(Request $request)
    {
        $user           = $this->getUser();
        $entityManager  = $this->getDoctrine()->getManager();
        $myReservations = $entityManager->getRepository(Reservation::class)->getReservationsByUser($user);
        
        return $this->render(':front:my_reservations.html.twig', [
            'myReservations' => $myReservations,
        ]);
    }
    
    
}
