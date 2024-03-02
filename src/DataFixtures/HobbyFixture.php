<?php

namespace App\DataFixtures;

use App\Entity\Hobby;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HobbyFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            "Lecture",
            "Voyage",
            "Photographie",
            "Randonnée",
            "Cuisine",
            "Jardinage",
            "Musique",
            "Danse",
            "Peinture",
            "Sculpture",
            "Théâtre",
            "Cinéma",
            "Jeux vidéo",
            "Sports",
            "Yoga",
            "Méditation",
            "Bricolage",
            "Tricot",
            "Collection",
            "Écriture"
        ];

        for ($i = 0; $i < count($data); $i++) {
            $hobby = new Hobby();
            $hobby->setDesignation($data[$i]);
            $manager->persist($hobby);
        }

        $manager->flush();
    }
}
