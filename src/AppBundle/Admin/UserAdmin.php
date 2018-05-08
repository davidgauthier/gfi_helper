<?php

// src/AppBundle/Admin/UserAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username')
            ->add('email')
            ->add('newPass', 'password', array(
                'label'     => 'New password (empty filed means no changes)',
                'required'  => false
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('username')
            ->add('email')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('username')
            ->add('email')
        ;
    }
    
    
    public function prePersist($object) {
        parent::prePersist($object);
        $this->updateUser($object);
    }

    public function preUpdate($object) {
        parent::preUpdate($object);
        $this->updateUser($object);
    }

    public function updateUser(\AppBundle\Entity\User $u) {
        if ($u->getNewPass()) {
            $u->setPlainPassword($u->getNewPass());
        }

        $um = $this->getConfigurationPool()->getContainer()->get('fos_user.user_manager');
        $u->setEnabled(true);
        
        $um->updateUser($u, false);
    }
}
