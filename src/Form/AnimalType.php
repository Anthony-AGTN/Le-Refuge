<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\AnimalKeeper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('latinName', TextType::class, ['label' => 'Nom latin'])
            ->add('vernacularName', TextType::class, ['label' => 'Nom vernaculaire'])
            ->add('arrivalDate', DateType::class, ['label' => 'Date d\'arrivée'])
            ->add('departureDate', null, ['label' => 'Date de départ'])
            ->add('comment', TextareaType::class, ['label' => 'Commentaire'])
            ->add('photoFile', VichFileType::class, [
                        'required'      => false,
                        'allow_delete'  => true, // not mandatory, default is true
                        'download_uri' => true, // not mandatory, default is true
            ])
            ->add('animalKeepers', null, [
                'label' => 'Soigneur.euse.s',
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
