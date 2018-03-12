<?php

namespace AppBundle\DataFixtures\ORM;



use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;


class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    //Load fixture data user
    public function load(ObjectManager $manager)
    {
        // Array of data for the fixture
        $usersData = array(
            array(
                'username'  => 'logan',
                'email'     => 'logan@gfi.fr',
                'password'  => 'log',
                'roles'     => array('ROLE_ADMIN'),
            ),
            array(
                'username'  => 'david',
                'email'     => 'david@gfi.fr',
                'password'  => 'dav',
                'roles'     => array('ROLE_ADMIN'),
            ),
            array(
                'username'  => 'user',
                'email'     => 'user@gfi.fr',
                'password'  => 'user',
                'roles'     => array(),
            ),
            array(
                'username'  => 'toto',
                'email'     => 'toto@gfi.fr',
                'password'  => 'toto',
                'roles'     => array(),
            ),

        );

        // Accessing the user manager service
        $userManager = $this->container->get('fos_user.user_manager');

        foreach ($usersData as $i => $userData)
        {
            $user = $userManager->createUser();
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            $user->setPlainPassword($userData['password']);
            $user->setEnabled(true);
            $user->setRoles($userData['roles']);

            $manager->persist($user);
            $this->addReference(sprintf('user-%s', $i), $user);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }

}