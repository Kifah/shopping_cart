<?php

namespace App\DataFixtures;


use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $firstProduct = new Product();
        $firstProduct->setName('Iphone X');
        $firstProduct->setPrice(1100.99);
        $manager->persist($firstProduct);

        $secondProduct = new Product();
        $secondProduct->setName('Samsung Galaxy 9');
        $secondProduct->setPrice(999.99);
        $manager->persist($secondProduct);
        $manager->flush();

    }

}