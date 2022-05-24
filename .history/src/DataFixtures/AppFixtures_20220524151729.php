<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager):v oid
    {
        $category = new Category();
        $category->setName('Horreur');
        $manager->persist($category);
        $manager->flush();
    }
}
