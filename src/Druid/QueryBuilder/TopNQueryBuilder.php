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

namespace Druid\QueryBuilder;

use Druid\Query\Aggregation\TopN;
use Druid\Query\Component\DimensionSpec\DefaultDimensionSpec;
use Druid\Query\Component\MetricInterface;
use Druid\Query\Component\ThresholdInterface;
use Druid\Query\QueryInterface;

/**
 * Class TopNQueryBuilder
 */
class TopNQueryBuilder extends AbstractAggregationQueryBuilder
{
    protected $components = [
        'dataSource' => null,
        'intervals' => [],
        'granularity' => null,
        'filter' => null,
        'aggregations' => [],
        'postAggregations' => [],
        'dimension' => '',
        'threshold' => null,
        'metric' => null,
    ];

    /**
     * @param string $dimension
     * @param string $outputName
     *
     * @return $this
     */
    public function setDimension($dimension, $outputName)
    {
        return $this->addComponent('dimension', new DefaultDimensionSpec($dimension, $outputName));
    }

    /**
     * @param MetricInterface $metric
     *
     * @return $this
     */
    public function setMetric(MetricInterface $metric)
    {
        return $this->addComponent('metric', $metric);
    }

    /**
     * @param ThresholdInterface $threshold
     *
     * @return $this
     */
    public function setThreshold($threshold)
    {
        return $this->addComponent('threshold', $threshold);
    }

    /**
     * @return TopN
     */
    public function getQuery()
    {
        $query = new TopN();
        foreach ($this->components as $componentName => $component) {
            if (!empty($component)) {
                $method = 'set' . ucfirst($componentName);
                $query->$method($component);
            }
        }

        return $query;
    }
}
