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

namespace Druid\Tests\QueryBuilder;

use Druid\Query\Component\ComponentInterface;
use Druid\Query\Component\DataSource\UnionDataSource;
use Druid\QueryBuilder\GroupByQueryBuilder;
use Druid\Query\Component\Granularity\PeriodGranularity;

class GroupByQueryBuilderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFailAddComponent()
    {
        $builder = new GroupByQueryBuilder();
        $component = $this->getMock(ComponentInterface::class);
        $builder->addComponent('not_exists_component', $component);
    }

    public function testSettersAndGetters()
    {
        $builder = new GroupByQueryBuilder();

        $now = new \DateTime();
        $builder->setDataSource('dataSource')
            ->setGranularity(new PeriodGranularity('P1D', 'UTC'))
            ->setFilter($builder->filter()->selectorFilter('gender', 'male'))
            ->addInterval($now, new \DateTime())
            ->addAggregator($builder->aggregator()->doubleSum('sum', 'sum'))
            ->addAggregator($builder->aggregator()->count('count'))
            ->addDimension('gender', 'gender')
            ->addPostAggregator($builder->postAggregator()->arithmeticPostAggregator('average', '/', [
                $builder->postAggregator()->fieldAccessPostAggregator('sum', 'sum'),
                $builder->postAggregator()->fieldAccessPostAggregator('count', 'count'),
            ]))
            ->setHaving($builder->having()->equalToHaving('gender', 300))
        ;

//        $builder->setDataSource( new UnionDataSource( [ 'source-1', 'source-2' ] ) );
        $query = $builder->getQuery();
//        $s = $query->getDataSource();
//        $s->getDataSources();
        $this->assertEquals('dataSource', $query->getDataSource()->getName());
        $this->assertEquals('gender', $query->getFilter()->getDimension());
        $this->assertEquals('male', $query->getFilter()->getValue());
        $this->assertEquals($now->format('Y-m-d\TH:i:s+0000'), $query->getIntervals()[0]->getStart());
        $this->assertEquals('sum', $query->getAggregations()[0]->getName());
        $this->assertEquals('count', $query->getAggregations()[1]->getName());
        $this->assertEquals('gender', $query->getDimensions()[0]->getDimension());
        $this->assertEquals('average', $query->getPostAggregations()[0]->getName());
        $this->assertEquals(300, $query->getHaving()->getValue());
    }
}
