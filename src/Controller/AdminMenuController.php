<?php

namespace App\Controller;

use App\Entity\Lien;
use App\Entity\Menu;
use App\Form\LienType;
use App\Form\MenuType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminMenuController extends AbstractController
{
    /**
     * @Route("/admin/menu", name="admin_menu")
     */
    public function index()
    {
        return $this->render('admin/admin_menu/index.html.twig', [
            'controller_name' => 'AdminMenuController',
        ]);
    }

    /**
     * @Route("/admin/lien/add", name="menu_lien_add")
     * 
     * @return Response
     */
    public function Lien_Add(Request $request, ObjectManager $manager)
    {
        $lien = new Lien();
        
        $form = $this->createForm(LienType::class, $lien);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($lien);
            $manager->flush();
            
            $this->addFlash(
                'success',
                "Le lien a bien été enregistrée !"
            );

            return $this->redirectToRoute('menu_lien_add');
        }

        return $this->render('admin/admin_menu/lien_add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/menu/add", name="menu_menu_add")
     * 
     * @return Response
     */
    public function Menu_Add(Request $request, ObjectManager $manager)
    {
        $menu = new Menu();
        
        $form = $this->createForm(MenuType::class, $menu);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($menu);
            $manager->flush();
            
            $this->addFlash(
                'success',
                "Le menu a bien été enregistrée !"
            );

            return $this->redirectToRoute('menu_menu_add');
        }

        return $this->render('admin/admin_menu/menu_add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
