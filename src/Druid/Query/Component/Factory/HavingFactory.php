<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Factory;

use Druid\Query\Component\Having\LogicalHaving;
use Druid\Query\Component\Having\NumericHaving;
use Druid\Query\Component\HavingInterface;

class HavingFactory
{

    /**
     * @param string $aggregation
     * @param integer|float $value
     * @return NumericHaving
     */
    public function equalToHaving($aggregation, $value)
    {
        return $this->numericHaving(HavingInterface::TYPE_NUMERIC_EQUAL_TO, $aggregation, $value);
    }

    /**
     * @param string $aggregation
     * @param integer|float $value
     * @return NumericHaving
     */
    public function greaterThanHaving($aggregation, $value)
    {
        return $this->numericHaving(HavingInterface::TYPE_NUMERIC_GREATER_THAN, $aggregation, $value);
    }

    /**
     * @param string $aggregation
     * @param integer|float $value
     * @return NumericHaving
     */
    public function lessThanHaving($aggregation, $value)
    {
        return $this->numericHaving(HavingInterface::TYPE_NUMERIC_LESS_THAN, $aggregation, $value);
    }

    /**
     * @param array|HavingInterface[] $havingSpecs
     * @return LogicalHaving
     */
    public function andHaving(array $havingSpecs)
    {
        return $this->logicalHaving(HavingInterface::TYPE_LOGICAL_AND, $havingSpecs);
    }

    /**
     * @param array $havingSpecs
     * @return LogicalHaving
     */
    public function orHaving(array $havingSpecs)
    {
        return $this->logicalHaving(HavingInterface::TYPE_LOGICAL_OR, $havingSpecs);
    }

    /**
     * @param string $type
     * @param string $aggregation
     * @param integer|float $value
     * @return NumericHaving
     */
    public function numericHaving($type, $aggregation, $value)
    {
        return new NumericHaving($type, $aggregation, $value);
    }

    /**
     * @param string $type
     * @param array $havingSpecs
     * @return LogicalHaving
     */
    public function logicalHaving($type, array $havingSpecs)
    {
        return new LogicalHaving($type, $havingSpecs);
    }
}
