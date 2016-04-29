<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Aggregation;

use Druid\Query\Common\ComponentInterface;

/**
 * Interface TypedAggregatorInterface
 * @package Druid\Query\Common\Component\Aggregation
 */
interface AggregatorInterface extends ComponentInterface
{
    const FILTERED_TYPE = 'filtered';

    public function getType();
}
