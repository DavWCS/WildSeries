<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAM = [
        ['title' => 'Walking dead',
        'synopsys' => 'Des zombies envahissent la terre',
        'category_id.' => 'Action'],

        ['title' => 'Arcane',
        'synopsys' => 'Championnes de leurs villes jumelles et rivales, deux sœurs se battent dans une guerre où font rage des technologies magiques et des perspectives diamétralement opposées.',
        'category_id' => 'Fantastic'],

        ['title' => 'Halo',
        'synopsys' => 'L\'humanité est empêtrée dans une guerre intergalactique contre une menace extraterrestre.',
        'category_id' => 'Aventure'],

        ['title' => 'American Horror Story',
        'synopsys' => 'American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques.',
        'category_id' => 'category_Horreur'],
        ['Title' => 'Pacific Rim: The Black', 'Synopsys' => 'Tandis que des kaijus surgis de l\'océan envahissent l\'Australie, un ado et sa petite sœur pilotent un Jaeger cabossé pour rechercher leurs parents disparus.', 'Category' => 'category_Animation']
    ];
    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program->setTitle('Walking dead')
        ;
        $program->setSynopsis('Des zombies envahissent la terre')
        ;
        $program->setCategory($this->getReference('category_Action'))
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