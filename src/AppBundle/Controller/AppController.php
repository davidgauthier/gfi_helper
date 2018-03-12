<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Reservation;

class AppController extends Controller
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function indexAction(Request $request)
    {
        
        $reservations = $this->getDoctrine()->getRepository(Reservation::class)->findAll();

        
        
        // replace this example code with whatever you need
        return $this->render('front/index.html.twig', [
            'reservations' => $reservations,
        ]);
    }
    
    
}
