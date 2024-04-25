<?php

namespace App\Application\DataFixtures;

use App\Application\Factory\EscaleFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        EscaleFactory::createMany(10);

        if (EscaleFactory::needOneMore()) {
            EscaleFactory::createOne();
        }
    }
}
