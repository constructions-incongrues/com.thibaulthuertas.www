<?php
namespace ConstructionsIncongrues\ComThibaultHuertasWwwBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class ProjectAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', null, array('required' => true))
            ->add('description', null, array('required' => true))
            ->add(
            	'images', 
            	'sonata_type_collection', 
            	array('required' => false), 
            	array('edit' => 'inline', 'inline' => 'table', 'targetEntity'=>'ConstructionsIncongrues\ComThibaultHuertasWwwBundle\Entity\Image')
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('description')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('description')
        ;
    }
}