<?php

namespace App\Form;

use App\Entity\BulletinExamens;
use App\Entity\OcConsultation;
use App\Entity\OcExamens;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class BulletinExamensType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('refBulletinExamen')
            ->add('datePrescription',
                DateType::class,
                ['widget' => 'single_text'])
            ->add('observation')
            ->add('examen', EntityType::class, [
                'class' => OcExamens::class,
                'choice_label' => 'designation',
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
            'data_class' => BulletinExamens::class,
        ]);
    }
}