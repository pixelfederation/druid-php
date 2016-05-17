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

namespace Druid\Tests;

use Druid\Driver\ResponseInterface;
use Druid\Druid;
use Druid\Driver\Guzzle\Driver;
use Druid\QueryBuilder\GroupByQueryBuilder;

class IntegrationTest extends \PHPUnit_Framework_TestCase
{

    public function testBasic()
    {
        $connection = new Druid(
            new Driver(),
            [
                'proxy' => 'tcp://127.0.0.1:8080'
            ]
        );

        $queries = new GroupByQueryBuilder();
        $queries->setDataSource('kpi_registrations_v1');
        $queries->setGranularity('P1D', 'UTC');
        $queries->addInterval(new \DateTime('2000-01-01'), new \DateTime());


        $queries->addAggregator($queries->aggregator()->count('count_rows'));
        $queries->addAggregator($queries->aggregator()->doubleSum('sum_rows', 'event_count_metric'));
        $queries->addAggregator($queries->aggregator()->hyperUnique('registrations', 'registrations'));

        $queries->addDimension('project', 'project');

        $queries->addPostAggregator(
            $queries->postAggregator()->arithmeticPostAggregator(
                'average',
                '/',
                [
                    $queries->postAggregator()->fieldAccessPostAggregator('sum_rows', 'sum_rows'),
                    $queries->postAggregator()->fieldAccessPostAggregator('count_rows', 'count_rows')
                ]
            )
        );

        $response = $connection->send($queries->getQuery());
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
