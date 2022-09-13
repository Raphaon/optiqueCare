<?php

namespace App\Form;

use App\Entity\OcConsultation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OcConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateConsultation')
            ->add('histoireMaladie')
            ->add('plaintes')
            ->add('antecedantsPatient')
            ->add('antecedantsFamiliaux')
            ->add('diagnosticPatient')
            ->add('bilanConsultation')
            ->add('dateProchainRdv')
            ->add('patient')
            ->add('prescripteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OcConsultation::class,
        ]);
    }
}
