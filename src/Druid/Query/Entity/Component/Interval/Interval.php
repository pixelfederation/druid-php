<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Interval;

use Druid\Query\Common\Component\Interval\IntervalInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Interval
 *
 * @package                           Druid\Query\Entity\Component\Interval
 * @Serializer\ExclusionPolicy("all")
 */
class Interval implements IntervalInterface
{
    /**
     * @var string
     */
    private $start;

    /**
     * @var string
     */
    private $end;

    /**
     * Interval constructor.
     *
     * @param string $start
     * @param string $end
     */
    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getStart() . '/' . $this->getEnd();
    }
}
