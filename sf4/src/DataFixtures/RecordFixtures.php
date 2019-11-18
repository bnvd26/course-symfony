<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Record;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecordFixtures extends BaseFixtures implements DependentFixtureInterface
{

    public function getDependencies()
    {
        return [
            ArtistFixtures::class,
        ];
    }

    protected function loadData(ObjectManager $manager)
    {
        $artist = $this->getRandomReference('artist');
        
        $this->createMany(200, $artist, function($num) 
        {
            $record = (new Record())
                ->setReleasedAt($this->faker->dateTime($max = 'now', $timezone = null))
                ->setTitle($this->faker->title)
                ->setArtist($artist)
                ->setDescription($this->faker->realText(50))
            ;
            // Toujours retourner l'entité
            return $record;
        });
        // Pour terminer, enregistrer
        $manager->flush();
    }
}
