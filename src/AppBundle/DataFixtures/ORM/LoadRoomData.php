<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use AppBundle\Entity\Room;

class LoadRoomData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){

        $rooms = array(
            array(
                'name'          => 'Salle du 5ème',
                'description'   => 'Salle du 5ème étage, Lille 2, aile Est.',
            ),
            array(
                'name'          => 'BoxTel du 5ème',
                'description'   => 'BoxTel du 5ème étage, Lille 2, aile Est.',
            ),
        );

        foreach ($rooms as $i => $roo) {
            $room = new Room();

            $room->setName($roo['name']);
            $room->setDescription($roo['description']);

            $manager->persist($room);
            $this->addReference('room-'.$i, $room);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }

}