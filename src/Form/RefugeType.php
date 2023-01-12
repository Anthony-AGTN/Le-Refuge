<?php

namespace App\Form;

use App\Entity\Refuge;
use App\Validator\Constraints\PhoneNumber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RefugeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom', 'required' => true])
            ->add('street', TextType::class, ['label' => 'Adresse', 'required' => false])
            ->add('postalCode', TextType::class, ['label' => 'Code postal', 'required' => false])
            ->add('city', TextType::class, ['label' => 'Ville', 'required' => false])
            ->add('country', TextType::class, ['label' => 'Pays', 'required' => false])
            ->add('email', EmailType::class, ['label' => 'Votre E-mail'])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone',
                'attr' => ['placeholder' => '0000000000 ou 00 00 00 00 00'],
                'constraints' => [
                    new PhoneNumber(),
                ],
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Refuge::class,
        ]);
    }
}
