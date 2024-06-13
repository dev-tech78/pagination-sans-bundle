<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class PersonneFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');
        for($i = 0; $i < 100; $i++) {
            $personne = new Personne();
            $personne->setFirstname($faker->firstName);
            $personne->setName($faker->Name);
            $personne->setAge($faker->numberBetween(18, 67));
            $personne->setJob($faker->Job);

            $manager->persist($personne);

        }
        $manager->flush();
    }
}