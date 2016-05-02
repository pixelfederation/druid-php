<?php
/**
 * Copyright (c) 2016 PIXEL FEDERATION, s.r.o.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *  * Redistributions of source code must retain the above copyright
 * notice, this list of conditions and the following disclaimer.
 *  * Redistributions in binary form must reproduce the above copyright
 * notice, this list of conditions and the following disclaimer in the
 * documentation and/or other materials provided with the distribution.
 *  * Neither the name of the PIXEL FEDERATION, s.r.o. nor the
 * names of its contributors may be used to endorse or promote products
 * derived from this software without specific prior written permission.
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

use Druid\Factory\DruidRequestFactory;
use Druid\HttpClient\Common\ClientInterface;
use Druid\HttpClient\Factory\DruidHttpClientFactory;
use Druid\Query\Common\AggregationInterface;
use Druid\Query\Common\QueryInterface;
use Druid\QueryBuilder\AbstractQueryBuilder;
use Druid\QueryBuilder\GroupByQueryBuilder;

/**
 * Class Druid
 *
 * @package Druid
 *
 * @author Tomas Mihalicka <tmihalicka@pixelfederation.com>
 */
final class Druid
{
    /**
     * Version of Druid PHP Driver
     *
     * @const string
     */
    const VERSION = '0.0.1';

    /**
     * Druid Client
     *
     * @var DruidClient
     */
    private $client;

    /**
     * Druid constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->client = new DruidClient($this->getDruidHttpClient($config));
    }

    /**
     * Get Druid Client
     *
     * @return DruidClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Create Druid HTTP Client Instance
     *
     * @param array $config
     *
     * @return ClientInterface
     *
     * @throws Exceptions\DruidDriverHttpClientCreationException
     */
    private function getDruidHttpClient(array $config)
    {
        return (new DruidHttpClientFactory($config))->getDruidHttpClient();
    }

    /**
     * @param string $type
     * @return AbstractQueryBuilder
     */
    public function createQueryBuilder($type)
    {
        switch ($type) {
            case AggregationInterface::GROUP_BY_TYPE:
                return new GroupByQueryBuilder();
        }

        throw new \RuntimeException(
            sprintf('Invalid query builder type %s', $type)
        );
    }

    /**
     * @param QueryInterface $query
     * @return DruidRequest
     */
    public function createRequest(QueryInterface $query)
    {
        $factory = new DruidRequestFactory();
        return $factory->create($query);
    }
}
