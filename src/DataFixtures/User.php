<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class User extends Fixture
{

    private $userPasswordEncoder;
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);


        $user = new \App\Entity\User();
        $user->setEmail("test@test.test");
        $user->setPassword($this->userPasswordEncoder->encodePassword($user,"totololo"));
        $user->setRoles(array("ROLE_USER"));
        $manager->persist($user);

        $user2 = new \App\Entity\User();
        $user2->setEmail("root@root.root");
        $user2->setPassword($this->userPasswordEncoder->encodePassword($user,"root"));
        $user2->setRoles(array("ROLE_ADMIN"));
        $manager->persist($user2);

        $manager->flush();
    }
}
