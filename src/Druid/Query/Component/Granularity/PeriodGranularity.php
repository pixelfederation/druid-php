<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Component\Granularity;

use Druid\Query\Component\AbstractTypedComponent;
use Druid\Query\Component\GranularityInterface;

/**
 * Class PeriodGranularity
 * @package Druid\Query\Component\Granularity
 */
class PeriodGranularity extends AbstractTypedComponent implements GranularityInterface
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
     * PeriodGranularity constructor.
     * @param string $period
     * @param string $timeZone
     */
    public function __construct($period, $timeZone)
    {
        parent::__construct(self::TYPE_PERIOD);
        $this->period = $period;
        $this->timeZone = $timeZone;
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
}
