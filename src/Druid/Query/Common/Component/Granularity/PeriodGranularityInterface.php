<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Query\Common\Component\Granularity;

/**
 * Interface PeriodGranularityInterface
 * @package Druid\Query\Common\Component\Granularity
 */
interface PeriodGranularityInterface extends GranularityInterface
{

    /**
     * @return string
     */
    public function getPeriod();

    /**
     * @return string
     */
    public function getTimeZone();

    /**
     * @return string
     */
    public function getOrigin();
}
