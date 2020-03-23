<?php

namespace App\Controller;

use App\Entity\Legume;
use App\Repository\LegumeRepository;
use App\Repository\VarieteRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VarieteController extends AbstractController
{
    /**
     * @Route("/variete/{id}", name="legume.variete")
     */
    public function index(Legume $legume)
    {
        

        return $this->render('variete/legumeVariete.html.twig',[
            'legume'=>$legume
        ]);
    }
}
