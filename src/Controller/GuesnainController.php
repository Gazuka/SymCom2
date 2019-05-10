<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Entity\Article;
use App\Entity\AgendaEvent;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GuesnainController extends AbstractController
{
    /**
     * @Route("/guesnain", name="guesnain")
     */
    public function index()
    {
        //Récupération du repo de l'agenda
        $repo = $this->getDoctrine()->getRepository(AgendaEvent::class);
        $agenda = $repo->findAll();        

        //Récupération du repo du menu
        $repo = $this->getDoctrine()->getRepository(Menu::class);
        $menus = $repo->findAll();

        return $this->render('guesnain/index.html.twig', [
            'controller_name' => 'GuesnainController',
            'agenda' => $agenda,
            'menus' => $menus
        ]);                
    }

    /**
     * @Route("/article/{id}", name="article")
     * A supprimer
     */
    public function mediatheque($id)
    {        
        //$id = 1;
        //Récupération du repo du menu
        $repo = $this->getDoctrine()->getRepository(Menu::class);
        $menus = $repo->findAll();

        //Récupération du repo de l'article
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->findOneById($id);

        return $this->render('guesnain/article.html.twig', [
            'controller_name' => 'GuesnainController',
            'article' => $article,
            'menus' => $menus
        ]);
    }
}
