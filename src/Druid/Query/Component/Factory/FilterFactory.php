<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Factory;

use Druid\Query\Component\Filter\AndFilter;
use Druid\Query\Component\Filter\SelectorFilter;
use Druid\Query\Component\FilterInterface;

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
     * @return AndFilter
     */
    public function andFilter(array $fields)
    {
        return new AndFilter($fields);
    }
}
