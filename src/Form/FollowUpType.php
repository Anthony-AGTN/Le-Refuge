<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\FollowUp;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FollowUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class, [
                'label' => 'Date et heure du suivi',
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
            ->add('weight', IntegerType::class, [
                'label' => 'Poids (en grammes)',
            ])
            ->add('size', IntegerType::class, [
                'label' => 'Taille (en centimètres)',
            ])
            ->add('healthStatus', TextareaType::class, [
                'label' => 'État de santé',
                'attr' => ['rows' => 10],
            ])
            ->add('observations', TextareaType::class, [
                'label' => 'Observations',
                'attr' => ['rows' => 10],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FollowUp::class,
        ]);
    }
}
