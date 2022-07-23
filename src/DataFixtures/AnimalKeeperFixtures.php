<?php

namespace App\DataFixtures;

use App\Entity\AnimalKeeper;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnimalKeeperFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $animalKeeper = new AnimalKeeper();
        $animalKeeper->setFirstName('Anthony');
        $animalKeeper->setLastName('Gouton');
        $manager->persist($animalKeeper);

        $animalKeeper = new AnimalKeeper();
        $animalKeeper->setFirstName('Rémy');
        $animalKeeper->setLastName('Durand');
        $manager->persist($animalKeeper);

        $animalKeeper = new AnimalKeeper();
        $animalKeeper->setFirstName('Nicolas');
        $animalKeeper->setLastName('Maison');
        $manager->persist($animalKeeper);

        $animalKeeper = new AnimalKeeper();
        $animalKeeper->setFirstName('Marie');
        $animalKeeper->setLastName('Pourrier');
        $manager->persist($animalKeeper);

        $animalKeeper = new AnimalKeeper();
        $animalKeeper->setFirstName('Laura');
        $animalKeeper->setLastName('Rodriguez');
        $manager->persist($animalKeeper);

        $animalKeeper = new AnimalKeeper();
        $animalKeeper->setFirstName('Jordan');
        $animalKeeper->setLastName('Mousson');
        $manager->persist($animalKeeper);

        $animalKeeper = new AnimalKeeper();
        $animalKeeper->setFirstName('Camille');
        $animalKeeper->setLastName('Leroy');
        $manager->persist($animalKeeper);

        $manager->flush();
    }
}
