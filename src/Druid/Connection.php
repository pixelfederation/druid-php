<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid;

use Druid\Driver\DriverConnectionInterface;
use Druid\Driver\DriverInterface;
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
     * @var array
     */
    private $params;

    /**
     * Connection constructor.
     * @param DriverInterface $driver
     * @param array $params
     */
    public function __construct(DriverInterface $driver, array $params)
    {
        $this->driver = $driver;
        $this->params = $params;
    }

    /**
     * @return DriverConnectionInterface
     */
    private function connect()
    {
        if (!$this->connection) {
            $this->connection = $this->driver->connect($this->params);
        }
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
