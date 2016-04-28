<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\PostAggregation;

/**
 * Interface ArithmeticPostAggregatorInterface
 * @package Druid\Query\Common\Component\PostAggregation
 */
interface ArithmeticPostAggregatorInterface extends PostAggregatorInterface
{

    /**
     * @return string
     */
    public function getFn();

    /**
     * @return PostAggregatorCollectionInterface
     */
    public function getFields();

    /**
     * @return null|int
     */
    public function getOrdering();
}
