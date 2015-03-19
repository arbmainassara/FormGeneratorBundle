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
        $type = new WidgetType();
        $choiceTypes = array();
        foreach ($type->getWidgetTypes() as $widgetName => $widgetType) {
            $choiceTypes[$widgetName] = get_class($widgetType);
        }
        $builder
            ->add('name')
            ->add('slug')
            ->add('widgets', 'bootstrap_collection', array(
                'type' => $type,
                'allow_add' => true,
                'by_reference' => false,
                'add_button_text' => 'Ajouter une question',
                'delete_button_text' => 'Supprimer la question',
            ));
        // ->add('widgettype', 'choice', array(
        //     'choices' => $choiceTypes,
        // ));

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
