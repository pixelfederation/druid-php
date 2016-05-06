<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid;

use Druid\Driver\DriverConnectionInterface;

/**
 * Interface DriverInterface
 * @package Druid
 */
interface DriverInterface
{
    /**
     * @return DriverConnectionInterface
     */
    public function connect();
}
