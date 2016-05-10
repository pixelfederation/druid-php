<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */

namespace Druid;

use Druid\Driver\ConnectionConfig;
use Druid\Driver\DriverConnectionInterface;
use Druid\Driver\DriverInterface;
use Druid\Query\AbstractQuery;
use Druid\Query\QueryInterface;
use Druid\QueryBuilder\AbstractQueryBuilder;
use Druid\QueryBuilder\GroupByQueryBuilder;

/**
 * Class Connection
 * @package Druid
 */
class Druid implements DriverConnectionInterface
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
            $this->connection = $this->driver->connect(new ConnectionConfig($this->params));
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

    /**
     * @param string $queryType
     * @return AbstractQueryBuilder
     */
    public function createQueryBuilder($queryType)
    {
        switch ($queryType) {
            case AbstractQuery::TYPE_GROUP_BY:
                return new GroupByQueryBuilder();
            default:
                throw new \RuntimeException(
                    sprintf('Invalid query type %s', $queryType)
                );
        }
    }
}
