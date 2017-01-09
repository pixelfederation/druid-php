<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09.01.2017
 * Time: 12:29
 */

namespace Druid\Query\Component\Threshold;


use Druid\Query\Component\ThresholdInterface;

class Threshold implements ThresholdInterface
{

    /** @var int */
    private $value;

    public function __construct($value = 0)
    {
        $this->value = (int)$value;
    }

    public function __toString()
    {
        return (string)$this->value;
    }
}