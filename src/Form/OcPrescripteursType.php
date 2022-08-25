<?php

namespace App\Form;

use App\Entity\OcPrescripteurFonctions;
use App\Entity\OcPrescripteurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OcPrescripteursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('codePrescripteur')
            ->add('nomPrescripteur')
            ->add('prenomPrescripteur')
            ->add('genre')
            ->add('dateNaissPrescripteur')
            ->add('numTelPrescripteur')
            ->add('photoPrescriteur')
            ->add('dateEmbauche')
            ->add('fonctionPrescription', EntityType::class,
                [
                    'class' => OcPrescripteurFonctions::class,
                    'choice_label' => 'libelleFonction',
                ],
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OcPrescripteurs::class,
        ]);
    }
}
