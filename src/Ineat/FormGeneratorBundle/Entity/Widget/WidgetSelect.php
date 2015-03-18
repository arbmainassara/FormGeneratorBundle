<?php

namespace Ineat\FormGeneratorBundle\Entity\Widget;

use Doctrine\ORM\Mapping as ORM;

/**
 * Widget
 *
 * @ORM\Entity
 * @ORM\Table(name="widget_select")
 */
class WidgetSelect extends Widget
{
    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $choices;

    /**
     * @var boolean
     *
     * @ORM\Column(name="multiple", type="boolean")
     */
    private $multiple;

    /**
     * @var boolean
     *
     * @ORM\Column(name="expanded", type="boolean")
     */
    private $expanded;

    /**
     * @var integer
     *
     * @ORM\Column(name="minimum_choices", type="integer")
     */
    private $minimumChoices;

    /**
     * @var integer
     *
     * @ORM\Column(name="maximum_choices", type="integer")
     */
    private $maximumChoices;

    /**
     * @var boolean
     *
     * @ORM\Column(name="other_answser_possible", type="boolean")
     */
    private $other_answser_possible;

    /**
     * @return array
     */
    public function getSfPrimitiveWidget()
    {
        if ($this->getOtherAnswserPossible()) {
            $choices['autre_valeur_selectionnee'] = "Autre";
        }
        return array('type' => 'ineatchoice', 'options' => array(
            'choices' => $this->getChoices(),
            'multiple' => $this->multiple,
            'expanded' => $this->expanded,
            'minimumChoices' => $this->minimumChoices,
            'maximumChoices' => $this->maximumChoices,
            'by_reference' => !$this->getOtherAnswserPossible(),
            'response_identifier' => $this->getId(),
            'old_value' => '',
            'help' => $this->getQuestion()->getLibelle(),
        ));
    }

    /**
     * @return string
     */
    public function getCssClass()
    {
        $default = "dynamique-form-input dynamique-form-select";
        if ($this->getOtherAnswserPossible()) {
            $default = $default . " has_other_response";
        }

        return $default;
    }

    /**
     * @param $answer
     * @return array
     */
    public function getAnswer($answer)
    {
        $this->choices['autre_valeur_selectionnee'] = $answer->getOtherAnswerValue();

        if (is_array($answer->getAnswer()) && count($answer->getAnswer())) {
            foreach ($answer->getAnswer() as $key) {
                $return[] = $this->choices[$key];
            }
            return $return;
        } else {
            if ($answer->getAnswer() === "autre_valeur_selectionnee") {
                return $answer->getOtherAnswerValue();
            } else {
                if (is_null($answer->getAnswer()) || $answer->getAnswer() > count($this->choices)) {
                    return "";
                } else {
                    return $this->choices[$answer->getAnswer()];
                }
            }
        }
    }

    /**
     * @param $answer
     * @return array
     */
    public function getReverseAnswer($answer)
    {
        if ($this->multiple && !is_array($answer)) {
            return array($answer);
        } else if (!$this->multiple && is_array($answer)) {
            return $answer[0];
        }
        return $answer;
    }


    /**
     * Set choices
     *
     * @param array $choices
     * @return WidgetSelect
     */
    public function setChoices($choices)
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * Get choices
     *
     * @return array 
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * Set multiple
     *
     * @param boolean $multiple
     * @return WidgetSelect
     */
    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;

        return $this;
    }

    /**
     * Get multiple
     *
     * @return boolean 
     */
    public function getMultiple()
    {
        return $this->multiple;
    }

    /**
     * Set expanded
     *
     * @param boolean $expanded
     * @return WidgetSelect
     */
    public function setExpanded($expanded)
    {
        $this->expanded = $expanded;

        return $this;
    }

    /**
     * Get expanded
     *
     * @return boolean 
     */
    public function getExpanded()
    {
        return $this->expanded;
    }

    /**
     * Set minimumChoices
     *
     * @param integer $minimumChoices
     * @return WidgetSelect
     */
    public function setMinimumChoices($minimumChoices)
    {
        $this->minimumChoices = $minimumChoices;

        return $this;
    }

    /**
     * Get minimumChoices
     *
     * @return integer 
     */
    public function getMinimumChoices()
    {
        return $this->minimumChoices;
    }

    /**
     * Set maximumChoices
     *
     * @param integer $maximumChoices
     * @return WidgetSelect
     */
    public function setMaximumChoices($maximumChoices)
    {
        $this->maximumChoices = $maximumChoices;

        return $this;
    }

    /**
     * Get maximumChoices
     *
     * @return integer 
     */
    public function getMaximumChoices()
    {
        return $this->maximumChoices;
    }

    /**
     * Set other_answser_possible
     *
     * @param boolean $otherAnswserPossible
     * @return WidgetSelect
     */
    public function setOtherAnswserPossible($otherAnswserPossible)
    {
        $this->other_answser_possible = $otherAnswserPossible;

        return $this;
    }

    /**
     * Get other_answser_possible
     *
     * @return boolean 
     */
    public function getOtherAnswserPossible()
    {
        return $this->other_answser_possible;
    }
}
