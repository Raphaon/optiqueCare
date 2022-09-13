<?php

namespace App\Form;

use App\Entity\OcProduits;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OcProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('refProd')
            ->add('libelleProd')
            ->add('prixAchat')
            ->add('prixVente')
            ->add('marqueProd')
            ->add('descriptionProd')
            ->add('couleursProd')
            ->add('typeProd')
            ->add('bulletinPrescriptions')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OcProduits::class,
        ]);
    }
}
