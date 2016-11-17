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
use Druid\Query\Component\ThresholdInterface;
use Druid\Query\Component\TopNMetricSpecInterface;
use Druid\Query\Component\ContextInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class TopN.
 */
class TopN extends AbstractAggregationQuery
{
    /**
     * @var DimensionSpecInterface
     */
    private $dimension;

    /**
     * @var ThresholdInterface
     * @Serializer\Type("string")
     */
    private $threshold;

    /**
     * @var TopNMetricSpecInterface
     */
    private $metric;

    /**
     * @var ContextInterface
     */
    private $context;

    public function __construct()
    {
        parent::__construct(self::TYPE_TOP_N);
    }

    /**
     * @return DimensionSpecInterface
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * @param DimensionSpecInterface $dimension
     *
     * @return TopN
     */
    public function setDimension(DimensionSpecInterface $dimension)
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * @return ThresholdInterface
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

    /**
     * @param ThresholdInterface $threshold
     *
     * @return $this
     */
    public function setThreshold(ThresholdInterface $threshold)
    {
        $this->threshold = $threshold;

        return $this;
    }

    /**
     * @return TopNMetricSpecInterface
     */
    public function getMetric()
    {
        return $this->metric;
    }

    /**
     * @param TopNMetricSpecInterface $metric
     *
     * @return $this
     */
    public function setMetric(TopNMetricSpecInterface $metric)
    {
        $this->metric = $metric;

        return $this;
    }

    /**
     * @return ContextInterface
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param ContextInterface $context
     *
     * @return $this
     */
    public function setContext(ContextInterface $context)
    {
        $this->context = $context;

        return $this;
    }
}
