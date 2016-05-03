<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Entity\Component\Granularity;

use Druid\Query\Common\Component\Granularity\PeriodGranularityInterface;

/**
 * Class PeriodGranularity
 * @package Druid\Query\Entity\Component\Granularity
 */
class PeriodGranularity extends AbstractGranularity implements PeriodGranularityInterface
{

    /**
     * @var string
     */
    private $period;

    /**
     * @var string
     */
    private $timeZone;

    /**
     * @var string
     */
    private $origin;

    /**
     * DayGranularity constructor.
     * @param string $period
     * @param string $timeZone
     * @param string $origin
     */
    public function __construct($period, $timeZone = null, $origin = null)
    {
        $this->period = $period;
        $this->timeZone = $timeZone;
        $this->origin = $origin;
        parent::__construct(self::TYPE_PERIOD);
    }

    /**
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @return string
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }
}
