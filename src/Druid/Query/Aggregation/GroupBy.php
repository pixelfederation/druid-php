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
use Druid\Query\Component\HavingInterface;
use Druid\Query\Component\LimitSpecInterface;
use Druid\Query\Exception\RequiredArgumentException;

/**
 * Class GroupBy.
 */
class GroupBy extends AbstractAggregationQuery
{
    /**
     * @var array|DimensionSpecInterface[]
     */
    private $dimensions;

    /**
     * @var LimitSpecInterface
     */
    private $limitSpec;

    /**
     * @var HavingInterface
     */
    private $having;

    public function __construct()
    {
        parent::__construct(self::TYPE_GROUP_BY);
    }

    /**
     * @return array|\Druid\Query\Component\DimensionSpecInterface[]
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param array|\Druid\Query\Component\DimensionSpecInterface[] $dimensions
     *
     * @return GroupBy
     */
    public function setDimensions(array $dimensions)
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
     *
     * @return GroupBy
     */
    public function setLimitSpec(LimitSpecInterface $limitSpec)
    {
        $this->limitSpec = $limitSpec;

        return $this;
    }

    /**
     * @return HavingInterface
     */
    public function getHaving()
    {
        return $this->having;
    }

    /**
     * @param HavingInterface $having
     *
     * @return GroupBy
     */
    public function setHaving(HavingInterface $having)
    {
        $this->having = $having;

        return $this;
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
        if (!count($this->getDimensions())) {
            throw new RequiredArgumentException('\'dimensions\' is a required parameter');
        }
        if (!$this->getGranularity()) {
            throw new RequiredArgumentException('\'granularity\' is a required parameter');
        }
        if (!$this->getIntervals()) {
            throw new RequiredArgumentException('\'intervals\' is a required parameter');
        }
    }
}
