<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\AnimalKeeper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalKeeperType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, ['label' => 'Prénom'])
            ->add('lastName', TextType::class, ['label' => 'Nom'])
            ->add('animals', null, [
                'label' => 'Pentionnaire.s en charge',
                'class' => Animal::class,
                'multiple' => true,
                'expanded' => false,
                'choice_label' => function ($animal) {
                    return $animal->getId() . ' - ' . $animal->getName() . ' (' . $animal->getLatinName() . ')';
                }
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AnimalKeeper::class,
        ]);
    }
}
