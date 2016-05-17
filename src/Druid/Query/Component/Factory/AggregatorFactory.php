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
 * Class AggregatorFactory.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AggregatorFactory
{
    /**
     * @param string $name
     *
     * @return Aggregator\CountAggregator
     */
    public function count($name)
    {
        return new Aggregator\CountAggregator($name);
    }

    /**
     * @param string $name
     * @param string $fieldName
     *
     * @return Aggregator\HyperUniqueAggregator
     */
    public function hyperUnique($name, $fieldName)
    {
        return new Aggregator\HyperUniqueAggregator($name, $fieldName);
    }

    /**
     * @param string $name
     * @param string $fieldName
     *
     * @return Aggregator\DoubleSumAggregator
     */
    public function doubleSum($name, $fieldName)
    {
        return new Aggregator\DoubleSumAggregator($name, $fieldName);
    }

    /**
     * @param string $name
     * @param string $fieldName
     *
     * @return Aggregator\LongSumAggregator
     */
    public function longSum($name, $fieldName)
    {
        return new Aggregator\LongSumAggregator($name, $fieldName);
    }

    /**
     * @param FilterInterface     $filter
     * @param AggregatorInterface $aggregator
     *
     * @return Aggregator\FilteredAggregator
     */
    public function filtered(FilterInterface $filter, AggregatorInterface $aggregator)
    {
        return new Aggregator\FilteredAggregator($filter, $aggregator);
    }

    /**
     * @param string $type
     * @param string $name
     * @param string $fieldName
     *
     * @return AggregatorInterface
     */
    public function arithmeticAggregator($type, $name, $fieldName)
    {
        switch ($type) {
            case AggregatorInterface::TYPE_COUNT:
                return $this->count($name);
            case AggregatorInterface::TYPE_DOUBLE_SUM:
                return $this->doubleSum($name, $fieldName);
            case AggregatorInterface::TYPE_HYPER_UNIQUE:
                return $this->hyperUnique($name, $fieldName);
            case AggregatorInterface::TYPE_LONG_SUM:
                return $this->longSum($name, $fieldName);
            default:
                throw new \RuntimeException(
                    sprintf('Invalid aggregator type %s', $type)
                );
        }
    }
}
