<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Interval;

use Druid\Query\Common\Component\Interval\IntervalCollectionInterface;
use Druid\Query\Common\Component\Interval\IntervalInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class IntervalCollection
 *
 * @package Druid\Query\Entity\Component\Interval
 */
class IntervalCollection implements IntervalCollectionInterface
{
    /**
     * @var array|IntervalInterface[]
     * @Serializer\Type("array<string>")
     * @Serializer\Inline
     */
    private $intervals;

    /**
     * IntervalCollection constructor.
     *
     * @param array|\Druid\Query\Common\Component\Interval\IntervalInterface[] $intervals
     */
    public function __construct(array $intervals = [])
    {
        $this->intervals = $intervals;
    }

    /**
     * @return array|\Druid\Query\Common\Component\Interval\IntervalInterface[]
     */
    public function getIntervals()
    {
        return $this->intervals;
    }

    /**
     * @param array|\Druid\Query\Common\Component\Interval\IntervalInterface[] $intervals
     * @return IntervalCollection
     */
    public function setIntervals(array $intervals)
    {
        foreach ($intervals as $interval) {
            $this->addInterval($interval);
        }

        return $this;
    }

    /**
     * @param IntervalInterface $interval
     * @return $this
     */
    public function addInterval(IntervalInterface $interval)
    {
        $this->intervals[] = $interval;

        return $this;
    }
}
