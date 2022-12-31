<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MessageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $message = new Message();
        $message->setFirstName('Laurence');
        $message->setLastName('Moresco');
        $message->setEmail('laurence.moresco@test.com');
        $message->setMessage("Bonjour, Je viens de trouver un animal blessé dans mon jardin.
        Il s'agit d'un petit écureuil qui a l'air d'avoir été mordu par un chat.
        Je ne sais pas quoi faire et je me demandais si vous pourriez me donner des conseils
        ou me dire comment m'en occuper jusqu'à ce que je puisse l'amener chez un vétérinaire.
        Merci beaucoup de votre aide.
        Cordialement,
        Laurence Moresco");
        $manager->persist($message);

        $message = new Message();
        $message->setFirstName('Benjamin');
        $message->setLastName('Gomez');
        $message->setEmail('benji.69@test.com');
        $message->setMessage("Bonjour,
        Je viens de trouver un petit renard dans mon jardin.
        Il a l'air d'avoir été blessé par une voiture et il a du mal à bouger.
        Je ne sais pas quoi faire et je voulais savoir s'il y avait quelque chose que je pouvais faire pour l'aider
        jusqu'à ce que je puisse l'emmener dans un refuge pour animaux sauvages.
        Merci beaucoup de votre aide.
        Cordialement,
        Benjamin Gomez");
        $manager->persist($message);

        $message = new Message();
        $message->setFirstName('Lisa');
        $message->setLastName('Morinton');
        $message->setEmail('morliz@test.com');
        $message->setMessage("Bonjour,
        Je suis tombé sur un chat errant qui a l'air d'avoir été battu.
        Il a de nombreuses blessures et il a besoin de soins médicaux urgents.
        Je ne sais pas quoi faire et je me demandais s'il y avait un moyen de le faire soigner par un vétérinaire
        ou s'il y a un refuge qui pourrait le prendre en charge.
        Merci beaucoup de votre aide.
        Cordialement,
        Lisa Morinton");
        $manager->persist($message);

        $manager->flush();
    }
}
