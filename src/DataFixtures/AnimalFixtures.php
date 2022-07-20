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
        $animal->setComment('Commentaire sur le nouvel arrivant');
        $animal->setPhoto('{{ asset(\'build/images/bambi.jpg\') }}');
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Monsieur Blaireau');
        $animal->setLatinName('Meles meles');
        $animal->setVernacularName('Blaireau européen');
        $animal->setArrivalDate(new DateTime('2022-04-22'));
        $animal->setDepartureDate(new DateTime('2022-07-12'));
        $animal->setComment('Commentaire sur le nouvel arrivant');
        $animal->setPhoto('{{ asset(\'build/images/blaireau.jpg\') }}');
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Soren');
        $animal->setLatinName('Tyto alba');
        $animal->setVernacularName('Chouette effraie');
        $animal->setArrivalDate(new DateTime('2022-07-11'));
        $animal->setDepartureDate(null);
        $animal->setComment('Commentaire sur le nouvel arrivant');
        $animal->setPhoto('{{ asset(\'build/images/Chouette effraie.jpg\') }}');
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Diaval');
        $animal->setLatinName('Corvus corax');
        $animal->setVernacularName('Grand Corbeau');
        $animal->setArrivalDate(new DateTime('2022-01-14'));
        $animal->setDepartureDate(null);
        $animal->setComment('Commentaire sur le nouvel arrivant');
        $animal->setPhoto('{{ asset(\'build/images/corbeau.jpg\') }}');
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Tic');
        $animal->setLatinName('Sciurus vulgaris');
        $animal->setVernacularName('Écureuil roux');
        $animal->setArrivalDate(new DateTime('2022-06-02'));
        $animal->setDepartureDate(new DateTime('2022-06-30'));
        $animal->setComment('Commentaire sur le nouvel arrivant');
        $animal->setPhoto('{{ asset(\'build/images/ecureuil.jpg\') }}');
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Archimède');
        $animal->setLatinName('Bubo bubo');
        $animal->setVernacularName('Hibou grand-duc');
        $animal->setArrivalDate(new DateTime('2022-02-05'));
        $animal->setDepartureDate(null);
        $animal->setComment('Commentaire sur le nouvel arrivant');
        $animal->setPhoto('{{ asset(\'build/images/hibou_grand_duc.jpg\') }}');
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Mars');
        $animal->setLatinName('Lepus europaeus');
        $animal->setVernacularName('Lièvre d\'Europe');
        $animal->setArrivalDate(new DateTime('2021-05-12'));
        $animal->setDepartureDate(null);
        $animal->setComment('Commentaire sur le nouvel arrivant');
        $animal->setPhoto('{{ asset(\'build/images/lievre.jpeg\') }}');
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Pitch');
        $animal->setLatinName('Turdus merula');
        $animal->setVernacularName('Merle noir');
        $animal->setArrivalDate(new DateTime('2022-05-03'));
        $animal->setDepartureDate(new DateTime('2022-06-18'));
        $animal->setComment('Commentaire sur le nouvel arrivant');
        $animal->setPhoto('{{ asset(\'build/images/merle.jpg\') }}');
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Rouky');
        $animal->setLatinName('Vulpes vulpes');
        $animal->setVernacularName('Renard roux');
        $animal->setArrivalDate(new DateTime('2022-01-15'));
        $animal->setDepartureDate(null);
        $animal->setComment('Commentaire sur le nouvel arrivant');
        $animal->setPhoto('{{ asset(\'build/images/renard.jpg\') }}');
        $manager->persist($animal);

        $manager->flush();
    }
}
