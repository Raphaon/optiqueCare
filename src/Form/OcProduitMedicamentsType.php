<?php

namespace App\Form;

use App\Entity\OcProduitMedicaments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OcProduitMedicamentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('refMedoc')
            ->add('dateExp')
            ->add('numLot')
            ->add('dateAchat')
            ->add('refProduit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OcProduitMedicaments::class,
        ]);
    }
}
