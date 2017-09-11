<?php

namespace PlatypusBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PlatypusBundle\Entity\User;


class LoadUserData implements FixtureInterface {

    public function __constructor() {
        
    }

    public function load(ObjectManager $manager) {

        $user = new User();
        $user->setUsername('Martin');
        $user->setPlainPassword('platypus');
        $user->setEmail('martin@coding.eu');
        $user->setRoles('ROLE_BLOGGER');
        $user->setFirstName('Martin');
        $user->setLastName('Dupont');
        $manager->persist($user);
        
        $user2 = new User();
        $user2->setUsername('Gecko');
        $user2->setPlainPassword('coding');
        $user2->setEmail('gecko@coding.eu');
        $user2->setRoles('ROLE_ADMIN');
        $user2->setFirstName('Gecko');
        $user2->setLastName('Paul');
        $manager->persist($user2);
        
        $user3 = new User();
        $user3->setUsername('Sangfroid');
        $user3->setPlainPassword('d00dle');
        $user3->setEmail('adel.sanhaji@gmail.fr');
        $user3->setRoles('ROLE_ADMIN');
        $user3->setFirstName('Adel');
        $user3->setLastName('Sanhaji');
        $manager->persist($user3);
        
        $manager->flush();
    }

}
