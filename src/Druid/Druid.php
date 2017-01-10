<?php

/*
 * Copyright (c) 2016 PIXEL FEDERATION, s.r.o.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the PIXEL FEDERATION, s.r.o. nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL PIXEL FEDERATION, s.r.o. BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Druid;

use Druid\Driver\ConnectionConfig;
use Druid\Driver\DriverConnectionInterface;
use Druid\Driver\DriverInterface;
use Druid\Query\AbstractQuery;
use Druid\Query\QueryInterface;
use Druid\QueryBuilder\AbstractQueryBuilder;
use Druid\QueryBuilder\GroupByQueryBuilder;
use Druid\QueryBuilder\TimeseriesQueryBuilder;
use Druid\QueryBuilder\TopNQueryBuilder;

/**
 * Class Connection.
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
     *
     * @param DriverInterface $driver
     * @param array           $params
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
     *
     * @return mixed
     */
    public function send(QueryInterface $query)
    {
        $this->connect();

        return $this->connection->send($query);
    }

    /**
     * @param string $queryType
     *
     * @return AbstractQueryBuilder
     */
    public function createQueryBuilder($queryType)
    {
        switch ($queryType) {
            case AbstractQuery::TYPE_TOP_N:
                return new TopNQueryBuilder();
                break;
            case AbstractQuery::TYPE_GROUP_BY:
                return new GroupByQueryBuilder();
                break;
            case AbstractQuery::TYPE_TIMESERIES:
                return new TimeseriesQueryBuilder();
                break;
            default:
                throw new \RuntimeException(
                    sprintf('Invalid query type %s', $queryType)
                );
        }
    }
}
