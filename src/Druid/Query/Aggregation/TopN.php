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

class TopN extends AbstractAggregationQuery
{
    /**
     * @var DimensionSpecInterface
     */
    private $dimension;

    /**
     * @var int
     */
    private $threshold = null;

    /**
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
     * @param int $threshold
     * @return TopN
     */
    public function setThreshold($threshold)
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
}
