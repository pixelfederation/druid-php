<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component;

/**
 * Class AbstractTypedComponent.
 */
class AbstractTypedComponent
{
    /**
     * @var string
     */
    private $type;

    /**
     * AbstractTypedComponent constructor.
     *
     * @param string $type Type of component.
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
