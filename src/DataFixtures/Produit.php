<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Produit extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $produi1 = new \App\Entity\Produit();
        $produi1->setLibelle("test 1");
        $produi1->setDesciption("test 1");
        $produi1->setImage("https://images-na.ssl-images-amazon.com/images/I/51aL7lqt7-L._AC_SX425_.jpg");
        $produi1->setPrix(25);
        $produi1->setQuantiter(5);
        $manager->persist($produi1);

        $produi2 = new \App\Entity\Produit();
        $produi2->setLibelle("test 2");
        $produi2->setDesciption("test 2");
        $produi2->setImage("https://images-na.ssl-images-amazon.com/images/I/61DPD8HBVcL._AC_SY355_.jpg");
        $produi2->setPrix(50.20);
        $produi2->setQuantiter(5);
        $manager->persist($produi2);

        $produi3 = new \App\Entity\Produit();
        $produi3->setLibelle("test 3");
        $produi3->setDesciption("test 3");
        $produi3->setImage("https://images-na.ssl-images-amazon.com/images/I/51aL7lqt7-L._AC_SX425_.jpg");
        $produi3->setPrix(100);
        $produi3->setQuantiter(5);
        $manager->persist($produi3);

        $produi4 = new \App\Entity\Produit();
        $produi4->setLibelle("test 4");
        $produi4->setDesciption("test 4");
        $produi4->setImage("https://images-na.ssl-images-amazon.com/images/I/51aL7lqt7-L._AC_SX425_.jpg");
        $produi4->setPrix(25);
        $produi4->setQuantiter(5);
        $manager->persist($produi4);

        $manager->flush();
    }
}
