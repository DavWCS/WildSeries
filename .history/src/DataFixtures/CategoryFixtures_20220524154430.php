<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = ['Action', 'Aventure', 'Animation', 'Fantastic',]
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Horreur');
        $manager->persist($category);
        $manager->flush();
    }
}
