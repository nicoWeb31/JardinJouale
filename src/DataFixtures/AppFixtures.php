<?php

namespace App\DataFixtures;

use App\Entity\Legume;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $leg1 = new Legume();
        $leg1->setNom('Tomate')
        ->setType('Legume du soleil')
        ->setImg('tomate.png');
        $manager->persist($leg1);

        $leg2 = new Legume();
        $leg2->setNom('Carotte')
        ->setType('Legume Terre')
        ->setImg('carotte.png');
        $manager->persist($leg2);


        $leg3 = new Legume();
        $leg3->setNom('Patate')
        ->setType('Legume Terre')
        ->setImg('patate.png');
        $manager->persist($leg3);

        



        $manager->flush();
    }
}
