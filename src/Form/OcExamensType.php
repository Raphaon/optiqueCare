<?php

namespace App\Form;

use App\Entity\OcExamens;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OcExamensType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('refExamen')
            ->add('designation')
            ->add('codeExamen')
            ->add('prixExamen')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OcExamens::class,
        ]);
    }
}
