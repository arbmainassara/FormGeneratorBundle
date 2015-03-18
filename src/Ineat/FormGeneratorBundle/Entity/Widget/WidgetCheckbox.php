<?php

namespace Ineat\FormGeneratorBundle\Entity\Widget;

use Doctrine\ORM\Mapping as ORM;

/**
 * WidgetOptions
 *
 * @ORM\Table(name="widget_checkbox")
 * @ORM\Entity
 */
class WidgetCheckbox extends Widget
{

    /**
     * @return array
     */
    public function getSfPrimitiveWidget()
    {
        return array(
            'type' => 'checkbox',
            'options' => array(
                'help' => $this->getQuestion()->getLibelle(),
            ),
        );
    }

    /**
     * @return string
     */
    public function getCssClass()
    {
        return "dynamique-form-input dynamique-form-checkbox";
    }

    /**
     * @param $answer
     * @return string
     */
    public function getAnswer($answer)
    {
        return ($answer->getAnswer() == 1) ? 'Oui' : 'Non';
    }

    /**
     * @param $answer
     * @return mixed
     */
    public function getReverseAnswer($answer)
    {
        return $answer;
    }
}
