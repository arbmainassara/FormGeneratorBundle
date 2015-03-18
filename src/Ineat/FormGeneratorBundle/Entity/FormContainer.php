<?php

namespace Ineat\FormGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormContainer
 *
 * @ORM\Table(name="form_container")
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Form", mappedBy="container", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $forms;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->forms = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return FormContainer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add forms
     *
     * @param \Ineat\FormGeneratorBundle\Entity\Form $forms
     * @return FormContainer
     */
    public function addForm(\Ineat\FormGeneratorBundle\Entity\Form $forms)
    {
        $this->forms[] = $forms;

        return $this;
    }

    /**
     * Remove forms
     *
     * @param \Ineat\FormGeneratorBundle\Entity\Form $forms
     */
    public function removeForm(\Ineat\FormGeneratorBundle\Entity\Form $forms)
    {
        $this->forms->removeElement($forms);
    }

    /**
     * Get forms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getForms()
    {
        return $this->forms;
    }
}
