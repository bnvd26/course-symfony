<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecordFixtures extends BaseFixtures implements DependantFixtureInterface
{
    protected function loadData(ObjectManager $manager)
    {

    }

    public function getDependencies()
    {
        return [
            ArtistFixtures::class,
        ];
    }
}
