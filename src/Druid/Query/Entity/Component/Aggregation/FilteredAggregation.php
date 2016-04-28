<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Aggregation;

use Druid\Query\Common\Component\Aggregation\FilteredAggregatorInterface;
use Druid\Query\Common\Component\Aggregation\AggregatorInterface;
use Druid\Query\Common\Component\Filter\FilterInterface;

class FilteredAggregation extends AbstractAggregator implements FilteredAggregatorInterface
{

    /**
     * @var FilterInterface
     */
    private $filter;

    /**
     * @var AggregatorInterface
     */
    private $aggregator;

    /**
     * FilteredAggregation constructor.
     * @param FilterInterface $filter
     * @param AggregatorInterface $aggregator
     */
    public function __construct(FilterInterface $filter, AggregatorInterface $aggregator)
    {
        parent::__construct('filtered');

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
