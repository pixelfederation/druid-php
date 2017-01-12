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

namespace Druid\Query\Aggregation;

use Druid\Query\AbstractQuery;
use Druid\Query\Component\AggregatorInterface;
use Druid\Query\Component\DataSourceInterface;
use Druid\Query\Component\FilterInterface;
use Druid\Query\Component\GranularityInterface;
use Druid\Query\Component\IntervalInterface;
use Druid\Query\Component\PostAggregatorInterface;
use Druid\Query\Component\StringComponentInterface;
use Druid\Query\QueryInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractAggregationQuery.
 */
abstract class AbstractAggregationQuery extends AbstractQuery
{
    /**
     * @var DataSourceInterface
     */
    private $dataSource;

    /**
     * @var GranularityInterface
     */
    private $granularity;

    /**
     * @var array|AggregatorInterface[]
     */
    private $aggregations;

    /**
     * @var array|PostAggregatorInterface[]
     */
    private $postAggregations;

    /**
     * @var FilterInterface
     */
    private $filter;

    /**
     * @var array|IntervalInterface[]
     * @Serializer\Type("array<string>")
     */
    private $intervals;

    /**
     * @return DataSourceInterface
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * @param DataSourceInterface $dataSource
     *
     * @return $this
     */
    public function setDataSource(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;

        return $this;
    }

    /**
     * @return string|GranularityInterface
     */
    public function getGranularity()
    {
        return $this->granularity instanceof StringComponentInterface ? (string)$this->granularity : $this->granularity;
    }

    /**
     * @param GranularityInterface $granularity
     *
     * @return $this
     */
    public function setGranularity(GranularityInterface $granularity)
    {
        $this->granularity = $granularity;

        return $this;
    }

    /**
     * @return array|\Druid\Query\Component\AggregatorInterface[]
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * @param array|\Druid\Query\Component\AggregatorInterface[] $aggregations
     *
     * @return $this
     */
    public function setAggregations(array $aggregations)
    {
        $this->aggregations = $aggregations;

        return $this;
    }

    /**
     * @return array|\Druid\Query\Component\PostAggregatorInterface[]
     */
    public function getPostAggregations()
    {
        return $this->postAggregations;
    }

    /**
     * @param array|\Druid\Query\Component\PostAggregatorInterface[] $postAggregations
     *
     * @return $this
     */
    public function setPostAggregations(array $postAggregations)
    {
        $this->postAggregations = $postAggregations;

        return $this;
    }

    /**
     * @return array|\Druid\Query\Component\IntervalInterface[]
     */
    public function getIntervals()
    {
        return $this->intervals;
    }

    /**
     * @param array|\Druid\Query\Component\IntervalInterface[] $intervals
     *
     * @return $this
     */
    public function setIntervals(array $intervals)
    {
        $this->intervals = $intervals;

        return $this;
    }

    /**
     * @return FilterInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param FilterInterface $filter
     *
     * @return $this
     */
    public function setFilter(FilterInterface $filter)
    {
        $this->filter = $filter;

        return $this;
    }
}
