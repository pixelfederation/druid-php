<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid;

use Druid\Driver\DriverConnectionInterface;
use Druid\Query\QueryInterface;

/**
 * Class Connection
 * @package Druid
 */
class Connection implements DriverConnectionInterface
{
    /**
     * @var DriverInterface
     */
    private $driver;

    /**
     * @var DriverConnectionInterface
     */
    private $connection;

    /**
     * Connection constructor.
     * @param DriverInterface $driver
     */
    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return DriverConnectionInterface
     */
    private function connect()
    {
        $this->connection = $this->driver->connect();
        return $this->connection;
    }

    /**
     * @param QueryInterface $query
     * @return mixed
     */
    public function send(QueryInterface $query)
    {
        $this->connect();
        return $this->connection->send($query);
    }
}
