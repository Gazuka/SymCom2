<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminArticleController extends AbstractController
{
    /**
     * @Route("/admin/article/add", name="article_article_add")
     * 
     * @return Response
     */
    public function Article_Add(Request $request, ObjectManager $manager)
    {
        $article = new Article();
        
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($article);
            $manager->flush();
            
            $this->addFlash(
                'success',
                "L'article' a bien été enregistrée !"
            );

            return $this->redirectToRoute('article_article_add');
        }

        return $this->render('admin/admin_article/article_add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
