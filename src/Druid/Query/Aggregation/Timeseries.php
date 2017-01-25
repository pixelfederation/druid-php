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

use Druid\Query\Component\Descending\Descending;
use Druid\Query\Component\DescendingInterface;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\PreSerialize;
use JMS\Serializer\Annotation\PostSerialize;
use Druid\Query\Exception\RequiredArgumentException;

/**
 * Class Timeseries.
 */
class Timeseries extends AbstractAggregationQuery
{
    /**
     * @var DescendingInterface
     */
    private $descending;

    public function __construct()
    {
        parent::__construct(self::TYPE_TIMESERIES);
    }

    /**
     * Whether to make descending ordered result. Default is false(ascending).
     * @return DescendingInterface
     */
    public function getDescending()
    {
        return $this->descending;
    }

    /**
     * @PreSerialize
     */
    public function preSerialize()
    {
        $this->descending = $this->descending ? $this->descending->getDescending() : null;
    }

    /**
     * @PostSerialize
     */
    public function postSerialize()
    {
        /** @noinspection PhpParamsInspection */
        !is_null($this->descending) && $this->setDescending(new Descending($this->descending));
    }

    /**
     * @param DescendingInterface $descending
     *
     * @return Timeseries
     */
    public function setDescending(DescendingInterface $descending)
    {
        $this->descending = $descending;

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
        if (!$this->getIntervals()) {
            throw new RequiredArgumentException('\'intervals\' is a required parameter');
        }
        if (!$this->getGranularity()) {
            throw new RequiredArgumentException('\'granularity\' is a required parameter');
        }
    }
}
