<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPersonnelController extends AbstractController
{
    /**
     * @Route("/admin/personnel2", name="admin_personnel")
     */
    public function index()
    {
        return $this->render('admin/admin_personnel/index.html.twig', [
            'controller_name' => 'AdminPersonnelController',
        ]);
    }

    /**
     * @Route("/admin/test", name="persotest")
     */
    public function index2()
    {
        return $this->render('admin_personnel/index.html.twig', [
            'controller_name' => 'AdminPersonnelController',
        ]);
    }
}
