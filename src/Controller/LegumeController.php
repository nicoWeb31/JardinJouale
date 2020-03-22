<?php

namespace App\Controller;

use App\Repository\LegumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LegumeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('legume/index.html.twig');
    }

    /**
     * @Route("/legumes", name="legumes")
     */
    public function listLegume(LegumeRepository $repo)
    {
        $legumes = $repo->findAll();
        return $this->render('legume/legumes.html.twig',[
            'legumes'=>$legumes
        ]);
    }
}
