<?php

namespace App\Form;

use App\Entity\AgendaEvent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgendaEventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateEvent')
            ->add('nom')
            ->add('lieu')            
            ->add('heureDebut')
            ->add('heureFin')
            ->add('commentaire')
            ->add('lien')
            ->add('datePublication')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AgendaEvent::class,
        ]);
    }
}
