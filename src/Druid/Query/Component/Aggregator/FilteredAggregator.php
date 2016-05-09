<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Aggregator;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\AggregatorInterface;
use Druid\Query\Component\FilterInterface;

/**
 * Class FiltereAggregator
 * @package Druid\Query\Component\Aggregator
 */
class FilteredAggregator extends AbstractTypedComponent implements AggregatorInterface
{
    /**
     * @var FilterInterface
     */
    private $filter;
    /**
     * @var AggregatorInterface
     */
    private $aggregator;

    public function __construct(FilterInterface $filter, AggregatorInterface $aggregator)
    {
        parent::__construct(self::TYPE_FILTERED);
        $this->filter = $filter;
        $this->aggregator = $aggregator;
    }

    /**
     * @return FilterInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @return AggregatorInterface
     */
    public function getAggregator()
    {
        return $this->aggregator;
    }
}
