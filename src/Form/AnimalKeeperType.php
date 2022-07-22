<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\AnimalKeeper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalKeeperType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('animals', null, [
                'label' => 'Pentionnaire.s',
                'class' => Animal::class,
                'multiple' => true,
                'expanded' => false,
                'choice_label' => function ($animal) {
                    return
                    'id => ' . $animal->getId() . ' / ' . $animal->getName() . ' (' . $animal->getLatinName() . ')';
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
