<?php

namespace App\Form;

use App\Entity\OcPatients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OcPatientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule')
            ->add('name')
            ->add('lastName')
            ->add('gender')
            ->add('birthday')
            ->add('phone')
            ->add('profession')
            ->add('email')
            ->add('location')
            ->add('hobbies')
            ->add('picture')
            ->add('ice_name')
            ->add('ice_phone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OcPatients::class,
        ]);
    }
}
