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

namespace Druid\Query\Component\Interval;

use Druid\Query\Component\IntervalInterface;

/**
 * Class Interval.
 */
class Interval implements IntervalInterface
{
    const INTERVAL_FORMAT = 'Y-m-d\TH:i:s';

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var bool
     */
    private $useZuluTime;

    /**
     * Interval constructor.
     *
     * @param \DateTime $start
     * @param \DateTime $end
     * @param bool $useZuluTime
     */
    public function __construct(\DateTime $start, \DateTime $end, $useZuluTime = false)
    {
        $this->start = $start;
        $this->end = $end;
        $this->useZuluTime = $useZuluTime;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start->format($this->getIntervalFormat());
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end->format($this->getIntervalFormat());
    }

    public function __toString()
    {
        return $this->getStart().'/'.$this->getEnd();
    }

    /**
     * Get Interval Format
     *
     * By default returns format with current offset
     * when is enabled only ZULU time returns format with \Z
     *
     * @return string
     */
    private function getIntervalFormat()
    {
        if ($this->useZuluTime) {
            return self::INTERVAL_FORMAT . '\Z';
        }

        return self::INTERVAL_FORMAT . 'O';
    }
}
