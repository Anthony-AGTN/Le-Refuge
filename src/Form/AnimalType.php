<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\AnimalKeeper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('latinName', TextType::class)
            ->add('vernacularName', TextType::class)
            ->add('arrivalDate', DateType::class)
            ->add('departureDate')
            ->add('comment', TextareaType::class)
            ->add('photo', FileType::class)
            ->add('animalKeepers', null, [
                'class' => AnimalKeeper::class,
                'multiple' => true,
                'expanded' => false,
                'choice_label' => function ($animalKeepers) {
                    return $animalKeepers->getFirstName() . ' ' . $animalKeepers->getLastName();
                }
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
