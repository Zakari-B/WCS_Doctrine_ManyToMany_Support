<?php

namespace App\DataFixtures;

use App\Entity\Cat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $cat = new Cat();
            $cat->setName($faker->firstName());
            $cat->setAge($faker->numberBetween(1, 20));
            $cat->setColor($faker->safeColorName());
            $this->addReference('cat' . $i, $cat);
            $manager->persist($cat);
        }

        $manager->flush();
    }
}
