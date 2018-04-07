<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class CalendarController extends Controller
{
    /**
     * @Route("/calendar/{roomId}/{day}", name="reservation_room_day")
     *
     * @Security("has_role('ROLE_USER')")
     */
    public function reservationCalendarDayAction(Request $request, $roomId, \DateTime $day)
    {
        $reservations = $this->get('app.reservation_manager')->getReservationsByRoomAndDay($roomId, $day);
        $entityManager = $this->getDoctrine()->getManager();
        $room = $entityManager->getRepository(Room::class)->find($roomId);
        
        return $this->render(':calendar:reservations_room_day.html.twig', [
            'reservations' => $reservations,
            'room' => $room,
            'day' => $day
        ]);
    }
 
}