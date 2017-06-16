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

namespace Druid\Query\Search;

use Druid\Query\AbstractQuery;
use Druid\Query\Component\DataSourceInterface;
use Druid\Query\Component\FilterInterface;
use Druid\Query\Component\GranularityInterface;
use Druid\Query\Component\IntervalInterface;
use Druid\Query\Component\LimitInterface;
use Druid\Query\Component\SearchDimensions\SearchDimensions;
use Druid\Query\Component\SearchLimit\SearchLimit;
use Druid\Query\Component\SearchQuerySpecInterface;
use Druid\Query\Component\Sort\Sort;
use Druid\Query\Component\SortInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractSearchQuery
 */
abstract class AbstractSearchQuery extends AbstractQuery
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
     * @var FilterInterface
     */
    private $filter;

    /**
     * @var LimitInterface
     * @Serializer\Type("integer")
     * @Serializer\Accessor(getter="getLimitInt",setter="setLimitInt")
     */
    private $limit;

    /**
     * @var array|IntervalInterface
     * @Serializer\Type("array<string>")
     */
    private $intervals;

    /**
     * @var SearchDimensions
     * @Serializer\Type("array<string>")
     * @Serializer\Accessor(getter="getSearchDimensionsArray",setter="setSearchDimensions")
     */
    private $searchDimensions;

    /**
     * @var SearchQuerySpecInterface
     */
    private $query;

    /**
     * @var SortInterface
     * @Serializer\Type("string")
     * @Serializer\Accessor(getter="getSortString",setter="setSortString")
     */
    private $sort;

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
     * @return GranularityInterface
     */
    public function getGranularity()
    {
        return $this->granularity;
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
     * @return array|IntervalInterface[]
     */
    public function getIntervals()
    {
        return $this->intervals;
    }

    /**
     * @param array|IntervalInterface[] $intervals
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

    /**
     * @param LimitInterface $limit
     * @return AbstractSearchQuery
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return LimitInterface
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param SearchDimensions $searchDimensions
     * @return AbstractSearchQuery
     */
    public function setSearchDimensions(SearchDimensions $searchDimensions)
    {
        $this->searchDimensions = $searchDimensions;
        return $this;
    }

    /**
     * @return SearchDimensions
     */
    public function getSearchDimensions()
    {
        return $this->searchDimensions;
    }

    /**
     * @param SearchQuerySpecInterface $query
     * @return AbstractSearchQuery
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return SearchQuerySpecInterface
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param SortInterface $sort
     * @return AbstractSearchQuery
     */
    public function setSort(SortInterface $sort)
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return SortInterface
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     * @return AbstractSearchQuery
     */
    public function setSortString($sort)
    {
        $this->setSort(new Sort($sort));
        return $this;
    }

    /**
     * @return string
     */
    public function getSortString()
    {
        return $this->sort->getSort();
    }

    /**
     * @return int
     */
    public function getLimitInt()
    {
        return $this->limit->getLimit();
    }

    /**
     * @param int $limit
     * @return AbstractSearchQuery
     */
    public function setLimitInt($limit)
    {
        $this->setLimit(new SearchLimit($limit));
        return $this;
    }

    /**
     * @param array|string[] $searchDimensions
     * @return AbstractSearchQuery
     */
    public function setSearchDimensionsArray(array $searchDimensions)
    {
        $this->setSearchDimensions(new SearchDimensions($searchDimensions));
        return $this;
    }

    /**
     * @return string[]
     */
    public function getSearchDimensionsArray()
    {
        return $this->searchDimensions->get();
    }
}
