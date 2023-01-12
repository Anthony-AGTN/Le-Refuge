<?php

namespace App\Form;

use App\Entity\FollowUp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FollowUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('weight')
            ->add('size')
            ->add('healthStatus')
            ->add('observations')
            ->add('animal')
            ->add('animalKeeper')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FollowUp::class,
        ]);
    }
}
