<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('room', EntityType::class, [
                'required' => true,
                'class'         => 'AppBundle\Entity\Room',
                'choice_label'  => 'name',
            ])
            ->add('dateBegin', DateTimeType::class, [
                'required'      => true,
                'html5'         => false,
                'widget'        => 'single_text',
                'input'         => 'datetime',
                'format'        => 'dd/MM/yyyy HH:mm',
                'with_seconds'  => false,
                'attr'          => [
                    'class'         => 'form-control input-inline datetimepicker-input',
                    'data-toggle'   => 'datetimepicker',
                    "data-target"   => '#appbundle_reservation_dateBegin',
                ],
            ])
            ->add('dateEnd', DateTimeType::class, [
                'required'      => true,
                'html5'         => false,
                'widget'        => 'single_text',
                'input'         => 'datetime',
                'format'        => 'dd/MM/yyyy HH:mm',
                'with_seconds'  => false,
                'attr'          => [
                    'class'         => 'form-control input-inline datetimepicker-input',
                    'data-toggle'   => 'datetimepicker',
                    "data-target"   => '#appbundle_reservation_dateEnd',
                ],
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_reservation';
    }


}
