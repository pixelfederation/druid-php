<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component;

use Druid\Query\Entity\Component\DataSource\DataSource;
use Druid\Query\Entity\Component\Granularity\PeriodGranularity;
use Druid\Query\Entity\Component\PostAggregation;
use Druid\Query\Entity\Component\Filter;
use Druid\Query\Entity\Component\Aggregation;

/**
 * Class Component
 * @package Druid\Query\Entity\Component
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Component
{

    /**
     * @param array $filter
     * @param array $aggregator
     * @return Aggregation\FilteredAggregation
     */
    public function filteredAggregator(array $filter, array $aggregator)
    {
        $aggregator = new Aggregation\FilteredAggregation(
            new Filter\SelectorFilter($filter[0], $filter[1]),
            new Aggregation\StandardAggregator($aggregator[0], $aggregator[1], $aggregator[2])
        );

        return $aggregator;
    }

    /**
     * @param string $type
     * @param string $name
     * @param string $fieldName
     * @return Aggregation\StandardAggregator
     */
    public function standardAggregator($type, $name, $fieldName)
    {
        return new Aggregation\StandardAggregator($type, $name, $fieldName);
    }

    /**
     * @param string $name
     * @param string $function
     * @param array $fields
     * @return PostAggregation\ArithmeticPostAggregator
     */
    public function arithmeticPostAggregator($name, $function, array $fields)
    {
        return new PostAggregation\ArithmeticPostAggregator(
            $name,
            $function,
            new PostAggregation\PostAggregatorCollection($fields)
        );
    }

    /**
     * @param string $name
     * @param string $fieldName
     * @return PostAggregation\FieldAccessPostAggregator
     */
    public function fieldAccessPostAggregator($name, $fieldName)
    {
        return new PostAggregation\FieldAccessPostAggregator($name, $fieldName);
    }

    /**
     * @param string $name
     * @param float|int $value
     * @return PostAggregation\ConstantPostAggregator
     */
    public function constantPostAggregator($name, $value)
    {
        return new PostAggregation\ConstantPostAggregator($name, $value);
    }

    /**
     * @param string $dataSource
     * @return DataSource
     */
    public function dataSource($dataSource)
    {
        return new DataSource($dataSource);
    }

    /**
     * @return PeriodGranularity
     */
    public function dayGranularity()
    {
        return $this->periodGranularity('P1D');
    }

    /**
     * @param $period
     * @param string $timeZone
     * @param string $origin
     * @return PeriodGranularity
     */
    public function periodGranularity($period, $timeZone = null, $origin = null)
    {
        return new PeriodGranularity($period, $timeZone, $origin);
    }
}
