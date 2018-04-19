<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AppBundle\Entity\Reservation;
use AppBundle\Entity\Room;
use AppBundle\Form\ReservationType;

class ReservationController extends Controller
{
    
    /**
     * @Route("/reservation/new-blank", name="app_reservation_new_blank")
     * 
     * @Security("has_role('ROLE_USER')")
     */
    public function newBlankAction(Request $request)
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
            
            $this->addFlash('success', 'Votre Réservation a été créée !');
//            return $this->redirectToRoute('front_homepage');
            return $this->redirectToRoute('front_reservations_room_date', array(
                                                            'roomSlug'  => $reservation->getRoom()->getSlug(),
                                                            'date'      => $reservation->getDate()->format('Y-m-d')
                ));
        }
        
        return $this->render(':reservation:new_blank.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    
    /**
     * @Route("/reservation/new/{roomSlug}/{date}/{timeBegin}/{timeEnd}", name="app_reservation_new_prefilled")
     * 
     * @Security("has_role('ROLE_USER')")
     */
    public function newPrefilledAction(Request $request, $roomSlug, \DateTime $date, \DateTime $timeBegin, \DateTime $timeEnd)
    {
        $room = $this->get('app.room_manager')->getRoomBySlug($roomSlug);
        $reservation = new Reservation();
        $reservation->setRoom($room);
        $reservation->setDate($date);
        $reservation->setTimeBegin($timeBegin);
        $reservation->setTimeEnd($timeEnd);
        
        $form = $this->createForm(ReservationType::class, $reservation);
        
        // Nous associons les données soumises à notre form grâce à handleRequest(), 
        // ce qui va mettre à jour également notre objet et le valider.
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            
            $reservation = $form->getData();
            
            $reservation->setUser($this->getUser());
            
            $entityManager->persist($reservation);
            $entityManager->flush();
            
            $this->addFlash('success', 'Votre Réservation a été créée !');
//            return $this->redirectToRoute('front_homepage');
            return $this->redirectToRoute('front_reservations_room_date', array(
                                                            'roomSlug'  => $reservation->getRoom()->getSlug(),
                                                            'date'      => $reservation->getDate()->format('Y-m-d')
                ));
        }
        
        return $this->render(':reservation:new_prefilled.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    
    
    
    
    /**
     * @Route("/reservation/delete/{id}", name="app_reservation_delete")
     * 
     * @Security("has_role('ROLE_USER')")
     */
    public function deleteAction(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $reservation = $entityManager->getRepository(Reservation::class)->find($id);
        
        if (null === $reservation){
            throw new NotFoundHttpException("La réservation d'id ".$id." n'existe pas.");
        }
        
        // Si l'a personne'utilisateur logguée n'est pas le user de la reservation
        if ($reservation->getUser() !== $this->getUser()) {
            $this->addFlash('error', 'Vous ne pouvez pas supprimer cette réservation.');
            return $this->redirectToRoute('front_myreservations');
        }
        
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression de reservation contre cette faille
        $form = $this->get('form.factory')->create();
    
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $entityManager->remove($reservation);
            $entityManager->flush();

            $this->addFlash('success', 'La réservation a bien été supprimée.');
            return $this->redirectToRoute('front_myreservations');
        }

        return $this->render(':reservation:delete.html.twig', array(
            'reservation'   => $reservation,
            'form'          => $form->createView(),
        ));
    
    }

}
