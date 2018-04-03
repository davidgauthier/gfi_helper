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
                'user'      =>  $this->getReference('user-0'),
                'room'      =>  $this->getReference('room-0'),
                'date'      => new \DateTime('2018-02-07'),
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
            ),
            array(
                'user'      =>  $this->getReference('user-0'),
                'room'      =>  $this->getReference('room-0'),
                'date'      => new \DateTime('2018-02-08'),
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
            ),
            array(
                'user'      =>  $this->getReference('user-1'),
                'room'      =>  $this->getReference('room-1'),
                'date'      => new \DateTime('2018-02-08'),
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
            ),
            array(
                'user'      =>  $this->getReference('user-1'),
                'room'      =>  $this->getReference('room-1'),
                'date'      => new \DateTime('2018-02-09'),
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('12:30:00'),
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