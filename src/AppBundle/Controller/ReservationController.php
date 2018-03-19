<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Reservation;
use AppBundle\Form\ReservationType;

class ReservationController extends Controller
{
    /**
     * @Route("/reservation/new", name="app_reservation_new")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(ReservationType::class, new Reservation());
        
        // Nous associons les données soumises à notre form grâce à handleRequest(), 
        // ce qui va mettre à jour également notre objet et le valider.
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            
            $reservation = $form->getData();
            
            $reservation->setUser($this->getUser());
            
            $entityManager->persist($reservation);
            $entityManager->flush();
            
            return $this->redirectToRoute('app_homepage');
        }
        
        return $this->render(':reservation:new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    
}
