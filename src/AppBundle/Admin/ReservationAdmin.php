<?php

// src/AppBundle/Admin/ReservationAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\CoreBundle\Form\Type\DateTimePickerType;

class ReservationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('user')
            ->add('room')
            ->add('date', DatePickerType::class)
            ->add('timeBegin', DateTimePickerType::class, array(
                    'dp_pick_time' => true,
//                    'html5'         => false,
//                    'widget'        => 'single_text',
//                    'input'         => 'datetime',
//                    'date_format' => 'HH:mm',
//                    'with_seconds'  => false,
            ))
            ->add('timeEnd', DateTimePickerType::class, array(
                    'dp_pick_time' => true,
//                    'html5'         => false,
//                    'widget'        => 'single_text',
//                    'input'         => 'datetime',
//                    'date_format' => 'HH:mm',
//                    'with_seconds'  => false,
            ))
            ->add('comment')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('user')
            ->add('room')
            ->add('date')
            ->add('timeBegin')
            ->add('timeEnd')
            ->add('comment')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('user')
            ->add('room')
            ->add('date', null, [
                'format' => 'd/m/Y',
            ])
            ->add('timeBegin', null, [
                'format' => 'H:i',
            ])
            ->add('timeEnd', null, [
                'format' => 'H:i',
            ])
            ->add('comment')
        ;
    }
}
