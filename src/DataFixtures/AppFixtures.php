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
            $categoriy = new Categoriy();
            $categoriy->setTitle($faker->words(3, true));
            $manager->persist($categoriy);


            $rand = mt_rand(24, 35);
        for ($i = 1; $i < $rand; $i++){
        $item = new Item;
        $item->setTitle($faker->name());
        $item->setDescription($faker->text());
        $item->setCategory($categoriy);
        $manager->persist($item);    
        }  
    }
        

        $manager->flush();

        // to init project -> $ symfony console d:f:l
    }
}
