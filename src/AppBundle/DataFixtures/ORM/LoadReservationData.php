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
                'dateBegin' => new \DateTime('2018-02-07 15:00'),
                'dateEnd'   => new \DateTime('2018-02-07 15:30'),
            ),
            array(
                'dateBegin' => new \DateTime('2018-02-08 10:00'),
                'dateEnd'   => new \DateTime('2018-02-08 10:30'),
            ),
            array(
                'dateBegin' => new \DateTime('2018-02-08 15:00'),
                'dateEnd'   => new \DateTime('2018-02-08 15:30'),
            ),
            array(
                'dateBegin' => new \DateTime('2018-02-09 12:00'),
                'dateEnd'   => new \DateTime('2018-02-09 12:30'),
            ),
        );

        foreach ($reservations as $i => $res) {
            $reservation = new Reservation();

            $reservation->setDateBegin($res['dateBegin']);
            $reservation->setDateEnd($res['dateEnd']);

            $manager->persist($reservation);
            $this->addReference('reservation-'.$i, $reservation);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 20;
    }

}