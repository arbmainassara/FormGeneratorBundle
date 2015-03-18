<?php

namespace Ineat\FormGeneratorBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Form
 *
 * @ORM\Table(name="form")
 * @ORM\Entity
 * @UniqueEntity("name")
 * @UniqueEntity("slug")
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="\Ineat\FormGeneratorBundle\Entity\Widget\Widget", mappedBy="form", cascade={"all"})
     * @ORM\OrderBy({"position" = "ASC"})
     */
    protected $widgets;

    /**
     * @ORM\ManyToOne(targetEntity="FormContainer", inversedBy="forms")
     * @ORM\JoinColumn(name="container_id", referencedColumnName="id")
     **/
    private $container;

}
