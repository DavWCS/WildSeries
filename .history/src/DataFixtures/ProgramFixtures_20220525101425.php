<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAM = [
        ['Title' => 'Walking dead', 'Synopsys' => 'Des zombies envahissent la terre', 'Category' => 'category_Action'],
        ['Title' => 'Arcane', 'Synopsys' => 'Championnes de leurs villes jumelles et rivales, deux sœurs se battent dans une guerre où font rage des technologies magiques et des perspectives diamétralement opposées.'', 'Category' => 'category_Fantastic'],
        ['Title' => 'Walking dead', 'Synopsys' => 'Des zombies envahissent la terre', 'Category' => 'category_Fantastic'],
        ['Title' => 'Walking dead', 'Synopsys' => 'Des zombies envahissent la terre', 'Category' => 'category_Fantastic'],
        ['Title' => 'Walking dead', 'Synopsys' => 'Des zombies envahissent la terre', 'Category' => 'category_Fantastic'],
    ];
    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program->setTitle('Walking dead')
                ->setTitle('Arcane')
        ;
        $program->setSynopsis('Des zombies envahissent la terre')
        ;
        $program->setCategory($this->getReference('category_Action'))
                ->setCategory($this->getReference('category_Fantastic'))
        ;
        $manager->persist($program);
        $manager->flush();
    }
        public function getDependencies()
        {
            // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
            return [
              CategoryFixtures::class,
            ];
        }
    }