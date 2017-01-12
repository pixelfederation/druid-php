<?php

namespace Druid\Driver;

use Druid\Query\QueryInterface;

class ValidateConnectionDecorator implements DriverConnectionInterface
{

    /** @var DriverConnectionInterface */
    private $decoratedConnection;

    /**
     * ValidateConnectionDecorator constructor.
     * @param DriverConnectionInterface $connection
     */
    public function __construct(DriverConnectionInterface $connection)
    {
        $this->decoratedConnection = $connection;
    }

    /**
     * @param QueryInterface $query
     *
     * @return ResponseInterface
     */
    public function send(QueryInterface $query)
    {
        $query->validate();
        return $this->decoratedConnection->send($query);
    }
}
