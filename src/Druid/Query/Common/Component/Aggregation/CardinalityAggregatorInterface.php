<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Aggregation;

/**
 * Interface CardinalityAggregatorInterface
 * @package Druid\Query\Common\Component\Aggregation
 */
interface CardinalityAggregatorInterface extends AggregatorInterface
{

    public function getName();

    public function getFieldNames();

    public function getByRow();
}
