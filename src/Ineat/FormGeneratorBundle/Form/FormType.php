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
        $choiceTypes = array('empty_value' => 'Choisissez un type de question');
        foreach (WidgetType::getWidgetTypes() as $widgetName => $widgetType) {
            $choiceTypes[$widgetName] = get_class($widgetType);
        }
        $builder
            ->add('name')
            ->add('slug')
            ->add('widgets', 'bootstrap_collection', array(
                // 'type' => 'entity',
                'allow_extra_fields' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'add_button_text' => 'Ajouter une question',
                'delete_button_text' => 'Supprimer la question',
                'sub_widget_col' => 10,
                'button_col' => 2,
            ))
            ->add('widgettypes', 'choice', array('mapped' => false, 'label' => false, 'choices' => $choiceTypes));

        foreach (WidgetType::getWidgetTypes() as $widgetName => $widgetType) {
            $builder
                ->add($widgetName, 'bootstrap_collection', array(
                    'type' => $widgetType,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'mapped' => false,
                    'label' => false,
                    'add_button_text' => 'Ajouter une question',
                    'delete_button_text' => 'Supprimer la question',
                    'sub_widget_col' => 10,
                    'button_col' => 2,
                    'attr' => array('hidden' => 'hidden', 'class' => $widgetName),
                ));
        }
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
