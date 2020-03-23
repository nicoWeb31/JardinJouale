<?php

namespace App\DataFixtures;

use App\Entity\Legume;
use App\Entity\Variete;
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

        $vari = new Variete();
        $vari->setNom('Orange Queens')
        ->setQuantites(100)
        ->setCommentaire('Orange bonne resistance, exellent gout')
        ->setLegume($leg1);
        $manager->persist($vari);

        $vari1 = new Variete();
        $vari1->setNom('stupice')
        ->setQuantites(100)
        ->setCommentaire('La plus precause, bon gout')
        ->setLegume($leg1);
        $manager->persist($vari1);
        



        $manager->flush();
    }
}
