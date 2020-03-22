<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminLegumeController extends AbstractController
{
    /**
     * @Route("/admin/legumes", name="admin_legumes")
     */
    public function index()
    {
        return $this->render('admin_legume/liste.html.twig');
    }
}
