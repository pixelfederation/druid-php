<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Factory;

use Druid\Query\Component\Aggregator;
use Druid\Query\Component\AggregatorInterface;
use Druid\Query\Component\FilterInterface;

/**
 * Class AggregatorFactory
 * @package Druid\Query\Component\Factory
 */
class AggregatorFactory
{

    public function count($name)
    {
        return new Aggregator\CountAggregator($name);
    }

    public function hyperUnique($name, $fieldName)
    {
        return new Aggregator\HyperUniqueAggregator($name, $fieldName);
    }

    public function sum($name, $fieldName)
    {
        return new Aggregator\DoubleSumAggregator($name, $fieldName);
    }

    public function filtered(FilterInterface $filter, AggregatorInterface $aggregator)
    {
        return new Aggregator\FilteredAggregator($filter, $aggregator);
    }
}
