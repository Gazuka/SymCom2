<?php

namespace App\Controller;

use App\Entity\AgendaEvent;
use App\Form\AgendaEventType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminAgendaController extends AbstractController
{
    /**
     * @Route("/admin/agenda", name="admin_agenda")
     */
    public function index()
    {
        return $this->render('admin/admin_agenda/index.html.twig', [
            'controller_name' => 'AdminAgendaController',
        ]);
    }

    /**
     * @Route("/admin/agenda/add", name="agenda_event_add")
     * 
     * @return Response
     */
    public function AgendaEvent_Add(Request $request, ObjectManager $manager)
    {
        $agendaEvent = new AgendaEvent();
        
        $form = $this->createForm(AgendaEventType::class, $agendaEvent);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($agendaEvent);
            $manager->flush();
            
            $this->addFlash(
                'success',
                "L'événement a bien été enregistrée !"
            );

            return $this->redirectToRoute('agenda_event_add');
        }

        return $this->render('admin/admin_agenda/agenda_add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
