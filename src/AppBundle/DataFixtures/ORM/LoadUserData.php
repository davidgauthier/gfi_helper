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
                'username'  => 'fabien',
                'email'     => 'fabien@gfi.fr',
                'password'  => 'fab',
                'roles'     => array(),
            ),
            array(
                'username'  => 'vincent',
                'email'     => 'vincent@gfi.fr',
                'password'  => 'vin',
                'roles'     => array(),
            ),
            array(
                'username'  => 'armand',
                'email'     => 'armand@gfi.fr',
                'password'  => 'arm',
                'roles'     => array(),
            ),
            array(
                'username'  => 'antoine',
                'email'     => 'antoine@gfi.fr',
                'password'  => 'ant',
                'roles'     => array(),
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

            array(
                'username'  => 'rudy',
                'email'     => 'rudy@gfi.fr',
                'password'  => 'rud',
                'roles'     => array(),
            ),
            array(
                'username'  => 'daniele',
                'email'     => 'daniele@gfi.fr',
                'password'  => 'dan',
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