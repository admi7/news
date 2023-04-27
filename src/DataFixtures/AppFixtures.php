<?php

namespace App\DataFixtures;

use App\Entity\Texte;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $product = new Texte();
            $product->setTitle('product ' . $i);
            $product->setContent(mt_rand(10, 100));
            $manager->persist($product);
        }

        $manager->flush();
    }
}
