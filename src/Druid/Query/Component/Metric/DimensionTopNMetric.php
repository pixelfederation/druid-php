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

namespace Druid\Query\Component\Metric;

use Druid\Query\Component\MetricInterface;

class DimensionTopNMetric implements MetricInterface
{

    const ORDERING_LEXICOGRAPHIC = 'lexicographic';
    const ORDERING_ALPHANUMERIC = 'alphanumeric';
    const ORDERING_NUMERIC = 'numeric';
    const ORDERING_STRLEN = 'strlen';

    /** @var string */
    private $type = '';

    /** @var string */
    private $ordering = '';

    /** @var string */
    private $previousStop = '';

    public function __construct($ordering = null, $previousStop = null)
    {
        $this->type = self::TYPE_DIMENSION;
        $this->setOrdering($ordering);
        $this->setPreviousStop($previousStop);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $ordering
     * @return DimensionTopNMetric
     */
    public function setOrdering($ordering)
    {
        $this->ordering = (is_null($ordering) || !in_array($ordering, [
                self::ORDERING_LEXICOGRAPHIC,
                self::ORDERING_ALPHANUMERIC,
                self::ORDERING_NUMERIC,
                self::ORDERING_STRLEN,
            ])) ? self::ORDERING_LEXICOGRAPHIC : $ordering;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * @param string $previousStop
     * @return DimensionTopNMetric
     */
    public function setPreviousStop($previousStop)
    {
        is_null($previousStop) || ($this->previousStop = $previousStop);
        return $this;
    }

    /**
     * @return string
     */
    public function getPreviousStop()
    {
        return $this->previousStop;
    }
}
