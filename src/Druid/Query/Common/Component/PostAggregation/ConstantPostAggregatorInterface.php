<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\PostAggregation;

/**
 * Interface ConstantPostAggregatorInterface
 * @package Druid\Query\Common\Component\PostAggregation
 */
interface ConstantPostAggregatorInterface extends PostAggregatorInterface
{
    /**
     * @return float|int
     */
    public function getValue();
}
