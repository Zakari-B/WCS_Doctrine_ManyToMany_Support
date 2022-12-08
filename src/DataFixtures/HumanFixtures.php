<?php

namespace App\DataFixtures;

use App\Entity\Human;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class HumanFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $human = new Human();
            $human->setName($faker->name());
            $human->setAge($faker->numberBetween(1, 100));
            $this->addReference('human' . $i, $human);
            $manager->persist($human);
        }

        $manager->flush();
    }
}
