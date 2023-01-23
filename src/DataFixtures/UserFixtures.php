<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 10; $i++){
            $user = new User();
            $user->setUsername("isername$i")
                 ->setEmail("email$i@projet.claque")
                 ->setPassword("pasword$i")
                 ->setRoles(array())
                 ->setFirstName("firstname$i")
                 ->setLastName("lastname$i")
                 ->setPromo(2000 + $i)
                 ->setPosition("");
            $manager->persist($user);
        }

        $manager->flush();
    }
}
