<?php

namespace Ineat\FormGeneratorBundle\Form\Widget;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormRegistry;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\ResolvedFormTypeFactory;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WidgetType extends AbstractType
{
    private $widgetTypes = array();

    public function __construct()
    {
        $this->widgetTypes["WidgetSelectType"] = new WidgetSelectType();
        $this->widgetTypes["WidgetCheckboxType"] = new WidgetCheckboxType();
        $this->widgetTypes["WidgetInputTextType"] = new WidgetInputTextType();
        $this->widgetTypes["WidgetTextAreaType"] = new WidgetTextAreaType();
    }

    public function getWidgetTypes()
    {
        return $this->widgetTypes;
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
     * Passe l'url de l'image à la vue
     *
     * @param \Symfony\Component\Form\FormView $view
     * @param \Symfony\Component\Form\FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        foreach ($this->widgetTypes as $key => $value) {
            $resolvedFormTypeFactory = new ResolvedFormTypeFactory($value, array());
            $formRegistry = new FormRegistry(array(), $resolvedFormTypeFactory);
            $formFactory = new FormFactory($formRegistry, $resolvedFormTypeFactory);
            $eventDispatcher = new EventDispatcher("unused event");
            $formBuilder = new FormBuilder($key, get_class($value), $eventDispatcher, $formFactory);
            $view->vars[$key] = $formBuilder->getForm()->createView();
        }
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
