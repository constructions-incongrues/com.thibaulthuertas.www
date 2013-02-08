<?php

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ConstructionsIncongrues\ComThibaultHuertasWwwBundle\Entity\Project;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $file = new \SplFileObject(__DIR__.'/../../Resources/fixtures/project.csv');
        while (!$file->eof()) {
            $data = $file->fgetcsv();
            $project = new Project();
            $project->setTitle($data[0]);
            $project->setSlug($data[1]);
            $project->setDescription($data[2]);
            $project->setCredits($data[3]);
            $manager->persist($project);
        }

        $manager->flush();
    }
}