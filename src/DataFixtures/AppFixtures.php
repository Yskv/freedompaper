<?php

namespace App\DataFixtures;

use App\Entity\Categoriy;
use Faker\Factory;
use App\Entity\Item;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        
        for ($c = 1; $c<4; $c++) {
            $Categoriy = new categoriy;
            $Categoriy->setTitle($faker->words(3, true));
            $manager->persist($Categoriy);


            $rand = mt_rand(24, 35);
        for ($i = 1; $i < $rand; $i++){
        $item = new Item;
        $item->setTitle($faker->name());
        $item->setDescription($faker->text());
        $item->setCategory($Categoriy);
        $manager->persist($item);    
        }  
    }
        

        $manager->flush();

        // to init project -> $ symfony console d:f:l
    }
}
