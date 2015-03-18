<?php

namespace Ineat\FormGeneratorBundle\Form;

use Ineat\FormGeneratorBundle\Form\Widget\WidgetType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('slug')
            ->add('container')
            ->add('widget', 'collection', array('type' => new WidgetType()));

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ineat\FormGeneratorBundle\Entity\Form',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ineat_formgeneratorbundle_form';
    }
}
