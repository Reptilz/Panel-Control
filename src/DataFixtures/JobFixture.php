<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JobFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            "Développeur web",
            "Ingénieur en logiciel",
            "Designer graphique",
            "Avocat",
            "Enseignant",
            "Médecin",
            "Ingénieur civil",
            "Comptable",
            "Architecte",
            "Chef cuisinier",
            "Journaliste",
            "Acteur",
            "Musicien",
            "Pompier",
            "Policier",
            "Infirmier",
            "Électricien",
            "Plombier",
            "Jardinier",
            "Traducteur"
        ];

        for ($i = 0; $i < count($data); $i++) {
            $job = new Job();
            $job->setDesignation($data[$i]);
            $manager->persist($job);
        }

        $manager->flush();
    }
}
