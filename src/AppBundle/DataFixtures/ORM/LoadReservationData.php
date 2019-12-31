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
                'date'      => new \DateTime('2018-05-25'),
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-05-25'),
                'timeBegin' => new \DateTime('10:30:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      =>  $this->getReference('user-1'),
                'room'      =>  $this->getReference('room-0'),
                'date'      => new \DateTime('2018-05-25'),
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('14:30:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-05-25'),
                'timeBegin' => new \DateTime('14:30:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-05-25'),
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:30:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-05-28'),
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => "Bonjour, c'est Toto! GNéé",
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-05-28'),
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-04-27'),
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-05-28'),
                'timeBegin' => new \DateTime('12:30:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-05-28'),
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-05-28'),
                'timeBegin' => new \DateTime('17:30:00'),
                'timeEnd'   => new \DateTime('18:30:00'),
                'comment'   => "Je need pour ...",
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-06-01'),
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-06-01'),
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-06-01'),
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('16:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-06-04'),
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-06-04'),
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-06-04'),
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-06-05'),
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => new \DateTime('2018-06-06'),
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-2'),
                'date'      => new \DateTime('2018-06-08'),
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => "Bonjour, c'est Toto! GNéé",
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-2'),
                'date'      => new \DateTime('2018-06-11'),
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => "Bonjour, c'est Toto! GNéé",
            ),
            array(
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-1'),
                'date'      => new \DateTime('2018-06-11'),
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('16:00:00'),
                'comment'   => "Bonjour, c'est Toto! GNéé",
            ),
        );

        foreach ($reservations as $i => $res) {
            $reservation = new Reservation();

            $reservation->setUser($res['user']);
            $reservation->setRoom($res['room']);
            $reservation->setDate($res['date']);
            $reservation->setTimeBegin($res['timeBegin']);
            $reservation->setTimeEnd($res['timeEnd']);
            $reservation->setComment($res['comment']);

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