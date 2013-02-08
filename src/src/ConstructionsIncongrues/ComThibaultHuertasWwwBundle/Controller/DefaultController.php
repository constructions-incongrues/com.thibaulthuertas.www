<?php

namespace ConstructionsIncongrues\ComThibaultHuertasWwwBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * 
     * 
     * @Route("/", name="homepage")
     * @Template("ConstructionsIncongruesComThibaultHuertasWwwBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();

    	$projects = $em->getRepository('ConstructionsIncongruesComThibaultHuertasWwwBundle:Project')->findBy(array('is_enabled' => true), array('date_released' => 'DESC'));

    	return array('projects' => $projects);
    }

    /**
     * Displays project page.
     * 
     * @Route("/project/{slug}", name="project_show")
     * @Template("ConstructionsIncongruesComThibaultHuertasWwwBundle:Default:project.html.twig")
     */
    public function projectShowAction($slug)
    {
        // Instanciate project entity repository
    	$repository = $this->getDoctrine()->getEntityManager()->getRepository('ConstructionsIncongruesComThibaultHuertasWwwBundle:Project');

        // Fetch project corresponding to slug
    	$project = $repository->findOneBy(array('slug' => $slug, 'is_enabled' => true));
	    if (!$project) {
	        throw $this->createNotFoundException(sprintf('No project found for slug "%s"', $slug));
	    }

        // Fetch surrounding projects
        $projectPrevious = $repository->getPrevious($project->getDateReleased());
        $projectNext = $repository->getNext($project->getDateReleased());

        // Pass data to view
        return array(
            'project' => $project, 
            'projectPrevious' => $projectPrevious, 
            'projectNext' => $projectNext
        );
    }
}
