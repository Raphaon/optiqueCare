<?php

namespace App\Form;

use App\Entity\OcPrescripteurFonctions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OcPrescripteurFonctionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('codeFonction')
            ->add('libelleFonction')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OcPrescripteurFonctions::class,
        ]);
    }
}
