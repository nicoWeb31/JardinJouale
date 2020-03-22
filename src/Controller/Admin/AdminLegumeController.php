<?php

namespace App\Controller\Admin;

use App\Entity\Legume;
use App\Form\LegumeType;
use App\Repository\LegumeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminLegumeController extends AbstractController
{
    /**
     * @Route("/admin/legumes", name="admin_legumes")
     */
    public function AdminLegumes(LegumeRepository $repo)
    {
        $legumes = $repo->findAll();
        return $this->render('admin_legume/adminListe.html.twig',[
            'legumes'=>$legumes
        ]);
    }

    /**
     * @Route("/admin/legumes/creation", name="admin.legumes.creation")
     * @Route("/admin/legumes/{id}", name="admin.legumes.modif")
     */
    public function AdminLegumeCreate(Legume $legume = null, EntityManagerInterface $man, Request $req)
    {

        if(!$legume)
        {
            $legume = new Legume();
        }

        $form = $this->createForm(LegumeType::class,$legume);
        $form->handleRequest($req);


        if($form->isSubmitted() && $form->isValid()){
            $man->persist($legume);
            $man->flush();
            return $this->redirectToRoute('admin_legumes');

        }

        return $this->render('admin_legume/adminModiLegume.html.twig',[
            'legume'=>$legume,
            "form"=>$form->createView(),
            "isModif" => $legume->getId() !== null
        ]);
    }
}
