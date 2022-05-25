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
        'category' => 'Action'],

        ['title' => 'Arcane',
        'synopsys' => 'Championnes de leurs villes jumelles et rivales, deux sœurs se battent dans une guerre où font rage des technologies magiques et des perspectives diamétralement opposées.',
        'category' => 'Fantastic'],

        ['title' => 'Halo',
        'synopsys' => 'L\'humanité est empêtrée dans une guerre intergalactique contre une menace extraterrestre.',
        'category' => 'Aventure'],

        ['title' => 'American Horror Story',
        'synopss' => 'American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques.',
        'category' => 'Horreur'],

        ['title' => 'Pacific Rim: The Black',
        'synopsys' => 'Tandis que des kaijus surgis de l\'océan envahissent l\'Australie, un ado et sa petite sœur pilotent un Jaeger cabossé pour rechercher leurs parents disparus.',
        'category' => 'Animation']
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAM as $key => $programTable) {
            $program = new program();
            $program->setTitle($programTable['title'])
                    ->setSynopsis($programTable['synopsys'])
                    ->setCategory($programTable['category'])
            ;
            $manager->persist($program);
        }
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
