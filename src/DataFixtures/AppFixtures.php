<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Car;
use App\Enum\CarGearbox;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; $i++) {
            $product = new Car();
            $product->setName('voiture ' . $i);
            $product->setDescription('description ' . $i);
            $product->setMonthlyAmount(mt_rand(300, 600));
            $product->setDailyAmount(mt_rand(10, 20));
            $product->setSeatsNumber(mt_rand(2, 4));
            $product->setGearbox(CarGearbox::AUTOMATIC);
            $product->setCreatedAt(new \DateTimeImmutable());
            $product->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($product);
        }

        for ($i = 0; $i < 50; $i++) {
            $product = new Car();
            $product->setName('voiture ' . $i);
            $product->setDescription('description ' . $i);
            $product->setMonthlyAmount(mt_rand(300, 600));
            $product->setDailyAmount(mt_rand(10, 20));
            $product->setSeatsNumber(mt_rand(2, 4));
            $product->setGearbox(CarGearbox::MANUAL);
            $product->setCreatedAt(new \DateTimeImmutable());
            $product->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($product);
        }

        $manager->flush();
    }
}
