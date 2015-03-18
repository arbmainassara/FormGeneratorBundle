<?php

namespace Ineat\FormGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Form
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Form
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
     * @ORM\ManyToOne(targetEntity="FormContainer", inversedBy="forms")
     * @ORM\JoinColumn(name="container_id", referencedColumnName="id")
     **/
    private $container;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable = true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable = true)
     */
    private $slug;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Widget", mappedBy="form", cascade={"all"})
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $widgets;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

}
