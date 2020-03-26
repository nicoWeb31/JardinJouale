<?php

namespace App\Controller;

use App\Entity\Mois;
use App\Repository\MoisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MoisController extends AbstractController
{
    /**
     * @Route("/mois", name="mois")
     */
    public function index(MoisRepository $repo)
    {
        $mois = $repo->findAll();
        return $this->render('mois/index.html.twig',[
            'mois'=>$mois
        ]);
    }

     /**
     * @Route("/mois/{id}", name="mois.show")
     */
    public function showOne(Mois $mois)
    {
        return $this->render('mois/showOne.html.twig',[
            'mois'=>$mois
        ]);
    }
}
