<?php

namespace Ineat\FormGeneratorBundle\Form\Widget;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WidgetCheckboxType extends AbstractType
{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ineat\FormGeneratorBundle\Entity\Widget\WidgetCheckbox'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ineat_formgeneratorbundle_widget_widgetcheckbox';
    }
}
