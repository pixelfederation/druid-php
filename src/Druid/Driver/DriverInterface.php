<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Driver;

/**
 * Interface DriverInterface.
 */
interface DriverInterface
{
    /**
     * @param ConnectionConfig $config
     *
     * @return DriverConnectionInterface
     */
    public function connect(ConnectionConfig $config);
}
