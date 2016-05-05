<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Factory;

use Druid\Query\Common\Component\Aggregation\AggregatorInterface;
use Druid\Query\Common\Component\Factory\ComponentFactoryInterface;
use Druid\Query\Common\Component\Filter\FilterInterface;
use Druid\Query\Entity\Component\Aggregation\FilteredAggregation;
use Druid\Query\Entity\Component\Aggregation\StandardAggregator;

/**
 * Class AggregatorComponentFactory
 * @package Druid\Query\Entity\Component\Factory
 */
class AggregatorComponentFactory extends AbstractComponentFactory implements ComponentFactoryInterface
{
    const TYPE_AGG = 'agg';

    /**
     * @return string
     */
    public function getType()
    {
        return self::TYPE_AGG;
    }

    /**
     * @param string $type
     * @param string $name
     * @param string $fieldName
     * @return StandardAggregator
     */
    protected function createStandard($type, $name, $fieldName)
    {
        return new StandardAggregator($type, $name, $fieldName);
    }

    /**
     * @param FilterInterface $filter
     * @param AggregatorInterface $aggregator
     * @return FilteredAggregation
     */
    protected function createFiltered(FilterInterface $filter, AggregatorInterface $aggregator)
    {
        return new FilteredAggregation($filter, $aggregator);
    }
}
