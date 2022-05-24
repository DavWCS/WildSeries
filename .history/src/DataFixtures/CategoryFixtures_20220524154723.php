<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = ['Action', 'Aventure', 'Animation', 'Fantastic', 'Horreur'];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $categoryname) {
        $category = new Category();
        $category->setName($categoryname);
        $manager->persist($category);
        }
    }
}
