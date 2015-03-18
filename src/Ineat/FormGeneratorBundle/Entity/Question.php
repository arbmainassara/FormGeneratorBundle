<?php

namespace Ineat\FormGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Ineat\FormGeneratorBundle\Repository\QuestionRepository")
 */
class Question
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
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable = true)
     */
    private $libelle;

    /**
     * @ORM\OneToOne(targetEntity="Ineat\FormGeneratorBundle\Entity\Widget\Widget", inversedBy="question")
     * @ORM\JoinColumn(name="widget_id", referencedColumnName="id")
     */
    private $widget;

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="question", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $answers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set question
     *
     * @param string $question
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Question
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set widget
     *
     * @param \Ineat\FormGeneratorBundle\Entity\Widget\Widget $widget
     * @return Question
     */
    public function setWidget(\Ineat\FormGeneratorBundle\Entity\Widget\Widget $widget = null)
    {
        $this->widget = $widget;

        return $this;
    }

    /**
     * Get widget
     *
     * @return \Ineat\FormGeneratorBundle\Entity\Widget\Widget
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * Add answers
     *
     * @param \Ineat\FormGeneratorBundle\Entity\Answer $answers
     * @return Question
     */
    public function addAnswer(\Ineat\FormGeneratorBundle\Entity\Answer $answers)
    {
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \Ineat\FormGeneratorBundle\Entity\Answer $answers
     */
    public function removeAnswer(\Ineat\FormGeneratorBundle\Entity\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
