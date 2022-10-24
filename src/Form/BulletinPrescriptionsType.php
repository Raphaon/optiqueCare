<?php

namespace App\Form;

use App\Entity\BulletinPrescriptions;
use App\Entity\OcConsultation;
use App\Entity\OcProduits;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class BulletinPrescriptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datePrescription',
                DateType::class,
                ['widget' => 'single_text'])
            ->add('refPrescription')
            ->add('posologie')
            ->add('prdouit', EntityType::class, [
                'class' => OcProduits::class,
                'choice_label' => 'libelleProd',
                'multiple' => true,
                ])
            ->add('consultation', EntityType::class, [
                'class' => OcConsultation::class,
                'choice_label' => 'refConsultation'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BulletinPrescriptions::class,
        ]);
    }
}
