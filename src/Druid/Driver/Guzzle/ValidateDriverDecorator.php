<?php

namespace Druid\Driver\Guzzle;


use Druid\Driver\ConnectionConfig;
use Druid\Driver\DriverConnectionInterface;
use Druid\Driver\DriverInterface;

class ValidateDriverDecorator implements DriverInterface
{
    /** @var DriverInterface */
    private $decoratedDriver;

    public function __construct(DriverInterface $driver)
    {
        $this->decoratedDriver = $driver;
    }

    /**
     * @param ConnectionConfig $config
     *
     * @return DriverConnectionInterface
     */
    public function connect(ConnectionConfig $config)
    {
        $connection = $this->decoratedDriver->connect($config);
        return new ValidateConnectionDecorator($connection);
    }
}
