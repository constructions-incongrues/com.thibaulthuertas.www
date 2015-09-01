<?php

namespace ConstructionsIncongrues\ComThibaultHuertasWwwBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use ConstructionsIncongrues\ComThibaultHuertasWwwBundle\Entity\ContactMessage;

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

        $projects = $em->getRepository('ConstructionsIncongruesComThibaultHuertasWwwBundle:Project')->findBy(
            array('is_enabled' => true),
            array('date_released' => 'DESC')
        );

        // On n'affiche pas les projets incomplets
        $projectsExisting = array();
        foreach ($projects as $project) {
            try {
                $this->get('kernel')->locateResource('@ConstructionsIncongruesComThibaultHuertasWwwBundle/Resources/public/assets/projects/'.$project->getSlug());
                $projectsExisting[] = $project;
            } catch (\InvalidArgumentException $e) {
            }
        }

        return array('projects' => $projectsExisting);
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

    /**
     * Displays contact page.
     *
     * @Route("/contact", name="contact")
     * @Template("ConstructionsIncongruesComThibaultHuertasWwwBundle:Default:contact.html.twig")
     */
    public function contactAction(Request $request)
    {
        $message = new ContactMessage();
        $form = $this->createFormBuilder($message)
            ->add('name', 'text')
            ->add('company', 'text')
            ->add('email', 'email')
            ->add('phone', 'text')
            ->add('message', 'text')
            ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            // Validate form
            if ($form->isValid()) {
                // Send email
                $message = \Swift_Message::newInstance()
                    ->setSubject('[thibaulthuertas.com] Nouveau message de ' . $form->get('name')->getData())
                    ->setFrom('contact@thibaulthuertas.com')
                    ->setTo('tristan@rivoallan.net')
                    ->setBody(
                        $this->renderView(
                            'ConstructionsIncongruesComThibaultHuertasWwwBundle:Default:email.txt.twig',
                            array(
                                'name'    => $form->get('name')->getData(),
                                'company' => $form->get('company')->getData(),
                                'email'   => $form->get('email')->getData(),
                                'phone'   => $form->get('phone')->getData(),
                                'message' => $form->get('message')->getData(),
                            )
                        )
                    )
                ;
                $this->get('mailer')->send($message);
            }
        }

        return array('form' => $form->createView());
    }
}
