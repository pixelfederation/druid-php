<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Factory;

use Druid\Query\Component\Filter\LogicalFilter;
use Druid\Query\Component\Filter\NotFilter;
use Druid\Query\Component\Filter\SelectorFilter;
use Druid\Query\Component\FilterInterface;

/**
 * Class FilterFactory
 * @package Druid\Query\Component\Factory
 */
class FilterFactory
{
    /**
     * @param string $dimension
     * @param string $value
     * @return SelectorFilter
     */
    public function selectorFilter($dimension, $value)
    {
        return new SelectorFilter($dimension, $value);
    }

    /**
     * @param array|FilterInterface[] $fields
     * @return LogicalFilter
     */
    public function andFilter(array $fields)
    {
        return $this->logicalFilter(FilterInterface::TYPE_LOGICAL_AND, $fields);
    }

    /**
     * @param array|FilterInterface $fields
     * @return LogicalFilter
     */
    public function orFilter(array $fields)
    {
        return $this->logicalFilter(FilterInterface::TYPE_LOGICAL_OR, $fields);
    }

    /**
     * @param string $type
     * @param array $fields
     * @return LogicalFilter
     */
    public function logicalFilter($type, array $fields)
    {
        return new LogicalFilter($type, $fields);
    }

    /**
     * @param FilterInterface $field
     * @return NotFilter
     */
    public function notFilter(FilterInterface $field)
    {
        return new NotFilter($field);
    }
}
