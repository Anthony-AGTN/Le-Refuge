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
        $animal->setComment("Bonjour, je suis une jolie biche qui a eu la malchance d'être blessée et abandonnée dans la nature. Heureusement, des bénévoles m'ont trouvée et m'ont emmenée dans un refuge pour animaux où je suis soignée et bien traitée. Je suis très gentille et sociable, et j'adore le contact humain. J'aime aussi être brossée et jouer à des jeux. Ma blessure guérit bien et je suis prête à trouver une nouvelle famille qui m'aimera et prendra soin de moi. Si vous avez de l'amour à donner, ne manquez pas l'occasion de venir me rencontrer et de m'adopter !");
        $animal->setPhoto('bambi-62d9abd2ded63600657632.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Monsieur Blaireau');
        $animal->setLatinName('Meles meles');
        $animal->setVernacularName('Blaireau européen');
        $animal->setArrivalDate(new DateTime('2022-04-22'));
        $animal->setDepartureDate(new DateTime('2022-07-12'));
        $animal->setComment("Bonjour, je m'appelle Monsieur Blaireau ! Je suis un adorable blaireau âgé d'environ 5 ans qui recherche une maison pour m'accueillir et m'aimer. Malheureusement, je me suis blessé et je suis arrivé récemment au refuge pour animaux où je suis soigné. Je suis très gentil, j'adore recevoir des caresses et je suis très affectueux. Je suis un peu timide et nerveux, mais je m'ouvre rapidement à la présence des gens. J'aimerais trouver une famille qui me donnera tout l'amour dont j'ai besoin. Je cherche quelqu'un qui me donnera l'attention et l'affection dont j'ai besoin pour me rétablir et qui me soutiendra pendant mon processus de guérison.");
        $animal->setPhoto('blaireau-62d9ac6b19472545441005.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Soren');
        $animal->setLatinName('Tyto alba');
        $animal->setVernacularName('Chouette effraie');
        $animal->setArrivalDate(new DateTime('2022-07-11'));
        $animal->setDepartureDate(null);
        $animal->setComment("Bonjour à tous ! Je m'appelle Soren et je suis une chouette effraie. Je viens d'être recueillie dans ce refuge pour animaux et je suis blessée. Je suis une chouette de taille moyenne mesurant environ 40 cm et pesant environ 350 g. Je suis recouverte d'un duvet brun clair et mes ailes sont également couvertes de duvet brun. Je suis très agile et je peux voler à une vitesse incroyable. Malheureusement, je me suis blessée à l'aile. Je ne peux plus voler et je ressens une douleur intense à chaque fois que je bouge. J'ai besoin de soins urgents pour me remettre sur pied. Le refuge m'a donné les soins dont j'avais besoin, mais je dois encore trouver une personne qui me prendra sous son aile.");
        $animal->setPhoto('chouette-effraie-62d9ac790350d627513245.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Diaval');
        $animal->setLatinName('Corvus corax');
        $animal->setVernacularName('Grand Corbeau');
        $animal->setArrivalDate(new DateTime('2022-01-14'));
        $animal->setDepartureDate(null);
        $animal->setComment("Bonjour à tous ! Je m'appelle Diaval et je suis un corbeau blessé recueilli dans un refuge pour animaux. Je suis âgé d'environ 3 ans et je mesure entre 56 et 62 cm de longueur totale. Mon plumage est noir et luisant, et j'ai de beaux yeux vifs et brillants. J'ai malheureusement été blessé dans un accident et j'ai besoin d'être soignée. Mon aile droite est gravement blessée et je ne peux pas voler pour le moment. Je suis un oiseau très gentil et affectueux, et je m'entends bien avec les autres oiseaux et les humains. Je suis très intelligent et j'adore apprendre de nouvelles choses. J'ai besoin d'un foyer aimant pour me guérir et me permettre de reprendre mon envol.");
        $animal->setPhoto('corbeau-62d9ac86da332589521213.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Tic');
        $animal->setLatinName('Sciurus vulgaris');
        $animal->setVernacularName('Écureuil roux');
        $animal->setArrivalDate(new DateTime('2022-06-02'));
        $animal->setDepartureDate(new DateTime('2022-06-30'));
        $animal->setComment("Bonjour, je me présente, je suis un écureuil blessé. On m'a recueilli dans ce refuge pour animaux pour me permettre de me soigner. Je suis arrivé il y a quelques jours, et je suis encore assez effrayé. Je me suis blessé à la patte, et je ne peux pas me déplacer correctement. Les soigneurs sont très gentils avec moi et me donnent des aliments délicieux. Je suis un écureuil très sociable et affectueux, et j'adorerais trouver une famille qui m'aimera et me prendra soin, même si je ne peux pas courir et grimper autant que je le voudrais. Je suis un écureuil courageux et déterminé, et je dois beaucoup aux soigneurs qui m'ont aidé à me remettre sur pied.");
        $animal->setPhoto('ecureuil-62d9ac99d063f910964473.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Archimède');
        $animal->setLatinName('Bubo bubo');
        $animal->setVernacularName('Hibou grand-duc');
        $animal->setArrivalDate(new DateTime('2022-02-05'));
        $animal->setDepartureDate(null);
        $animal->setComment("Bonjour, je m'appelle Archimède, et je suis un Hibou grand-duc qui a été recueilli dans ce refuge pour animaux. J'ai eu un accident et je suis blessé. Je me suis fracturé l'aile et je boite quand je marche. Cependant, je suis très doux et je n'ai pas peur des gens. Je suis très sociable et je m'entends bien avec les autres animaux. Je suis très attaché à ceux qui me prennent soin et je suis très reconnaissant pour tout ce qu'ils font pour moi. Je cherche un foyer aimant et attentionné pour m'accueillir et me donner le temps et l'espace nécessaires pour guérir et reprendre des forces.");
        $animal->setPhoto('hibou-grand-duc-62d9acaa5b893040694690.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Mars');
        $animal->setLatinName('Lepus europaeus');
        $animal->setVernacularName('Lièvre d\'Europe');
        $animal->setArrivalDate(new DateTime('2021-05-12'));
        $animal->setDepartureDate(null);
        $animal->setComment("Je m'appelle Mars et je suis âgé de 3 ans. J'ai été recueilli dans ce refuge pour animaux car je me suis blessé. Je suis un animal courageux et très affectueux, mais je suis très timide et craintif face aux autres animaux et aux humains. Je n'ai pas peur des câlins, mais je préfère rester seul et je ne supporte pas qu'on me touche. Je ne me bats pas et je n'essaie pas de mordre, mais je suis très peureux. Je suis très gentil et affectueux et je me laisse rapidement calmer par des caresses douces. J'ai besoin de soins et d'attention, mais je suis aussi très indépendant et j'aime explorer et jouer. J'aime la compagnie des autres, mais je préfère la solitude.");
        $animal->setPhoto('lievre-62d9ad1af0b4f468337672.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Pitch');
        $animal->setLatinName('Turdus merula');
        $animal->setVernacularName('Merle noir');
        $animal->setArrivalDate(new DateTime('2022-05-03'));
        $animal->setDepartureDate(new DateTime('2022-06-18'));
        $animal->setComment("Ce merle blessé est arrivé dans notre refuge pour animaux il y a quelques jours. Il est âgé d'environ un an et mesure environ 20 cm de long. Il est très mince et a un plumage noir. Malheureusement, il a été victime d'une mauvaise chute et a un sacrum fracturé. Il a également des blessures mineures sur le dos et les ailes. Heureusement, le merle est très docile et calme, et a montré une grande résistance à la douleur. Nous recherchons un foyer adoptif pour ce merle blessé afin qu'il puisse recevoir les soins médicaux dont il a besoin pour guérir complètement. Nous sommes sûrs qu'avec le bon traitement et le temps, ce merle pourra retrouver sa liberté et sa vigueur d'antan.");
        $animal->setPhoto('merle-62d9ad60153ef011367890.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Rouky');
        $animal->setLatinName('Vulpes vulpes');
        $animal->setVernacularName('Renard roux');
        $animal->setArrivalDate(new DateTime('2022-01-15'));
        $animal->setDepartureDate(null);
        $animal->setComment("Salut ! Je m'appelle Rouky et je suis âgé d'environ 3 ans. Je viens d'être recueilli dans ce refuge car je me suis blessé et je n'arrivais pas à me soigner tout seul. Je me suis donc retrouvé dans une situation très difficile. Heureusement, les bénévoles du refuge ont pris soin de moi et me donnent les meilleurs soins possibles pour me remettre sur pied. Ils font tout leur possible pour me rendre heureux et en bonne santé. Je suis assez timide et je ne suis pas très familier avec les humains. Il me faudra donc un peu de temps pour me familiariser avec mon entourage. Je suis une créature très intelligente et curieuse. Une fois guéri, je ferai sans doute un très bon compagnon.");
        $animal->setPhoto('renard-62d9adad101ac856553534.webp');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Babe');
        $animal->setLatinName('Sus scrofa');
        $animal->setVernacularName('Sanglier (marcassin)');
        $animal->setArrivalDate(new DateTime('2020-11-17'));
        $animal->setDepartureDate(null);
        $animal->setComment("Ce marcassin est arrivé dans notre refuge pour animaux il y a quelques jours. Il est très jeune et nous avons découvert qu'il avait été blessé par un chasseur. Malheureusement, il souffre encore de sa blessure et a besoin de soins vétérinaires immédiats. Il est très gentil et doux et nous croyons qu'il est capable de guérir avec notre aide. Nous nous efforçons de lui offrir un environnement calme et sûr pour lui permettre de se remettre et nous espérons qu'avec l'aide d'un bon vétérinaire, il pourra bientôt retrouver sa santé et sa liberté.");
        $animal->setPhoto('marcassin-62dc71750a1fc589819211.jpg');
        $animal->setUpdatedAt(new DateTime('now'));
        $manager->persist($animal);

        $manager->flush();
    }
}
