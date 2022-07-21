<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $animal = new Animal();
        $animal->setName('Bambi');
        $animal->setLatinName('Cervus elaphus');
        $animal->setVernacularName('Biche');
        $animal->setArrivalDate(new DateTime('2022-03-15'));
        $animal->setDepartureDate(new DateTime('2022-06-04'));
        $animal->setComment('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.');
        $animal->setPhoto('bambi-62d9abd2ded63600657632.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Monsieur Blaireau');
        $animal->setLatinName('Meles meles');
        $animal->setVernacularName('Blaireau européen');
        $animal->setArrivalDate(new DateTime('2022-04-22'));
        $animal->setDepartureDate(new DateTime('2022-07-12'));
        $animal->setComment('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.');
        $animal->setPhoto('blaireau-62d9ac6b19472545441005.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Soren');
        $animal->setLatinName('Tyto alba');
        $animal->setVernacularName('Chouette effraie');
        $animal->setArrivalDate(new DateTime('2022-07-11'));
        $animal->setDepartureDate(null);
        $animal->setComment('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.');
        $animal->setPhoto('chouette-effraie-62d9ac790350d627513245.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Diaval');
        $animal->setLatinName('Corvus corax');
        $animal->setVernacularName('Grand Corbeau');
        $animal->setArrivalDate(new DateTime('2022-01-14'));
        $animal->setDepartureDate(null);
        $animal->setComment('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.');
        $animal->setPhoto('corbeau-62d9ac86da332589521213.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Tic');
        $animal->setLatinName('Sciurus vulgaris');
        $animal->setVernacularName('Écureuil roux');
        $animal->setArrivalDate(new DateTime('2022-06-02'));
        $animal->setDepartureDate(new DateTime('2022-06-30'));
        $animal->setComment('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.');
        $animal->setPhoto('ecureuil-62d9ac99d063f910964473.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Archimède');
        $animal->setLatinName('Bubo bubo');
        $animal->setVernacularName('Hibou grand-duc');
        $animal->setArrivalDate(new DateTime('2022-02-05'));
        $animal->setDepartureDate(null);
        $animal->setComment('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.');
        $animal->setPhoto('hibou-grand-duc-62d9acaa5b893040694690.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Mars');
        $animal->setLatinName('Lepus europaeus');
        $animal->setVernacularName('Lièvre d\'Europe');
        $animal->setArrivalDate(new DateTime('2021-05-12'));
        $animal->setDepartureDate(null);
        $animal->setComment('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.');
        $animal->setPhoto('lievre-62d9ad1af0b4f468337672.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Pitch');
        $animal->setLatinName('Turdus merula');
        $animal->setVernacularName('Merle noir');
        $animal->setArrivalDate(new DateTime('2022-05-03'));
        $animal->setDepartureDate(new DateTime('2022-06-18'));
        $animal->setComment('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.');
        $animal->setPhoto('merle-62d9ad60153ef011367890.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Rouky');
        $animal->setLatinName('Vulpes vulpes');
        $animal->setVernacularName('Renard roux');
        $animal->setArrivalDate(new DateTime('2022-01-15'));
        $animal->setDepartureDate(null);
        $animal->setComment('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.');
        $animal->setPhoto('renard-62d9adad101ac856553534.webp');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $manager->flush();
    }
}
