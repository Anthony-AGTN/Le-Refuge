<?php

namespace App\Form;

use App\Entity\Message;
use App\Validator\Constraints\PhoneNumber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, ['label' => 'Votre Prénom'])
            ->add('lastName', TextType::class, ['label' => 'Votre Nom'])
            ->add('email', EmailType::class, ['label' => 'Votre E-mail'])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone',
                'constraints' => [
                    new PhoneNumber(),
                ],
                'required' => false,
            ])
            ->add('message', TextareaType::class, ['label' => 'Ici votre message']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
