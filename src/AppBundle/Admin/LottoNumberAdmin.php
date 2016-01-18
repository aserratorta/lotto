<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

/**
 * Class LottoNumberAdmin
 *
 * @category Admin
 * @package  AppBundle\Admin
 * @author   Anton Serra <aserratorta@gmail.com>
 */
class LottoNumberAdmin extends Admin
{
    protected $classnameLabel = 'Lotto Number';
    protected $baseRoutePattern = 'web/lotto-number';
    protected $datagridValues = array(
        '_sort_by'    => 'year',
        '_sort_order' => 'desc',
    );

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('batch');
    }

    /**
     * Remove batch action list view first column
     *
     * @return array
     */
    public function getBatchActions()
    {
        $actions = parent::getBatchActions();
        unset($actions['delete']);

        return $actions;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'year',
                null,
                array()
            )
            ->add(
                'number',
                null,
                array()
            );
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add(
                'year',
                null,
                array()
            )
            ->add(
                'number',
                null,
                array()
            );
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);
        $listMapper
            ->add(
                'year',
                null,
                array(
                    'editable' => true,
                )
            )
            ->add(
                'number',
                null,
                array(
                    'editable'    => true,
                )
            )
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'edit'   => array(),
                        'delete' => array(),
                    ),
                )
            );
    }
}