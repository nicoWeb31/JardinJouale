<?php

namespace App\DataFixtures;

use App\Entity\Mois;
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


        // =====================================================================
        // Mois
        // =====================================================================
        $ja = New Mois();
        $ja->setNom('Janvier');
        $manager->persist($ja);

        $fevr = New Mois();
        $fevr->setNom('Fevrier');
        $manager->persist($fevr);

        $mars = New Mois();
        $mars->setNom('Mars');
        $manager->persist($mars);

        $avril = New Mois();
        $avril->setNom('Janvier');
        $manager->persist($avril);

        $ja = New Mois();
        $ja->setNom('Avril');
        $manager->persist($ja);

        $mai = New Mois();
        $mai->setNom('Mai');
        $manager->persist($mai);

        $juin = New Mois();
        $juin->setNom('Juin');
        $manager->persist($juin);

        $juillet = New Mois();
        $juillet->setNom('Juillet');
        $manager->persist($juillet);

        $aout = New Mois();
        $aout->setNom('Aout');
        $manager->persist($aout);

        $sept = New Mois();
        $sept->setNom('septembre');
        $manager->persist($sept);

        $Octobre = New Mois();
        $Octobre->setNom('Octobre');
        $manager->persist($Octobre);

        $novembre = New Mois();
        $novembre->setNom('Novembre');
        $manager->persist($novembre);

        $dece = New Mois();
        $dece->setNom('Decembre');
        $manager->persist($dece);



        // =====================================================================
        // legumes
        // =====================================================================
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


        // =====================================================================
        // variete
        // =====================================================================
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
