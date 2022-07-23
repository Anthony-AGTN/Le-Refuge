<?php

namespace App\DataFixtures;

use App\Entity\Refuge;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RefugeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $refuge = new Refuge();
        $refuge->setName('Le Refuge');
        $refuge->setStreet('2 Route de Saint Romain');
        $refuge->setPostalCode('69660');
        $refuge->setCity('COLLONGES-AU-MONT-D\'OR');
        $refuge->setCountry('France');
        $manager->persist($refuge);

        $manager->flush();
    }
}
