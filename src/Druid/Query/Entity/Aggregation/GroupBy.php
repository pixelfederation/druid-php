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
namespace Druid\Query\Entity\Aggregation;

use Druid\Query\Common\Aggregation\GroupByInterface;
use Druid\Query\Common\Component\Aggregation\AggregationCollectionInterface;
use Druid\Query\Common\Component\DimensionSpec\DimensionSpecCollectionInterface;
use Druid\Query\Common\Component\Filter\FilterInterface;
use Druid\Query\Common\Component\Interval\IntervalCollectionInterface;
use Druid\Query\Common\Component\LimitSpec\LimitSpecInterface;
use Druid\Query\Common\Component\PostAggregation\PostAggregatorCollectionInterface;
use Druid\Query\Entity\AbstractAggregation;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GroupBy
 *
 * @package Druid\Query\Entity\Aggregation
 * @codeCoverageIgnore
 */
final class GroupBy extends AbstractAggregation implements GroupByInterface
{
    protected static $queryType = self::GROUP_BY_TYPE;

    /**
     * @var DimensionSpecCollectionInterface
     */
    private $dimensions;

    /**
     * @var LimitSpecInterface
     */
    private $limitSpec;

    /**
     * @var FilterInterface
     */
    private $filter;

    /**
     * @var AggregationCollectionInterface
     */
    private $aggregations;

    /**
     * @var IntervalCollectionInterface
     */
    private $intervals;

    /**
     * @var PostAggregatorCollectionInterface
     */
    private $postAggregations;

    /**
     * @inheritdoc
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param DimensionSpecCollectionInterface $dimensions
     * @return GroupBy
     */
    public function setDimensions(DimensionSpecCollectionInterface $dimensions)
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * @return LimitSpecInterface
     */
    public function getLimitSpec()
    {
        return $this->limitSpec;
    }

    /**
     * @param LimitSpecInterface $limitSpec
     * @return GroupBy
     */
    public function setLimitSpec(LimitSpecInterface $limitSpec)
    {
        $this->limitSpec = $limitSpec;

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
     * @return GroupBy
     */
    public function setFilter(FilterInterface $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return AggregationCollectionInterface
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * @param AggregationCollectionInterface $aggregations
     * @return GroupBy
     */
    public function setAggregations(AggregationCollectionInterface $aggregations)
    {
        $this->aggregations = $aggregations;

        return $this;
    }

    /**
     * @return IntervalCollectionInterface
     */
    public function getIntervals()
    {
        return $this->intervals;
    }

    /**
     * @param IntervalCollectionInterface $intervals
     * @return GroupBy
     */
    public function setIntervals(IntervalCollectionInterface $intervals)
    {
        $this->intervals = $intervals;

        return $this;
    }

    /**
     * @return PostAggregatorCollectionInterface
     */
    public function getPostAggregations()
    {
        return $this->postAggregations;
    }

    /**
     * @param PostAggregatorCollectionInterface $postAggregations
     * @return GroupBy
     */
    public function setPostAggregations($postAggregations)
    {
        $this->postAggregations = $postAggregations;

        return $this;
    }
}
