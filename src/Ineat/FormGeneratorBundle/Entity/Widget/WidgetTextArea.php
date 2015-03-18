<?php

namespace Ineat\FormGeneratorBundle\Entity\Widget;

use Doctrine\ORM\Mapping as ORM;

/**
 * Widget
 *
 * @ORM\Entity
 * @ORM\Table(name="widget_text_area")
 */
class WidgetTextArea extends Widget
{
    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @return array
     */
    public function getSfPrimitiveWidget()
    {

        return array(
            'type' => 'textarea',
            'options' => array(
                'attr' => array(),
                'help' => $this->getQuestion()->getLibelle(),
            ),
        );
    }

    /**
     * @return string
     */
    public function getCssClass()
    {
        return "dynamique-form-input dynamique-form-textarea";
    }

    /**
     * @param $answer
     * @return mixed
     */
    public function getAnswer($answer)
    {
        return $answer->getAnswer();
    }

    /**
     * @param $answer
     * @return mixed
     */
    public function getReverseAnswer($answer)
    {
        return $answer;
    }


    /**
     * Set text
     *
     * @param string $text
     * @return WidgetTextArea
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }
}
