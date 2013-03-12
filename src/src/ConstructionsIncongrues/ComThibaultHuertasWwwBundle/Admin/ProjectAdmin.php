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
            ->add('slug', null, array('required' => true))
            ->add('description', null, array('required' => true))
            ->add('credits', null, array('required' => false))
            ->add('hover', null, array('required' => true))
            ->add('date_released', null, array('required' => true))
            ->add('is_enabled', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('is_enabled')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('is_enabled')
            ->add('date_released')
        ;
    }
}