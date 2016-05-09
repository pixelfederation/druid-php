<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AbstractTypedComponent;

abstract class AbstractArithmeticalAggregator extends AbstractTypedComponent
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
     * AbstractArithmeticalAggregator constructor.
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
