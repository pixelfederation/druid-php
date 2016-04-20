<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Interval;

use Druid\Query\Common\ComponentInterface;

interface IntervalCollectionInterface extends ComponentInterface
{

    /**
     * @return IntervalInterface[]|array
     */
    public function getIntervals();
}
