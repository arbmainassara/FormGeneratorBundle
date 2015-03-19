<?php

namespace Ineat\FormGeneratorBundle\Form\Widget;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WidgetInputTextType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text')
            ->add('type')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ineat\FormGeneratorBundle\Entity\Widget\WidgetInputText'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ineat_formgeneratorbundle_widget_widgetinputtext';
    }
}
