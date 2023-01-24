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
        $admin->setFirstName('Anthony');
        $admin->setLastName('Gouton');
        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            'admin'
        );
        $admin->setPassword($hashedPassword);
        $manager->persist($admin);

        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setEmail('camille.leroy@lerefuge.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setFirstName('Camille');
        $admin->setLastName('Leroy');
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
        $animalKeeper->setFirstName('Rémy');
        $animalKeeper->setLastName('Durand');
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );
        $animalKeeper->setPassword($hashedPassword);
        $manager->persist($animalKeeper);

        // Création d’un utilisateur de type “soigneur”
        $animalKeeper = new User();
        $animalKeeper->setEmail('nicolas.maison@lerefuge.com');
        $animalKeeper->setRoles(['ROLE_ANIMAL_KEEPER']);
        $animalKeeper->setFirstName('Nicolas');
        $animalKeeper->setLastName('Maison');
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );
        $animalKeeper->setPassword($hashedPassword);
        $manager->persist($animalKeeper);

        // Création d’un utilisateur de type “soigneur”
        $animalKeeper = new User();
        $animalKeeper->setEmail('marie.pourrier@lerefuge.com');
        $animalKeeper->setRoles(['ROLE_ANIMAL_KEEPER']);
        $animalKeeper->setFirstName('Marie');
        $animalKeeper->setLastName('Pourrier');
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );
        $animalKeeper->setPassword($hashedPassword);
        $manager->persist($animalKeeper);

        // Création d’un utilisateur de type “soigneur”
        $animalKeeper = new User();
        $animalKeeper->setEmail('laura.rodriguez@lerefuge.com');
        $animalKeeper->setRoles(['ROLE_ANIMAL_KEEPER']);
        $animalKeeper->setFirstName('Laura');
        $animalKeeper->setLastName('Rodriguez');
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );
        $animalKeeper->setPassword($hashedPassword);
        $manager->persist($animalKeeper);

        // Création d’un utilisateur de type “soigneur”
        $animalKeeper = new User();
        $animalKeeper->setEmail('jordan.mousson@lerefuge.com');
        $animalKeeper->setRoles(['ROLE_ANIMAL_KEEPER']);
        $animalKeeper->setFirstName('Jordan');
        $animalKeeper->setLastName('Mousson');
        $hashedPassword = $this->passwordHasher->hashPassword(
            $animalKeeper,
            'password'
        );
        $animalKeeper->setPassword($hashedPassword);
        $manager->persist($animalKeeper);

        // Sauvegarde des nouveaux utilisateurs :
        $manager->flush();
    }
}
