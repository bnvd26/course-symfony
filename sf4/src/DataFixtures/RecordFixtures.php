<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Record;
use App\Entity\Label;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecordFixtures extends BaseFixtures implements DependentFixtureInterface
{

    public function getDependencies()
    {
        return [
            LabelFixtures::class,
            ArtistFixtures::class,
        ];
    }

    protected function loadData(ObjectManager $manager)
    {          
        $this->createMany(200, 'record', function($num) 
        {
            $record = (new Record())
                ->setReleasedAt($this->faker->dateTimeBetween('-1 year'))
                ->setTitle($this->faker->sentence)
                ->setArtist($this->getRandomReference('artist'))
                ->setDescription($this->faker->realText(50))
                ->setLabel($this->getRandomReference('label'))
            ;
            // Toujours retourner l'entité
            return $record;
        });
        // Pour terminer, enregistrer
        $manager->flush();
    }
}
