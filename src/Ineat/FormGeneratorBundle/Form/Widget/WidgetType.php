<?php

namespace Ineat\FormGeneratorBundle\Form\Widget;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class WidgetType extends AbstractType
{

    public static function getWidgetTypes()
    {
        return array(
            "WidgetSelectType" => new WidgetSelectType(),
            "WidgetCheckboxType" => new WidgetCheckboxType(),
            "WidgetInputTextType" => new WidgetInputTextType(),
            "WidgetTextAreaType" => new WidgetTextAreaType(),
        );
    }

    public function getParent()
    {
        return 'form';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $builder
        //     ->add('position')
        //     ->add('title')
        //     ->add('required')
        // ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ineat\FormGeneratorBundle\Entity\Widget\Widget',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ineat_formgeneratorbundle_widget_widget';
    }
}
