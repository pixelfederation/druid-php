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

namespace Druid\Tests\Query\Component\Factory;

use Druid\Query\Component\Aggregator\CountAggregator;
use Druid\Query\Component\Aggregator\DoubleSumAggregator;
use Druid\Query\Component\Aggregator\FilteredAggregator;
use Druid\Query\Component\Aggregator\HyperUniqueAggregator;
use Druid\Query\Component\Aggregator\LongSumAggregator;
use Druid\Query\Component\AggregatorInterface;
use Druid\Query\Component\Factory\AggregatorFactory;
use Druid\Query\Component\FilterInterface;

class AggregatorFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider arithmeticData
     */
    public function testArithmeticAggregator($type, $name, $fieldName, $expected)
    {
        $factory = new AggregatorFactory();
        $aggregator = $factory->arithmeticAggregator($type, $name, $fieldName);
        $this->assertInstanceOf($expected, $aggregator);
    }

    public function arithmeticData()
    {
        return [
            [AggregatorInterface::TYPE_COUNT, 'name', 'fieldName', CountAggregator::class],
            [AggregatorInterface::TYPE_DOUBLE_SUM, 'name', 'fieldName', DoubleSumAggregator::class],
            [AggregatorInterface::TYPE_HYPER_UNIQUE, 'name', 'fieldName', HyperUniqueAggregator::class],
            [AggregatorInterface::TYPE_LONG_SUM, 'name', 'fieldName', LongSumAggregator::class],
        ];
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testFailCreteArithmeticAggregator()
    {
        $factory = new AggregatorFactory();
        $factory->arithmeticAggregator('not_exists_type', 'name', 'fieldName');
    }

    public function testFilteredAggregator()
    {
        $factory = new AggregatorFactory();

        $filterMock = $this->createMock(FilterInterface::class);
        $aggregatorMock = $this->createMock(AggregatorInterface::class);

        $aggregator = $factory->filtered($filterMock, $aggregatorMock);
        $this->assertInstanceOf(FilteredAggregator::class, $aggregator);
    }
}
