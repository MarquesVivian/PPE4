<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Categorie extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);


        $categorie1 = new \App\Entity\Categorie();
        $categorie1->setLibelle("vampire");
        $manager->persist($categorie1);

        $categorie2 = new \App\Entity\Categorie();
        $categorie2->setLibelle("drole");
        $manager->persist($categorie2);

        $categorie3 = new \App\Entity\Categorie();
        $categorie3->setLibelle("test");
        $manager->persist($categorie3);

        $categorie4 = new \App\Entity\Categorie();
        $categorie4->setLibelle("Grosse_Bite");
        $manager->persist($categorie4);

        $manager->flush();
    }
}
