<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Care;
use App\Entity\TypeOfCare;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CareType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class, [
                'label' => 'Date et heure du soin',
                'attr' => ['class' => 'form-date-time d-flex gap-3 flex-column flex-sm-row'],
            ])
            ->add('animal', null, [
                'label' => 'Pentionnaire',
                'class' => Animal::class,
                'multiple' => false,
                'expanded' => false,
                'choice_label' => function ($animal) {
                    return $animal->getId() . ' - ' . $animal->getName() . ' (' . $animal->getLatinName() . ')';
                }
            ])

            ->add('typeOfCares', EntityType::class, [
                'label' => 'Types de soin',
                'class' => TypeOfCare::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'name',
            ])

            ->add('description');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Care::class,
        ]);
    }
}
