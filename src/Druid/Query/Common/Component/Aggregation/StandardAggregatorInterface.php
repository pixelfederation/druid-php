<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Aggregation;

/**
 * Interface StandardAggregatorInterface
 * @package Druid\Query\Common\Component\Aggregation
 */
interface StandardAggregatorInterface extends AggregatorInterface
{
    public function getName();

    public function getFieldName();
}
