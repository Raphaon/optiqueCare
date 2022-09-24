<?php

namespace App\Form;

use App\Entity\OcConsultation;
use App\Entity\OcPrescripteurs;
use App\Entity\OcPatients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class OcConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateConsultation',
                DateType::class,
                ['widget' => 'single_text'])
            ->add('histoireMaladie')
            ->add('plaintes')
            ->add('antecedantsPatient')
            ->add('antecedantsFamiliaux')
            ->add('diagnosticPatient')
            ->add('bilanConsultation')
            ->add('dateProchainRdv',
                DateType::class,
                ['widget' => 'single_text'])
            ->add('patient', EntityType::class, [
                'class' => OcPatients::class,
                'choice_label' => 'matricule'])
            ->add('prescripteur', EntityType::class, [
                'class' => OcPrescripteurs::class,
                'choice_label' => 'libelleProd'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OcConsultation::class,
        ]);
    }
}