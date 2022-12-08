<?php

namespace App\DataFixtures;

use App\Entity\Adoption;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AdoptionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $adoption = new Adoption();
            $adoption->setMaster($this->getReference('cat' . $faker->numberBetween(0, 19)));
            $adoption->setServant($this->getReference('human' . $faker->numberBetween(0, 19)));
            $adoption->setAccomodations($faker->sentence(6));
            $manager->persist($adoption);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CatFixtures::class,
            HumanFixtures::class
        ];
    }
}
