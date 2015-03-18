<?php

namespace Ineat\FormGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answer")
 * @ORM\Entity
 */
class Answer
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
     * @ORM\Column(name="user", type="string")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     **/
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="object", nullable = true)
     */
    private $answer;

    /**
     * @var string
     *
     * @ORM\Column(name="other_answer_value", type="object", nullable = true)
     */
    private $other_answer_value;

}
