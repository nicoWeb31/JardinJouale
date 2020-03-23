<?php

namespace App\Controller\Admin;

use App\Entity\Variete;
use App\Form\VarieteType;
use App\Repository\VarieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminVarieteController extends AbstractController
{
    /**
     * @Route("/admin/adminVariete", name="admin_variete")
     */
    public function indexListe(VarieteRepository  $repo)
    {
        $variete = $repo->findAll();
        return $this->render('admin_variete/adminVariete.html.twig',[
            'variete' => $variete
        ]);
    }

    /**
     * @Route("/admin/adminVariete", name="admin.variete.creation")
     * @Route("/admin/adminVariete/{id}", name="admin.variete.modif")
     * 
     */
    public function ModCreat(Variete $var)
    {
        $form = $this->createForm(VarieteType::class);
        return $this->render('admin_variete/adminVarietMod.html.twig',[
            'variete' => $var,
            "form" => $form->createView()
        ]);
    }

    // /**
    //  * @Route("/admin/adminVariete", name="admin_variete", methods='sup')
    //  */
    // public function suppr(VarieteRepository  $repo)
    // {
    //     $variete = $repo->findAll();
    //     return $this->render('admin_variete/adminVariete.html.twig',[
    //         'variete' => $variete
    //     ]);
    // }
}
