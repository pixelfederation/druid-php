<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Interval;

use Druid\Query\Component\IntervalInterface;

/**
 * Class Interval
 * @package Druid\Query\Component\Interval
 */
class Interval implements IntervalInterface
{

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * Interval constructor.
     * @param \DateTime $start
     * @param \DateTime $end
     */
    public function __construct(\DateTime $start, \DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end->format('Y-m-d\TH:i:s\Z');
    }

    public function __toString()
    {
        return $this->getStart() . '/' . $this->getEnd();
    }
}