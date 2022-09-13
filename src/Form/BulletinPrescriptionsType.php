<?php

namespace App\Form;

use App\Entity\BulletinPrescriptions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BulletinPrescriptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datePrescription')
            ->add('posologie')
            ->add('prdouit')
            ->add('consultation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BulletinPrescriptions::class,
        ]);
    }
}
