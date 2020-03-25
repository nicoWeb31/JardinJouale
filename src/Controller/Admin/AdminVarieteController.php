<?php

namespace App\Controller\Admin;

use App\Entity\Variete;
use App\Form\VarieteType;
use App\Repository\VarieteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/admin/adminVariete/creation", name="admin.variete.creation")
     * @Route("/admin/adminVariete/{id}", name="admin.variete.modif", methods="GET|POST")
     * 
     */
    public function ModCreat(Variete $var = null, Request $req, EntityManagerInterface $man)
    {
        if(!$var){
            $var = new Variete();
        }
            

        $form = $this->createForm(VarieteType::class,$var);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

            $man->persist($var);
            $man->flush();
            return $this->redirectToRoute('admin_variete');
        }



        return $this->render('admin_variete/adminVarietMod.html.twig',[
            'variete' => $var,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/adminVariete/{id}",name="admin.variete.suppr",methods="sup")
     */
    public function suppr(Variete $var, EntityManagerInterface $man, Request $req)
    {
        if($this->isCsrfTokenValid('sup'.$var->getId(),$req->get('_token'))){

            $man->remove($var);
            $man->flush();
            return $this->redirectToRoute('admin_variete');
        }
        
    }
}
