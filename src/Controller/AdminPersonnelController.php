<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPersonnelController extends AbstractController
{
    /**
     * @Route("/admin/personnel", name="admin_personnel")
     */
    public function index()
    {
        return $this->render('admin_personnel/index.html.twig', [
            'controller_name' => 'AdminPersonnelController',
        ]);
    }
}
