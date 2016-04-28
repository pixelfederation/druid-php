<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Aggregation;

use Druid\Query\Common\Component\Filter\FilterInterface;

/**
 * Interface FilteredAggregeratorInterface
 * @package Druid\Query\Common\Component\Aggregation
 */
interface FilteredAggregatorInterface extends AggregatorInterface
{

    /**
     * @return FilterInterface
     */
    public function getFilter();

    /**
     * @return AggregatorInterface
     */
    public function getAggregator();
}
