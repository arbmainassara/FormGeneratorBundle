<?php

namespace Ineat\FormGeneratorBundle\Entity\Widget;

use Doctrine\ORM\Mapping as ORM;

/**
 * Widget
 *
 * @ORM\Entity
 * @ORM\Table(name="widget_input_text")
 */
class WidgetInputText extends Widget
{
    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $type;

    /**
     * @return array
     */
    public function getSfPrimitiveWidget()
    {
        return array(
            'type' => $this->type,
            'options' => array(
                'data' => $this->text,
                'help' => $this->getQuestion()->getLibelle(),
            ),

        );
    }

    /**
     * @return string
     */
    public function getCssClass()
    {
        return "dynamique-form-input dynamique-form-text dynamique-form-text-" . $this->type;
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
     * @return WidgetInputText
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

    /**
     * Set type
     *
     * @param string $type
     * @return WidgetInputText
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
