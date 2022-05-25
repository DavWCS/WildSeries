<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAM = [
        ['Title' => 'Walking dead',
        'Synopsys' => 'Des zombies envahissent la terre',
        'Category_Action' => 'category_Action'],
        ['Title' => 'Arcane',
        'Synopsys' => 'Championnes de leurs villes jumelles et rivales, deux sœurs se battent dans une guerre où font rage des technologies magiques et des perspectives diamétralement opposées.', 'Category' => 'category_Fantastic'],
        ['Title' => 'Halo', 'Synopsys' => 'L\'humanité est empêtrée dans une guerre intergalactique contre une menace extraterrestre.', 'Category' => 'category_Aventure'],
        ['Title' => 'American Horror Story', 'Synopsys' => 'American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques.', 'Category' => 'category_Horreur'],
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
