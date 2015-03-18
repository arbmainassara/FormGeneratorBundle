<?php
namespace Ineat\FormGeneratorBundle\Entity\Widget;

interface WidgetInterface
{

    public function getSfPrimitiveWidget();

    public function getCssClass();

    public function getAnswer($key);

    public function getReverseAnswer($answer);
}
