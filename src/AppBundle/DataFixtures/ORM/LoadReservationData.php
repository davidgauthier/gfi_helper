<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use AppBundle\Entity\Reservation;

class LoadReservationData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){

        $reservations = array(
            array(
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-26'),
                'timeBegin' => new \DateTime('14:30:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
            ),
            array(
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-18'),
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
            ),
            array(
                'user'      =>  $this->getReference('user-1'),
                'room'      =>  $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-18'),
                'timeBegin' => new \DateTime('10:30:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
            ),
            array(
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-18'),
                'timeBegin' => new \DateTime('15:30:00'),
                'timeEnd'   => new \DateTime('16:30:00'),
            ),
            array(
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-18'),
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('17:30:00'),
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-18'),
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('17:30:00'),
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-16'),
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-16'),
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
            ),
            array(
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-26'),
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-26'),
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
            ),
            array(
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-26'),
                'timeBegin' => new \DateTime('10:30:00'),
                'timeEnd'   => new \DateTime('11:30:00'),
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-26'),
                'timeBegin' => new \DateTime('11:30:00'),
                'timeEnd'   => new \DateTime('12:30:00'),
            ),
            array(
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-26'),
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:00:00'),
            ),
            array(
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-26'),
                'timeBegin' => new \DateTime('16:30:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
            ),
            array(
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-26'),
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
            ),
        );

        foreach ($reservations as $i => $res) {
            $reservation = new Reservation();

            $reservation->setUser($res['user']);
            $reservation->setRoom($res['room']);
            $reservation->setDate($res['date']);
            $reservation->setTimeBegin($res['timeBegin']);
            $reservation->setTimeEnd($res['timeEnd']);

            $manager->persist($reservation);
            $this->addReference('reservation-'.$i, $reservation);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 30;
    }

}