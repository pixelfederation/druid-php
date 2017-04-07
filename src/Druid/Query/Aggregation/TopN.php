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

use Druid\Query\Component\DimensionSpecInterface;
use Druid\Query\Component\MetricInterface;
use Druid\Query\Component\ThresholdInterface;
use Druid\Query\Exception\RequiredArgumentException;

class TopN extends AbstractAggregationQuery
{
    /**
     * A String or JSON object defining the dimension that you want the top taken for.
     * @link http://druid.io/docs/latest/querying/dimensionspecs.html
     * @var DimensionSpecInterface
     */
    private $dimension;

    /**
     * An integer defining the N in the topN (i.e. how many results you want in the top list)
     * @var ThresholdInterface
     */
    private $threshold;

    /**
     * A String or JSON object specifying the metric to sort by for the top list.
     * @link http://druid.io/docs/latest/querying/topnmetricspec.html
     * @var MetricInterface
     */
    private $metric;

    public function __construct()
    {
        parent::__construct(self::TYPE_TOP_N);
    }

    /**
     * @param \Druid\Query\Component\DimensionSpecInterface $dimension
     * @return TopN
     */
    public function setDimension(DimensionSpecInterface $dimension)
    {
        $this->dimension = $dimension;
        return $this;
    }

    /**
     * @return \Druid\Query\Component\DimensionSpecInterface
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * @param ThresholdInterface $threshold
     * @return TopN
     */
    public function setThreshold(ThresholdInterface $threshold)
    {
        $this->threshold = (int)(string)$threshold;
        return $this;
    }

    /**
     * @param MetricInterface $metric
     * @return TopN
     */
    public function setMetric(MetricInterface $metric)
    {
        $this->metric = $metric;
        return $this;
    }

    /**
     * @return int
     */
    public function getThreshold()
    {
        return (int)$this->threshold;
    }

    /**
     * @return MetricInterface
     */
    public function getMetric()
    {
        return $this->metric;
    }

    /**
     * Performs query validation
     * @throws RequiredArgumentException
     */
    public function validate()
    {
        if (!$this->getDataSource()) {
            throw new RequiredArgumentException('\'dataSource\' is a required parameter');
        }
        if (!$this->getIntervals()) {
            throw new RequiredArgumentException('\'intervals\' is a required parameter');
        }
        if (!$this->getGranularity()) {
            throw new RequiredArgumentException('\'granularity\' is a required parameter');
        }
        if (!$this->getDimension()) {
            throw new RequiredArgumentException('\'dimension\' is a required parameter');
        }
        if (!$this->getThreshold()) {
            throw new RequiredArgumentException('\'threshold\' is a required parameter');
        }
        if (!$this->getMetric()) {
            throw new RequiredArgumentException('\'metric\' is a required parameter');
        }
    }
}
