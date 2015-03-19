<?php

namespace Ineat\FormGeneratorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormContainerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('forms', 'bootstrap_collection', array(
                'type' => new FormType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'add_button_text' => 'Ajouter une page',
                'delete_button_text' => 'Supprimer la page',
                'sub_widget_col' => 10,
                'button_col' => 2,
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ineat\FormGeneratorBundle\Entity\FormContainer',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ineat_formgeneratorbundle_formcontainer';
    }
}
