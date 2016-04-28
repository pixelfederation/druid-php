<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\PostAggregation;

/**
 * Class FieldAccessPostAggregatorInterface
 * @package Druid\Query\Common\Component\PostAggregation
 */
interface FieldAccessPostAggregatorInterface extends PostAggregatorInterface
{
    /**
     * @return string
     */
    public function getFieldName();
}
