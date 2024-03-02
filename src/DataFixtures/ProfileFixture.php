<?php

namespace App\DataFixtures;

use App\Entity\Profile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfileFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $profile = new Profile();
        $profile->setRs('Facebook');
        $profile->setUrl('https://www.facebook.com/facebook');
        $manager->persist($profile);

        $profile1 = new Profile();
        $profile1->setRs('Instagram');
        $profile1->setUrl('https://www.instagram.com/instagram/');
        $manager->persist($profile1);

        $profile2 = new Profile();
        $profile2->setRs('Linkedin');
        $profile2->setUrl('https://www.linkedin.com/in/jordan-morlet-18481619a/');
        $manager->persist($profile2);

        $profile3 = new Profile();
        $profile3->setRs('Github');
        $profile3->setUrl('https://github.com/Reptilz');
        $manager->persist($profile3);

        $manager->flush();
    }
}
