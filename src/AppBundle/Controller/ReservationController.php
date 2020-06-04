<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
            
            $this->addFlash('success', 'La réservation ('.$reservation->getDate()->format('Y-m-d').
                ', '.$reservation->getTimeBegin()->format('H:i').'-'.$reservation->getTimeEnd()->format('H:i').
                ', '.$reservation->getRoom()->getName().') a bien été créée !');
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
        $refererPage = $request->getSession()->get('referer_page');

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

            $this->addFlash('success', 'La réservation ('.$reservation->getDate()->format('Y-m-d').
                ', '.$reservation->getTimeBegin()->format('H:i').'-'.$reservation->getTimeEnd()->format('H:i').
                ', '.$reservation->getRoom()->getName().') a bien été créée !');
            // Si referer page, on redirige
            if (isset($refererPage) && !empty($refererPage)) {
                return $this->redirect($refererPage);
            }
            // Sinon : redirection normale
            return $this->redirectToRoute('front_reservations_room_date', array(
                'roomSlug'  => $reservation->getRoom()->getSlug(),
                'date'      => $reservation->getDate()->format('Y-m-d')
            ));
        }

        // Si l'utilisateur est déjà loggué (autrement dit : l'utilisateur n'était pas loggué et a accedé au formulaire
        //de création d'une reservation prérempli, mais seulement après être passé par le formulaire de connexion)
        $routeLogin = $this->generateUrl('fos_user_security_login', [], UrlGeneratorInterface::ABSOLUTE_URL);
        if($request->headers->get('referer') !== $routeLogin){
            // Mettons en session la page d'ou l'on vient (avant d'arriver sur la page/le formulaire de création)
            $request->getSession()->set('referer_page', $request->headers->get('referer'));
        }
        
        return $this->render(':reservation:new_prefilled.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    
    
    /**
     * @Route("/reservation/edit/{id}", name="app_reservation_edit")
     * 
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction(Request $request, $id)
    {
        $refererPage = $request->getSession()->get('referer_page');

        $reservation = $this->get('app.reservation_manager')->getReservationById($id);

        if(null === $reservation)
        {
            throw new NotFoundHttpException("La réservation d'id ".$id." n'existe pas.");
        }
        
        // Si l'a personne'utilisateur logguée n'est pas le user de la reservation
        if ($reservation->getUser() !== $this->getUser()) {
            $this->addFlash('error', 'Vous ne pouvez pas supprimer cette réservation.');
            return $this->redirectToRoute('front_myreservations');
        }
        

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $reservation = $form->getData();

            $this->container->get('app.reservation_manager')->save($reservation);

            $this->addFlash('success', 'La réservation ('.$reservation->getDate()->format('Y-m-d').
                ', '.$reservation->getTimeBegin()->format('H:i').'-'.$reservation->getTimeEnd()->format('H:i').
                ', '.$reservation->getRoom()->getName().') a bien été modifiée !');
            // Si referer page, on redirige
            if (isset($refererPage) && !empty($refererPage)) {
                return $this->redirect($refererPage);
            }
            // Sinon : redirection normale
            return $this->redirectToRoute('front_reservations_room_date', array(
                'roomSlug'  => $reservation->getRoom()->getSlug(),
                'date'      => $reservation->getDate()->format('Y-m-d')
            ));
        }

        // On peut penser que nous n'avons pas besoin de la condition, mais un utilisateur "POURAIT" accéder à un formulaire
        //d'édition directement via l'url.. (.. se logger.. éditer.. et être redirigé vers le form de co..)
        // Si l'utilisateur est déjà loggué (autrement dit : l'utilisateur n'était pas loggué et a accedé au formulaire
        //de création d'une reservation prérempli, mais seulement après être passé par le formulaire de connexion)
        $routeLogin = $this->generateUrl('fos_user_security_login', [], UrlGeneratorInterface::ABSOLUTE_URL);
        if($request->headers->get('referer') !== $routeLogin) {
            // Mettons en session la page d'ou l'on vient (avant d'arriver sur la page d'édition)
            $request->getSession()->set('referer_page', $request->headers->get('referer'));
        }

        return $this->render(':reservation:edit.html.twig', [
            'form'          => $form->createView(),
            'reservation'   => $reservation,
        ]);
    }
    
    
    
    
    
    /**
     * @Route("/reservation/delete/{id}", name="app_reservation_delete")
     * 
     * @Security("has_role('ROLE_USER')")
     */
    public function deleteAction(Request $request, $id)
    {
        $refererPage = $request->getSession()->get('referer_page');

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
            $reservationCopy = $reservation;
            $entityManager->remove($reservation);
            $entityManager->flush();

            $this->addFlash('success', 'La réservation ('.$reservationCopy->getDate()->format('Y-m-d').
                ', '.$reservationCopy->getTimeBegin()->format('H:i').'-'.$reservationCopy->getTimeEnd()->format('H:i').
                ', '.$reservationCopy->getRoom()->getName().') a bien été supprimée !');
            // Si referer page, on redirige
            if (isset($refererPage) && !empty($refererPage)) {
                return $this->redirect($refererPage);
            }
            // Sinon : redirection normale
            return $this->redirectToRoute('front_myreservations');
        }

        // Ici, il ne faut pas mettre à jour la variable de session car nous passons par
        // la page d'édition pour accéder à celle de suppression.

        return $this->render(':reservation:delete.html.twig', array(
            'reservation'   => $reservation,
            'form'          => $form->createView(),
        ));
    
    }

}
