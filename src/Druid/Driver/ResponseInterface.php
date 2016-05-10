<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Driver;

/**
 * Interface ResponseInterface
 * @package Druid\Driver
 */
interface ResponseInterface
{
    /**
     * @return RecordInterface[]|array
     */
    public function getRecords();
}
