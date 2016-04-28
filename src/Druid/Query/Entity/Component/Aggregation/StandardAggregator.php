<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Aggregation;

use Druid\Query\Common\Component\Aggregation\StandardAggregatorInterface;

/**
 * Class StandardAggregator
 * @package Druid\Query\Entity\Component\Aggregation
 */
class StandardAggregator extends AbstractAggregator implements StandardAggregatorInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * StandardAggregator constructor.
     * @param string $type
     * @param string $name
     * @param string $fieldName
     */
    public function __construct($type, $name, $fieldName)
    {
        parent::__construct($type);
        $this->name = $name;
        $this->fieldName = $fieldName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }
}
