<?php

namespace App\DataFixtures;

use App\Entity\Animals;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $animal = new Animals();
        $animal->setName('Croclodo marin')->setMainlands("Asie")->setFamily("Reptile")->setPicture("crocodile.jpg")->setDangerous(1);
        $manager->persist($animal);
        $manager->flush();
    }
}
