<?php

namespace Ineat\FormGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormContainer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FormContainer
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
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Form", mappedBy="container", cascade={"all"})
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $forms;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

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
     * Set forms
     *
     * @param \stdClass $forms
     * @return FormContainer
     */
    public function setForms($forms)
    {
        $this->forms = $forms;

        return $this;
    }

    /**
     * Get forms
     *
     * @return \stdClass
     */
    public function getForms()
    {
        return $this->forms;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return FormContainer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return FormContainer
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
}
