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
            ->add('date', DateTimeType::class, [
                'required'      => true,
                'html5'         => false,
                'widget'        => 'single_text',
                'input'         => 'datetime',
                'format'        => 'dd/MM/yyyy',
                'with_seconds'  => false,
                'attr'          => [
                    'class'         => 'form-control input-inline datetimepicker-input',
                    'data-toggle'   => 'datetimepicker',
                    "data-target"   => '#appbundle_reservation_date',
                ],
            ])
            ->add('timeBegin', DateTimeType::class, [
                'required'      => true,
                'html5'         => false,
                'widget'        => 'single_text',
                'input'         => 'datetime',
                'format'        => 'HH:mm',
                'with_seconds'  => false,
                'attr'          => [
                    'class'         => 'form-control input-inline datetimepicker-input',
                    'data-toggle'   => 'datetimepicker',
                    "data-target"   => '#appbundle_reservation_timeBegin',
                ],
            ])
            ->add('timeEnd', DateTimeType::class, [
                'required'      => true,
                'html5'         => false,
                'widget'        => 'single_text',
                'input'         => 'datetime',
                'format'        => 'HH:mm',
                'with_seconds'  => false,
                'attr'          => [
                    'class'         => 'form-control input-inline datetimepicker-input',
                    'data-toggle'   => 'datetimepicker',
                    "data-target"   => '#appbundle_reservation_timeEnd',
                ],
            ])
            ->add('comment')
            ->add('updatedAt', DateTimeType::class, [
                'disabled' => true,
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/mm/yyyy HH:mm:ss',
                'attr' => [
                    'readonly' => true,
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
