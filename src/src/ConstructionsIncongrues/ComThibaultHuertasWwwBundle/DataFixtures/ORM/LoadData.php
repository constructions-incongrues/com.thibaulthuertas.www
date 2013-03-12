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
        $isHeader = true;
        while (!$file->eof()) {
            // Get row data
            $data = $file->fgetcsv();

            // Skip header
            if ($isHeader) {
                $isHeader = false;
                continue;
            }

            // Create project from csv data
            $project = new Project();
            $project->setTitle($data[0]);
            $project->setSlug($data[1]);
            $project->setDescription($data[2]);
            $project->setCredits($data[3]);
            $project->setHover($data[4]);
            $project->setDateReleased(DateTime::createFromFormat('Y-m-d', $data[5]));
            $project->setIsEnabled(true);

            // Flag for persistence
            $manager->persist($project);
        }

        // Write entities to database
        $manager->flush();
    }
}