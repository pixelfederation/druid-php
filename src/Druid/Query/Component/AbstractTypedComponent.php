<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component;

/**
 * Class AbstractTypedComponent
 * @package Druid\Query\Component
 */
class AbstractTypedComponent
{

    /**
     * @var string
     */
    private $type;

    /**
     * AbstractTypedComponent constructor.
     * @param string $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
