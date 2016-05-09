<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component;

/**
 * Interface AggregatorInterface
 * @package Druid\Query\Component
 */
interface AggregatorInterface extends TypedInterface, ComponentInterface
{

    const TYPE_COUNT = 'count';
    const TYPE_LONG_SUM = 'longSum';
    const TYPE_DOUBLE_SUM = 'doubleSum';
    const TYPE_FILTERED = 'filtered';
    const TYPE_HYPER_UNIQUE = 'hyperUnique';
}
