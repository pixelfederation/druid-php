<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component;

/**
 * Interface IntervalInterface.
 */
interface IntervalInterface extends ComponentInterface
{
    /**
     * @return string
     */
    public function getStart();

    /**
     * @return string
     */
    public function getEnd();
}
