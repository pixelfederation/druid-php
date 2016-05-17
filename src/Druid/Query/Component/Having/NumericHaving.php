<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component\Having;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\HavingInterface;

/**
 * Class NumericHaving.
 */
class NumericHaving extends AbstractTypedComponent implements HavingInterface
{
    /**
     * @var string metric name
     */
    private $aggregation;

    /**
     * @var int|float
     */
    private $value;

    /**
     * NumericHaving constructor.
     *
     * @param string    $type
     * @param string    $aggregation
     * @param float|int $value
     */
    public function __construct($type, $aggregation, $value)
    {
        parent::__construct($type);
        $this->aggregation = $aggregation;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getAggregation()
    {
        return $this->aggregation;
    }

    /**
     * @return float|int
     */
    public function getValue()
    {
        return $this->value;
    }
}
