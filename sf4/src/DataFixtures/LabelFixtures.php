<?php 

namespace App\DataFixtures;

use App\Entity\Label;
use Doctrine\Common\Persistence\ObjectManager;

class LabelFixtures extends BaseFixtures
{
  protected function loadData(ObjectManager $manager)
    {          
        $this->createMany(25, 'label', function($num) 
        {
            $label = (new Label())
                ->setName($this->faker->word . 'Records')
            ;
            // Toujours retourner l'entité
            return $label;
        });
        // Pour terminer, enregistrer
        $manager->flush();
    }
}