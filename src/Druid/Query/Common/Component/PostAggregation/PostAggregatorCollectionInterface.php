<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\PostAggregation;

use Druid\Query\Common\ComponentInterface;

/**
 * Interface PostAggregatorCollectionInterface
 * @package Druid\Query\Common\Component\PostAggregation
 */
interface PostAggregatorCollectionInterface extends ComponentInterface
{
    /**
     * @return array|PostAggregatorCollectionInterface[]
     */
    public function getPostAggregations();
}
