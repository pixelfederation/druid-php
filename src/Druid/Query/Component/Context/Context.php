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

namespace Druid\Query\Component\Context;

use Druid\Query\Component\ContextInterface;

/**
 * Class Context.
 */
class Context implements ContextInterface
{
    /**
     * @var int
     */
    private $timeout = 0;

    /**
     * @var int
     */
    private $priority = 0;

    /**
     * @var string
     */
    private $queryId = '';

    /**
     * @var bool
     */
    private $useCache = true;

    /**
     * @var bool
     */
    private $populateCache = true;

    /**
     * @var bool
     */
    private $bySegment = false;

    /**
     * @var bool
     */
    private $finalize = false;

    /**
     * @var string
     */
    private $chunkPeriod = '0';

    /**
     * @var int
     */
    private $minTopNThreshold = 1000;

    /**
     * @var int
     */
    private $maxResults = 500000;

    /**
     * @var int
     */
    private $maxIntermediateRows = 50000;

    /**
     * @var bool
     */
    private $groupByIsSingleThreaded = false;

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->timeout = (int)$timeout;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = (int)$priority;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueryId()
    {
        return $this->queryId;
    }

    /**
     * @param string $queryId
     * @return $this
     */
    public function setQueryId($queryId)
    {
        $this->queryId = (string)$queryId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseCache()
    {
        return $this->useCache;
    }

    /**
     * @param boolean $useCache
     * @return $this
     */
    public function setUseCache($useCache)
    {
        $this->useCache = (bool)$useCache;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPopulateCache()
    {
        return $this->populateCache;
    }

    /**
     * @param boolean $populateCache
     * @return $this
     */
    public function setPopulateCache($populateCache)
    {
        $this->populateCache = (bool)$populateCache;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isBySegment()
    {
        return $this->bySegment;
    }

    /**
     * @param boolean $bySegment
     * @return $this
     */
    public function setBySegment($bySegment)
    {
        $this->bySegment = (bool)$bySegment;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFinalize()
    {
        return $this->finalize;
    }

    /**
     * @param boolean $finalize
     * @return $this
     */
    public function setFinalize($finalize)
    {
        $this->finalize = (bool)$finalize;
        return $this;
    }

    /**
     * @return string
     */
    public function getChunkPeriod()
    {
        return $this->chunkPeriod;
    }

    /**
     * @param string $chunkPeriod
     * @return $this
     */
    public function setChunkPeriod($chunkPeriod)
    {
        $this->chunkPeriod = (string)$chunkPeriod;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinTopNThreshold()
    {
        return $this->minTopNThreshold;
    }

    /**
     * @param int $minTopNThreshold
     * @return $this
     */
    public function setMinTopNThreshold($minTopNThreshold)
    {
        $this->minTopNThreshold = (int)$minTopNThreshold;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * @param int $maxResults
     * @return $this
     */
    public function setMaxResults($maxResults)
    {
        $this->maxResults = (int)$maxResults;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxIntermediateRows()
    {
        return $this->maxIntermediateRows;
    }

    /**
     * @param int $maxIntermediateRows
     * @return $this
     */
    public function setMaxIntermediateRows($maxIntermediateRows)
    {
        $this->maxIntermediateRows = (int)$maxIntermediateRows;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isGroupByIsSingleThreaded()
    {
        return $this->groupByIsSingleThreaded;
    }

    /**
     * @param boolean $groupByIsSingleThreaded
     * @return $this
     */
    public function setGroupByIsSingleThreaded($groupByIsSingleThreaded)
    {
        $this->groupByIsSingleThreaded = (bool)$groupByIsSingleThreaded;
        return $this;
    }
}
