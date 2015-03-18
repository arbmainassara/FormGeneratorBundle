<?php

namespace Ineat\FormGeneratorBundle\Entity\Widget;

use Doctrine\ORM\Mapping as ORM;

/**
 * Widget
 *
 * @ORM\Table(name="widget")
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"widget_checkbox" = "WidgetCheckbox" ,"widget_text_area" = "WidgetTextArea", "widget_input_text" = "WidgetInputText", "widget_select" = "WidgetSelect"})
 */
class Widget implements WidgetInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="\Ineat\FormGeneratorBundle\Entity\Form", inversedBy="widgets")
     **/
    private $form;

    /**
     * @ORM\OneToOne(targetEntity="Ineat\FormGeneratorBundle\Entity\Question", mappedBy="widget", cascade={"persist", "remove", "merge"})
     */
    private $question;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="page_title", type="string", nullable=true)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="required", type="boolean", nullable=true)
     */
    private $required;

    public function getSfPrimitiveWidget()
    {
        throw new \Exception("This method shoud be implemented", 1);
    }

    public function getCssClass()
    {
        throw new \Exception("This method shoud be implemented", 1);
    }

    public function getAnswer($key)
    {
        throw new \Exception("This method shoud be implemented", 1);
    }

    public function getReverseAnswer($answer)
    {
        throw new \Exception("This method shoud be implemented", 1);
    }

    public function setDiscr($discr)
    {
        $this->discr = $discr;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Widget
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Widget
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set required
     *
     * @param boolean $required
     * @return Widget
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return boolean
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set form
     *
     * @param \Ineat\FormGeneratorBundle\Entity\Form $form
     * @return Widget
     */
    public function setForm(\Ineat\FormGeneratorBundle\Entity\Form $form = null)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return \Ineat\FormGeneratorBundle\Entity\Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set question
     *
     * @param \Ineat\FormGeneratorBundle\Entity\Question $question
     * @return Widget
     */
    public function setQuestion(\Ineat\FormGeneratorBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Ineat\FormGeneratorBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
