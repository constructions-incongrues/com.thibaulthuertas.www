<?php

namespace ConstructionsIncongrues\ComThibaultHuertasWwwBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();

    	$projects = $em->getRepository('ConstructionsIncongruesComThibaultHuertasWwwBundle:Project')->findAll();

    	return $this->render('ConstructionsIncongruesComThibaultHuertasWwwBundle:Default:index.html.twig', array(
    		'projects' => $projects
    	));
    }
}
