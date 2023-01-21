<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setEmail('anthony.gouton@lerefuge.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            'admin'
        );
        $admin->setPassword($hashedPassword);
        $manager->persist($admin);

        // Création d’un utilisateur de type “soigneur”
        $animalKeeper = new User();
        $animalKeeper->setEmail('remy.durand@lerefuge.com');
        $animalKeeper->setRoles(['ROLE_ANIMAL_KEEPER']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );

        // Création d’un utilisateur de type “soigneur”
        $animalKeeper = new User();
        $animalKeeper->setEmail('animalKeeper@lerefuge.com');
        $animalKeeper->setRoles(['ROLE_ANIMAL_KEEPER']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );

        // Création d’un utilisateur de type “soigneur”
        $animalKeeper = new User();
        $animalKeeper->setEmail('animalKeeper@lerefuge.com');
        $animalKeeper->setRoles(['ROLE_ANIMAL_KEEPER']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );

        // Création d’un utilisateur de type “soigneur”
        $animalKeeper = new User();
        $animalKeeper->setEmail('animalKeeper@lerefuge.com');
        $animalKeeper->setRoles(['ROLE_ANIMAL_KEEPER']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );

        // Création d’un utilisateur de type “soigneur”
        $animalKeeper = new User();
        $animalKeeper->setEmail('animalKeeper@lerefuge.com');
        $animalKeeper->setRoles(['ROLE_ANIMAL_KEEPER']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );

        $animalKeeper->setPassword($hashedPassword);
        $manager->persist($animalKeeper);

        // Sauvegarde des 2 nouveaux utilisateurs :
        $manager->flush();
    }
}
