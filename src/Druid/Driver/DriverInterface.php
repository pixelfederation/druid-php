<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid\Driver;

/**
 * Interface DriverInterface
 * @package Druid
 */
interface DriverInterface
{
    /**
     * @param array $params
     * @return DriverConnectionInterface
     */
    public function connect(array $params);
}
