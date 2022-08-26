<?php

namespace App\Form;

use App\Entity\OcProduitLunettes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OcProduitLunettesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('modeleVerre')
            ->add('grandeurVerre')
            ->add('sphereR')
            ->add('cylindreR')
            ->add('axeR')
            ->add('addR')
            ->add('pdR')
            ->add('visusR')
            ->add('sphereL')
            ->add('cylindreL')
            ->add('axeL')
            ->add('addL')
            ->add('pdL')
            ->add('grandeurL')
            ->add('visusL')
            ->add('refProduit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OcProduitLunettes::class,
        ]);
    }
}
